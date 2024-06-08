<?php

namespace App\Providers;

use PDO;

abstract class Model implements \JsonSerializable
{
    protected static $connection;
    protected static $table = '';
    protected $attributes = [];
    protected $fillable = [];
    protected $hidden = [];
    protected $primaryKey = 'id';
    protected $timestamps = true;

    public static function setConnection($connection)
    {
        self::$connection = $connection;
    }

    public function __construct(array $attributes = [])
    {
        $this->fill($attributes);
    }

    public function fill(array $attributes)
    {
        foreach ($attributes as $key => $value) {
            if (in_array($key, $this->fillable)) {
                $this->attributes[$key] = $value;
            }
        }
    }

    protected static function query()
    {
        return new QueryBuilder(self::$connection, static::$table, static::class);
    }

    public function hasOne($related, $foreignKey = null, $localKey = 'id')
    {
        $relatedInstance = new $related;
        $foreignKey = $foreignKey ?: $this->getForeignKey();
        return $relatedInstance::query()->where($foreignKey, $this->{$localKey});
    }

    public function hasMany($related, $foreignKey = null, $localKey = 'id')
    {
        $relatedInstance = new $related;
        $foreignKey = $foreignKey ?: $this->getForeignKey();
        return $relatedInstance::query()->where($foreignKey, $this->{$localKey});
    }

    public function belongsTo($related, $foreignKey = null, $ownerKey = 'id')
    {
        $relatedInstance = new $related;
        $foreignKey = $foreignKey ?: $this->getForeignKey();
        return $relatedInstance::query()->where($ownerKey, $this->{$foreignKey});
    }

    public function belongsToMany($related, $table = null, $foreignPivotKey = null, $relatedPivotKey = null, $parentKey = 'id', $relatedKey = 'id')
    {
        $relatedInstance = new $related;
        $table = $table ?: $this->getJoinTable($related);
        $foreignPivotKey = $foreignPivotKey ?: $this->getForeignKey();
        $relatedPivotKey = $relatedPivotKey ?: $relatedInstance->getForeignKey();

        return $relatedInstance::query()->select($relatedInstance::$table . '.*')
            ->join($table, $table . '.' . $relatedPivotKey, '=', $relatedInstance::$table . '.' . $relatedKey)
            ->where($table . '.' . $foreignPivotKey, $this->{$parentKey});
    }

    protected function getForeignKey()
    {
        return strtolower(static::class) . '_id';
    }

    protected function getJoinTable($related)
    {
        $models = [strtolower(static::class), strtolower($related)];
        sort($models);
        return implode('_', $models);
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
        $now = date('Y-m-d H:i:s');

        if (isset($this->attributes[$this->primaryKey])) {
            if ($this->timestamps) {
                $this->attributes['updated_at'] = $now;
            }
            $setPart = implode(', ', array_map(function ($key) {
                return "$key = :$key";
            }, $keys));
            $sql = "UPDATE " . static::$table . " SET $setPart WHERE {$this->primaryKey} = :{$this->primaryKey}";
        } else {
            if ($this->timestamps) {
                $this->attributes['created_at'] = $this->attributes['updated_at'] = $now;
            }
            $keys = array_keys($this->attributes);
            $placeholders = array_map(function ($key) {
                return ":$key";
            }, $keys);
            $sql = "INSERT INTO " . static::$table . " (" . implode(', ', $keys) . ") VALUES (" . implode(', ', $placeholders) . ")";
        }

        $stmt = self::$connection->prepare($sql);
        foreach ($this->attributes as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();

        if (!isset($this->attributes[$this->primaryKey])) {
            $this->attributes[$this->primaryKey] = self::$connection->lastInsertId();
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

    public function toArray()
    {
        $data = array_diff_key($this->attributes, array_flip($this->hidden));
        return $data;
    }

    public function toJson()
    {
        return json_encode($this->toArray());
    }

    public function jsonSerialize()
    {
        return $this->toArray();
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
