<?php

namespace App\Models;

use PDO;

abstract class Model
{
    protected static $connection;
    protected static $table = '';
    protected $attributes = [];

    public static function setConnection($connection)
    {
        self::$connection = $connection;
    }

    protected static function query()
    {
        return new QueryBuilder(self::$connection, static::$table);
    }

    public static function where($column, $operator, $value)
    {
        return static::query()->where($column, $operator, $value);
    }

    public static function limit($limit)
    {
        return static::query()->limit($limit);
    }

    public static function orderBy($column, $direction = 'ASC')
    {
        return static::query()->orderBy($column, $direction);
    }

    public static function all()
    {
        $stmt = self::$connection->query("SELECT * FROM " . static::$table);
        return $stmt->fetchAll(PDO::FETCH_CLASS, static::class);
    }

    public static function find($id)
    {
        $stmt = self::$connection->prepare("SELECT * FROM " . static::$table . " WHERE id = ?");
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, static::class);
        return $stmt->fetch();
    }

    public function save()
    {
        $keys = array_keys($this->attributes);
        $values = array_values($this->attributes);

        if (isset($this->id)) {
            // Update
            $setPart = implode(', ', array_map(fn ($key) => "$key = ?", $keys));
            $sql = "UPDATE " . static::$table . " SET $setPart WHERE id = " . $this->id;
        } else {
            // Insert
            $keysPart = implode(', ', $keys);
            $placeholders = implode(', ', array_fill(0, count($keys), '?'));
            $sql = "INSERT INTO " . static::$table . " ($keysPart) VALUES ($placeholders)";
        }

        $stmt = self::$connection->prepare($sql);
        $stmt->execute($values);

        if (!isset($this->id)) {
            $this->id = self::$connection->lastInsertId();
        }
    }

    public function delete()
    {
        if (!isset($this->id)) {
            return;
        }

        $stmt = self::$connection->prepare("DELETE FROM " . static::$table . " WHERE id = ?");
        $stmt->execute([$this->id]);
    }

    public function __get($name)
    {
        return $this->attributes[$name] ?? null;
    }

    public function __set($name, $value)
    {
        $this->attributes[$name] = $value;
    }
}
