<?php

namespace Hms\Support\Contract;

use Aura\Sql\ExtendedPdo;
use Aura\SqlQuery\QueryFactory;

trait AuraSqlAwareTrait
{
    /**
     * @var \Aura\Sql\ExtendedPdo
     */
    protected $sql;

    /**
     * @var \Aura\SqlBuilder\QueryBuilder
     */
    protected $queryFactory;

    /**
     * {@inheritdoc}
     */
    public function setSqlDriver(ExtendedPdo $epdo)
    {
        $this->sql = $epdo;
    }

    /**
     * {@inheritdoc}
     */
    public function getSqlDriver()
    {
        return $this->sql;
    }

    /**
     * {@inheritdoc}
     */
    public function setSqlQueryBuilder(QueryFactory $queryFactory)
    {
        $this->queryFactory = $queryFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function getSqlQueryBuilder()
    {
        return $this->queryFactory;
    }
}
