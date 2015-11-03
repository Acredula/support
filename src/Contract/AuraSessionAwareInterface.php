<?php

namespace Acredula\Support\Contract;

use Aura\Session\Session;

interface AuraSessionAwareInterface
{
    /**
     * Set the session driver.
     *
     * @param \Aura\Session\Session $session
     */
    public function setSessionDriver(Session $session);

    /**
     * Get the session driver.
     *
     * @return \Aura\Session\SessionFactory
     */
    public function getSessionDriver();
}
