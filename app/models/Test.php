<?php

class Test{

    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function shows(){
        $this->db->query("select * from posts");
        $this->db->execute();
        return $this->db->fetchAll();
    }
}