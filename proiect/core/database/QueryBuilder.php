<?php

namespace App\Core\Database;

class QueryBuilder{

    protected $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $statement = $this->pdo->prepare("select * from ${table}");

        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_CLASS);
    }

    /**
     * @return mixed
     */
    public function getPdo()
    {
        return $this->pdo;
    }

}