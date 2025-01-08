<?php

class ControllerTest extends Controller{

    private $test;
    public function __construct(){
        $this->test = $this->model('Test');
    }

    public function index(){
        echo "nice";
        $this->view('index');
    }

    public function show(){
        $test = $this->test->shows();
        var_dump($test);
    }
}