<?php

namespace Hms\Support\ServiceProvider;

use Aura\Session\SessionFactory;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;

class AuraSessionServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{
    /**
     * @var array
     */
    protected $provides = [
        'Aura\Session\SessionFactory'
    ];

    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        $this->getContainer()
             ->inflector('Hms\Support\Contract\AuraSessionAwareInterface')
             ->invokeMethod('setSessionDriver', ['Aura\Session\SessionFactory']);
    }

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        $this->getContainer()->share('Aura\Session\SessionFactory', function() {
            return (new SessionFactory)->newInstance($_COOKIE);
        });
    }
}
