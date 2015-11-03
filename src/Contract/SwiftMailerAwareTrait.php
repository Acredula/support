<?php

namespace Acredula\Support\Contract;

use Swift_Mailer;
use Swift_Message;

trait SwiftMailerAwareTrait
{
    /**
     * @var \Swift_Mailer
     */
    protected $mailer;

    /**
     * @var \Swift_Message
     */
    protected $message;

    /**
     * {@inheritdoc}
     */
    public function setEmailDriver(Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * {@inheritdoc}
     */
    public function getEmailDriver()
    {
        return $this->mailer;
    }

    /**
     * {@inheritdoc}
     */
    public function setMessageBuilder(Swift_Message $message)
    {
        $this->message = $message;
    }

    /**
     * {@inheritdoc}
     */
    public function getMessageBuilder()
    {
        return $this->message;
    }
}
