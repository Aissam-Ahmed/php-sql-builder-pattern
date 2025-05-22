<?php   

namespace App\Builder;

interface SqlBuilderInterface
{
    public function select(string $table, array $columns = ['*']): self;

    public function where(string $column, string $operator, mixed $value): self;

    public function limit(int $limit): self;

    public function getQuery(): string;
}