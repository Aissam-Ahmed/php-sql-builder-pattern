<?php

namespace App\Models;

class User
{
    public int $id;
    public string $name;
    public string $email;
    public int $age;
    public string $status;

    public function __construct(array $data)
    {
        $this->id         = $data['id'];
        $this->name       = $data['name'];
        $this->email      = $data['email'];
        $this->age        = $data['age'];
        $this->status     = $data['status'];
    }

    public static function fromArray(array $rows): array
    {
        return array_map(fn($row) => new self($row), $rows);
    }
}
