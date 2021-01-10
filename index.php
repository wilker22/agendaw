<?php
use app\core\Excecao;

session_start();
require_once 'config/config.php';
require_once 'app/core/Core.php';
require_once 'app/helper/helper.php';
require_once 'vendor/autoload.php';

try{
    $core = new Core;
    $core->run();
}catch (Error | Exception $e){
    $erro = new Excecao($e);
    $erro->mostrar();
}



