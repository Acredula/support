<?php

namespace Hms\Support\ServiceProvider;

use Gorka\DotNotationAccess\DotNotationAccessArray;
use Hms\Support\Exception\FileDoesNotExistException;
use Hms\Support\Exception\FileDoesNotReturnArrayException;
use josegonzalez\Dotenv\Loader;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;

class ConfigServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{
    /**
     * @var array
     */
    protected $config;

    /**
     * @var array
     */
    protected $provides = [
        'app.config'
    ];

    /**
     * Constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        $this->getContainer()
             ->inflector('Hms\Support\Contract\ConfigAwareInterface')
             ->invokeMethod('setConfig', ['app.config']);
    }

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        $this->setUpEnv($this->config['env']);

        $this->getContainer()->share('app.config', function() {
            if (! file_exists($this->config['path'])) {
                throw new FileDoesNotExistException(
                    'Config file [%s] could not be found', sprintf($this->config['path'])
                );
            }

            $config = include $this->config['path'];

            if (! is_array($config)) {
                throw new FileDoesNotReturnArrayException(
                    'Config [%s] must return an array', sprintf($this->config['path'])
                );
            }

            return new DotNotationAccessArray(array_merge($config, ['env' => $_ENV]));
        });
    }

    /**
     * Setup the .env file.
     *
     * @return void
     */
    protected function setUpEnv($envFile)
    {
        if (! file_exists($envFile)) {
            throw new FileDoesNotExistException(
                'The .env file [%s] could not be found', sprintf($envFile)
            );
        }

        (new Loader($envFile))
              ->setFilters([
                  'josegonzalez\Dotenv\Filter\LowercaseKeyFilter',
                  'josegonzalez\Dotenv\Filter\UnderscoreArrayFilter'
              ])
              ->parse()
              ->expect(['ENVIRONMENT'])
              ->filter()
              ->toEnv();
    }
}
