<?php

namespace Acredula\Support\Contract;

use Gorka\DotNotationAccess\DotNotationAccessor;

interface ConfigAwareInterface
{
    /**
     * Set the config.
     *
     * @param  \Gorka\DotNotationAccess\DotNotationAccessor $config
     * @return void
     */
    public function setConfig(DotNotationAccessor $config);

    /**
     * Get the config.
     *
     * @return \Gorka\DotNotationAccess\DotNotationAccessor
     */
    public function getConfig();
}
