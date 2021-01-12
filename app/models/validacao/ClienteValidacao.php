<?php

namespace app\models\validacao;

use app\core\Validacao;
use app\models\service\Service;

class ClienteValidacao 
{
    public static function salvar ($cliente)
    {
        $validacao = new Validacao();
         $validacao->setData("cliente", $cliente->cliente);
         $validacao->setData("cpf", $cliente->cpf);
         $validacao->setData("cep", $cliente->cep);
         $validacao->setData("bairro", $cliente->bairro);
         $validacao->setData("cidade", $cliente->cidade);
         $validacao->setData("uf", $cliente->uf);
         $validacao->setData("email", $cliente->email);
         
         //valida
         $validacao->getData("cliente")->isVazio()->isMinimo(5);
         $validacao->getData("cpf")->isVazio()->isCpf();
         $validacao->getData("cep")->isVazio();
         $validacao->getData("bairro")->isVazio();
         $validacao->getData("cidade")->isVazio();
         $validacao->getData("uf")->isVazio();
         $validacao->getData("email")->isEmail();

         if($cliente->email && !$cliente->id_cliente){
             $existe = Service::get("cliente", "email", $cliente->email);
             if($existe && $cliente->id_cliente != $existe->id_cliente){
                 $validacao->getData("email")->isUnico(1);
             }
         }
         
         return $validacao;

    }
}