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

    public static function get($tabela, $campo, $valor, $eh_lista=false)
    {
        $dao = new Dao();
        return $dao->get($tabela, $campo, $valor, $eh_lista);
    }

    public static function getEntre($tabela, $campo, $valor1, $valor2)
    {
        $dao = new Dao();
        return $dao->getEntre($tabela, $campo, $valor1, $valor2);
    }


    public static function getTotal($tabela, $campoAgregacao, $campo=null, $valor=null)
    {
        $dao = new Dao();
        return $dao->getTotal($tabela, $campoAgregacao, $campo, $valor);
    }

    public static function getSoma($tabela, $campoAgregacao, $campo=null, $valor=null)
    {
        $dao = new Dao();
        return $dao->getSoma($tabela, $campoAgregacao, $campo, $valor);
    }

    public static function getMedia($tabela, $campoAgregacao, $campo=null, $valor=null)
    {
        $dao = new Dao();
        return $dao->getMedia($tabela, $campoAgregacao, $campo, $valor);
    }

    public static function getMaximo($tabela, $campoAgregacao, $campo=null, $valor=null)
    {
        $dao = new Dao();
        return $dao->getMaximo($tabela, $campoAgregacao, $campo, $valor);
    }

    public static function getMinimo($tabela, $campoAgregacao, $campo=null, $valor=null)
    {
        $dao = new Dao();
        return $dao->getMinimo($tabela, $campoAgregacao, $campo, $valor);
    }
    
    public static function getLike($tabela, $campo, $valor, $eh_lista=false, $posicao=null)
    {
        $dao = new Dao();
        return $dao->getLike($tabela, $campo, $valor, $eh_lista, $posicao);
    }

    public static function getGeral($tabela, $campo, $operador, $valor, $eh_lista=false)
    {
        $dao = new Dao();
        return $dao->getGeral($tabela, $campo, $operador, $valor, $eh_lista);
    }

    public static function salvar($objeto, $campo, $erros=[], $tabela)
    {
        $resultado = false;
        
        if(!$erros){
            $dao = new Dao();
 
            if($objeto->$campo){
                $resultado = $dao->editar(objToArray($objeto), $campo, $tabela);
                if($resultado){
                    Flash::setMsg("Registro ALTERADO com Sucesso!");
                }else{
                    Flash::setMsg("Registro  NÃO Alterado!", -1);
                } 
            }else{
                $resultado = $dao->inserir(objToArray($objeto), $tabela);
                if($resultado){
                    Flash::setMsg("Registro INSERIDO com Sucesso!");
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

    public static function inserir ($dados, $tabela)
    {
        $dao = new Dao();
        return  $dao->inserir($dados, $tabela);
    }

    public static function editar($dados, $campo, $tabela)
    {
        $dao = new Dao();
        return  $dao->inserir($dados, $campo, $tabela);
    }

    public static function excluir($tabela, $campo, $valor)
    {
        $dao = new Dao();
        $excluir =$dao->excluir($tabela, $campo, $valor);

        if($excluir){
            Flash::setMsg("Registro EXCLUÍDO com Sucesso!");
        }else{
            Flash::setMsg("Registro  NÃO EXCLUÍDO!", -1);
        }
    }
}