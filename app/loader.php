<?php

include_once 'configs/config.php';

spl_autoload_register(function ($class){
    require_once 'libraries/'.$class.'.php';
});