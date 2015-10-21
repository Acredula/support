<?php

namespace Hms\Support\Contract;

use Gorka\DotNotationAccess\DotNotationAccessor;

trait ConfigAwareTrait
{
    /**
     * @var array
     */
    protected $config;

    /**
     * {@inheritdoc}
     */
    public function setConfig(DotNotationAccessor $config)
    {
        $this->config = $config;
    }

    /**
     * {@inheritdoc}
     */
    public function getConfig()
    {
        return $this->config;
    }
}
