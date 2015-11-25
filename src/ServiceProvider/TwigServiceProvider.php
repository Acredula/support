<?php

namespace Acredula\Support\ServiceProvider;

use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;
use Twig_Environment;
use Twig_Extension_Debug;
use Twig_Loader_Filesystem;

class TwigServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{
    /**
     * @var array
     */
    protected $provides = [
        'Twig_Environment'
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
             ->inflector('Acredula\Support\Contract\TwigAwareInterface')
             ->invokeMethod('setTemplateDriver', ['Twig_Environment']);
    }

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        $config = $this->getContainer()->get('app.config');

        $addedExtensions = $this->addExtensionsToContainer(
            isset($this->config['extensions']) ? $this->config['extensions'] : []
        );

        $this->getContainer()->share('Twig_Environment', function () use ($config, $addedExtensions) {
            $loader = new Twig_Loader_Filesystem($this->config['templates']);

            $dev = $config->get('env.environment') === 'development';

            $twig = new Twig_Environment($loader, [
                'cache' => ((! $dev) && (isset($this->config['cache']))) ? $this->config['cache'] : false,
                'debug' => ($dev) ? true : false
            ]);

            foreach ($addedExtensions as $extension) {
                $twig->addExtension($this->getContainer()->get($extension));
            }

            return $twig;
        });
    }

    /**
     * Add Twig extensions to the container.
     *
     * @param  array $extensions
     * @return array
     */
    protected function addExtensionsToContainer($extensions = [])
    {
        $added = [];

        foreach ($extensions as $extension) {
            $alias = (is_string($extension)) ? $extension : get_class($extension);

            $this->getContainer()->add($alias, $extension);
            $added[] = $alias;
        }

        return $added;
    }
}
