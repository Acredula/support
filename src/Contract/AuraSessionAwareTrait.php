<?php

namespace Acredula\Support\Contract;

use Aura\Session\Session;

trait AuraSessionAwareTrait
{
    /**
     * @var \Aura\Session\SessionFactory
     */
    protected $session;

    /**
     * {@inheritdoc}
     */
    public function setSessionDriver(Session $session)
    {
        $this->session = $session;
    }

    /**
     * {@inheritdoc}
     */
    public function getSessionDriver()
    {
        return $this->session;
    }
}
