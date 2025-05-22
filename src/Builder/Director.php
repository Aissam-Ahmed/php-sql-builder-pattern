<?php

namespace App\Builder;

class Director
{
    protected SqlBuilderInterface $builder;

    public function setBuilder(SqlBuilderInterface $builder): void
    {
        $this->builder = $builder;
    }

    public function buildActiveAdultsQuery(): string
    {
        return $this->builder
            ->select('users', ['id', 'name', 'email'])
            ->where('age', '>', 18)
            ->where('status', '=', 'active')
            ->limit(10)
            ->getQuery();
    }

    public function buildCustomQuery(
        string $table,
        array $columns,
        array $conditions = [],
        ?int $limit = null
    ): string {
        $this->builder->select($table, $columns);

        foreach ($conditions as [$column, $operator, $value]) {
            $this->builder->where($column, $operator, $value);
        }

        if ($limit !== null) {
            $this->builder->limit($limit);
        }

        return $this->builder->getQuery();
    }
}
