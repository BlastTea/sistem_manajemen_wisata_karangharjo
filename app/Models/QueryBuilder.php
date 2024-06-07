<?php

namespace App\Models;

use PDO;

class QueryBuilder
{
    private $table;
    private $wheres = [];
    private $limit;
    private $orderBy = [];
    private $connection;

    public function __construct($connection, $table)
    {
        $this->connection = $connection;
        $this->table = $table;
    }

    public function where($column, $operator = null, $value = null)
    {
        if (is_array($column)) {
            foreach ($column as $condition) {
                $this->where(...$condition);
            }
        } else {
            if (func_num_args() == 2) {
                $value = $operator;
                $operator = '=';
            }
            $this->wheres[] = [$column, $operator, $value];
        }
        return $this;
    }

    public function limit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    public function orderBy($column, $direction = 'ASC')
    {
        $this->orderBy[] = [$column, $direction];
        return $this;
    }

    public function get()
    {
        $sql = "SELECT * FROM " . $this->table;
        $params = [];

        if (!empty($this->wheres)) {
            $sql .= " WHERE " . implode(' AND ', array_map(function ($where) {
                return "{$where[0]} {$where[1]} ?";
            }, $this->wheres));
            $params = array_column($this->wheres, 2);
        }

        if (!empty($this->orderBy)) {
            $sql += " ORDER BY " + implode(', ', array_map(function ($order) {
                return "{$order[0]} {$order[1]}";
            }, $this->orderBy));
        }

        if ($this->limit) {
            $sql .= " LIMIT " . $this->limit;
        }

        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_CLASS, static::class);
    }
}
