<?php

class Database
{
    private $pdo;

    public function __construct($host, $port, $dbName, $user, $password = '')
    {
        $dsn = "mysql:host=$host;port=$port;dbname=$dbName;user=$user;password=$password";
        $this->pdo = new PDO($dsn);
    }

    public function query($query)
    {
        $statement = $this->pdo->prepare($query);
        $statement->execute();

        return $statement; //statement obj
    }
}
