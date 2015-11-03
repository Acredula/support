<?php

namespace Acredula\Support\Contract;

use Aura\Sql\ExtendedPdo;
use Aura\SqlQuery\QueryFactory;

interface AuraSqlAwareInterface
{
    /**
     * Set the database driver.
     *
     * @param  \Aura\Sql\ExtendedPdo $pdo
     * @return void
     */
    public function setSqlDriver(ExtendedPdo $pdo);

    /**
     * Get the database driver.
     *
     * @return \Aura\Sql\ExtendedPdo
     */
    public function getSqlDriver();

    /**
     * Set the sql query builder.
     *
     * @param  \Aura\SqlQuery\QueryBuilder $queryBuilder
     * @return void
     */
    public function setSqlQueryBuilder(QueryFactory $queryBuilder);

    /**
     * Get the sql query builder.
     *
     * @return \Aura\SqlQuery\QueryBuilder $queryBuilder
     */
    public function getSqlQueryBuilder();
}
