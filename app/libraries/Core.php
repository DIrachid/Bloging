<?php

class Core{

    private $Controller = "Test";

    Private $method = "index";

    private $Param = [];

    public function __construct(){
        $url = $this->geturl();
        if(isset($url[0])){
            if(file_exists('../app/controllers/Controller'.ucwords($url[0]).'.php')){
                $this->Controller = ucwords($url[0]);
                unset($url[0]);
            }
        }

        require_once '../app/controllers/Controller'.$this->Controller.'.php';

        $controller = 'Controller'.$this->Controller;

        $this->Controller = new $controller;

        if(isset($url[1])){
            if(method_exists($this->Controller,$url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->Param = $url ? array_values($url) : [];

        call_user_func_array([$this->Controller,$this->method],$this->Param);


    }

    public function geturl(){
        if(isset($_GET['url'])){
            $url = $_GET['url'];
            $url = filter_var($url,FILTER_SANITIZE_URL);
            $url = rtrim($url , '/');
            $url = explode('/',$url);
            return $url;
        }
    }

}

?>