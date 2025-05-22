<?php

namespace App\Builder;

class MySqlQueryBuilder implements SqlBuilderInterface
{
    protected string $table;
    protected array $columns = ['*'];
    protected array $wheres = [];
    protected ?int $limit = null;

    public function select(string $table, array $columns = ['*']): self
    {
        $this->table = $table;
        $this->columns = $columns;
        return $this;
    }

    public function where(string $column, string $operator, mixed $value): self
    {
        // استخدم PDO binding لاحقًا إذا أردت تنفيذ الاستعلام بأمان
        $value = is_string($value) ? "'$value'" : $value;
        $this->wheres[] = "$column $operator $value";
        return $this;
    }

    public function limit(int $limit): self
    {
        $this->limit = $limit;
        return $this;
    }

    public function getQuery(): string
    {
        $query = "SELECT " . implode(', ', $this->columns) . " FROM {$this->table}";

        if (!empty($this->wheres)) {
            $query .= " WHERE " . implode(' AND ', $this->wheres);
        }

        if ($this->limit !== null) {
            $query .= " LIMIT {$this->limit}";
        }

        return $query . ";";
    }
}
