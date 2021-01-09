<?php

namespace app\models\service;

use app\models\dao\Dao;

class Service 
{
    public static function lista($tabela)
    {
        $dao = new Dao();
        return $dao->lista($tabela);
    }
}