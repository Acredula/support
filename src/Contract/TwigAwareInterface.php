<?php

namespace Hms\Support\Contract;

use Twig_Environment;

interface TwigAwareInterface
{
    /**
     * Set the template driver.
     *
     * @param  \Twig_Environment $twig
     * @return void
     */
    public function setTemplateDriver(Twig_Environment $twig);

    /**
     * Get the template driver.
     *
     * @return \Twig_Environment
     */
    public function getTemplateDriver();
}
