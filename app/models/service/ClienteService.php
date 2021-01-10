<?php

namespace app\models\service;

use app\core\Flash;
use app\models\dao\ClienteDao;
use app\models\validacao\ClienteValidacao;

class ClienteService
{
    public static function salvar($objeto, $campo, $tabela)
    {
        $validacao = ClienteValidacao::salvar($objeto);
        return Service::salvar($objeto, $campo, $validacao->listaErros(), $tabela);
    }
    
}