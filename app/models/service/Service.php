<?php

namespace app\models\service;

use app\core\Flash;
use app\models\dao\Dao;

class Service 
{
    public static function lista($tabela)
    {
        $dao = new Dao();
        return $dao->lista($tabela);
    }

    public static function get($tabela, $campo, $valor)
    {
        $dao = new Dao();
        return $dao->get($tabela, $campo, $valor);
    }

    public static function salvar($objeto, $campo, $erros=[], $tabela)
    {
        $resultado = false;
        
        if(!$erros){
            $dao = new Dao();

            if(isset($objeto->campo)){
                $resultado = $dao->editar(objToArray($objeto), $campo, $tabela);
                if($resultado){
                    Flash::setMsg("Registro Alterado com Sucesso!");
                }else{
                    Flash::setMsg("Registro  NÃO Alterado!", -1);
                }
            }else{
                $resultado = $dao->inserir(objToArray($objeto), $tabela);
                if($resultado){
                    Flash::setMsg("Registro inserido com Sucesso!");
                }else{
                    Flash::setMsg("Registro  NÃO inserido!", -1);
                }
            }
            Flash::limpaForm();
             
        }else{
            Flash::limpaErro();
            Flash::setErro($erros);
        }
        return $resultado;
    }
}