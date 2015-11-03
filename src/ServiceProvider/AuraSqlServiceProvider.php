<?php

namespace Acredula\Support\ServiceProvider;

use Aura\Sql\ExtendedPdo;
use Aura\SqlQuery\QueryFactory;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;

class AuraSqlServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{
    /**
     * Database type to pass to QueryFactory.
     *
     * @var string
     */
    protected $databaseType;

    /**
     * @var array
     */
    protected $provides = [
        'Aura\Sql\ExtendedPdo',
        'Aura\SqlQuery\QueryFactory'
    ];

    /**
     * Constructor.
     *
     * @param string $databaseType
     */
    public function __construct($databaseType = 'mysql')
    {
        $this->databaseType = $databaseType;
    }

    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        $this->getContainer()
             ->inflector('Acredula\Support\Contract\AuraSqlAwareInterface')
             ->invokeMethod('setSqlDriver', ['Aura\Sql\ExtendedPdo'])
             ->invokeMethod('setSqlQueryBuilder', ['Aura\SqlQuery\QueryFactory']);
    }

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        $config = $this->getContainer()->get('app.config');

        $this->getContainer()->share('Aura\Sql\ExtendedPdo', function() use ($config) {
            $extendedPdo = new ExtendedPdo(
                sprintf(
                    'mysql:host=%s;dbname=%s',
                    $config->get('env.database.host'),
                    $config->get('env.database.name')
                ),
                $config->get('env.database.user'),
                $config->get('env.database.pass')
            );

            return $extendedPdo;
        });

        $this->getContainer()->share('Aura\SqlQuery\QueryFactory', function() {
            return new QueryFactory($this->databaseType);
        });
    }
}
