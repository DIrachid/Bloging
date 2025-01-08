<?php

class Database{

    private $host = DB_HOST;
    private $db_name = DB_NAME;
    private $user = DB_USER;
    private $pass = DB_PASSWORD;
    private $pdo;
    private $stm;

    public function __construct(){
        $dsn = "mysql:host=".$this->host.";dbname=".$this->db_name;
        try{
            $this->pdo = new PDO($dsn,$this->user,$this->pass);
        }catch(PDOException $e){
            die("You have an worng in database".$e->getMessage());
        }
    }

    public function __destruct(){
        if($this->pdo != null){
            $this->pdo = null;
        }

        if($this->stm != null){
            $this->stm = null;
        }
    }

    public function query($sql){
        $this->stm = $this->pdo->prepare($sql);
    }

    public function bind($param,$value,$type = null){
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stm->bindValue($param,$value,$type);
    }

    public function execute(){
        return $this->stm->execute();
    }

    public function fetch(){
        $row = $this->stm->fetch();
        return $row;
    }

    public function fetchAll(){
        $rows = $this->stm->fetchAll();
        return $rows;
    }

    public function count(){
        $count = $this->stm->rowCount();
        return $count;
    }
}