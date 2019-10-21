<?php

namespace model;

use PDO;

class DBConnect
{
    public $dsn;
    public $user;
    public $password;

    public function __construct($dsn, $user, $password)
    {
        $this->dsn = $dsn;
        $this->user = $user;
        $this->password = $password;
    }

    public function connect()
    {
        $conn = null;
        try {
            $conn = new PDO($this->dsn, $this->user, $this->password);
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
        return $conn;
    }
}