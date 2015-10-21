<?php

namespace Hms\Support\ServiceProvider;

use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;
use Swift_Mailer;
use Swift_MailTransport;
use Swift_Message;

class SwiftMailerServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{
    /**
     * @var array
     */
    protected $provides = [
        'Swift_Mailer',
        'Swift_Message'
    ];

    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        $this->getContainer()
             ->inflector('Hms\Support\Contract\SwiftMailerAwareInterface')
             ->invokeMethod('setEmailDriver', ['Swift_Mailer'])
             ->invokeMethod('setMessageBuilder', ['Swift_Message']);
    }

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        $this->getContainer()->add('Swift_Mailer', function() {
            $transport = Swift_MailTransport::newInstance();

            return Swift_Mailer::newInstance($transport);
        });

        $this->getContainer()->add('Swift_Message', function() {
            return Swift_Message::newInstance();
        });
    }
}
