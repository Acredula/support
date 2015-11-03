<?php

namespace Acredula\Support\Contract;

use Twig_Environment;

trait TwigAwareTrait
{
    /**
     * @var \Twig_Environment
     */
    protected $template;

    /**
     * {@inheritdoc}
     */
    public function setTemplateDriver(Twig_Environment $twig)
    {
        $this->template = $twig;
    }

    /**
     * {@inheritdoc}
     */
    public function getTemplateDriver()
    {
        return $this->template;
    }
}
