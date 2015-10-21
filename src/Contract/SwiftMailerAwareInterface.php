<?php

namespace Hms\Support\Contract;

use Swift_Mailer;
use Swift_Message;

interface SwiftMailerAwareInterface
{
    /**
     * Set the email driver.
     *
     * @param  \Swift_Mailer $mailer
     * @return void
     */
    public function setEmailDriver(Swift_Mailer $mailer);

    /**
     * Get the email driver.
     *
     * @return \Swift_Mailer
     */
    public function getEmailDriver();

    /**
     * Set the email message builder.
     *
     * @param  \Swift_Message
     * @return void
     */
    public function setMessageBuilder(Swift_Message $message);

    /**
     * Get the email message builder.
     *
     * @return \Swift_Message
     */
    public function getMessageBuilder();
}
