<?php

class QueryBuilder
{
    protected $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $statement = $this->pdo->prepare("select * from {$table}");

        $statement->execute();

        return  $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function insert($table, $attributes)
    {
        $fields = array_keys($attributes);

        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', $fields),
            implode(', ', $this->mapParams($fields)),
        );

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($attributes);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function mapParams($fields)
    {
        return array_map(fn ($field) => ":$field", $fields);
    }
}
