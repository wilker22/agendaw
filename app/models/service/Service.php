<?php
namespace app\models\service;
use app\core\Flash;
use app\models\dao\Dao;

class Service{       
    public static function lista($tabela){
        $dao = new Dao();
        return $dao->lista($tabela);
    }    
    public static  function get($tabela, $campo, $valor,$eh_lista=false){
        $dao = new Dao();
        return  $dao->get($tabela, $campo, $valor,$eh_lista);
    }  
    public static  function getEntre($tabela, $campo, $valor1, $valor2){
        $dao = new Dao();
        return  $dao->getEntre($tabela, $campo, $valor1, $valor2);
    } 
    public static  function getGeral($tabela, $campo,$operador, $valor,$eh_lista=false){
        $dao = new Dao();
        return  $dao->getGeral($tabela, $campo, $operador, $valor,$eh_lista);
    }    
    
    public static  function getLike($tabela, $campo, $valor,$eh_lista=false, $posicao=null){
        $dao = new Dao();
        return  $dao->getLike($tabela, $campo, $valor,$eh_lista, $posicao);
    } 
    
    public static  function getTotal($tabela, $campAgregacao, $campo=null,  $valor=null){
        $dao = new Dao();
        return  $dao->getTotal($tabela,  $campAgregacao, $campo,  $valor);
    }
    
    public static  function getSoma($tabela, $campAgregacao, $campo=null,  $valor=null){
        $dao = new Dao();
        return  $dao->getSoma($tabela, $campAgregacao, $campo,  $valor);
    }
    
    public static  function getMinimo($tabela, $campAgregacao, $campo=null,  $valor=null){
        $dao = new Dao();
        return  $dao->getMinimo($tabela,  $campAgregacao, $campo,  $valor);
    }
    
    public static  function getMaximo($tabela, $campAgregacao, $campo=null,  $valor=null){
        $dao = new Dao();
        return  $dao->getMaximo($tabela,  $campAgregacao, $campo,  $valor);
    }
    public static  function getMedia($tabela, $campAgregacao, $campo=null,  $valor=null){
        $dao = new Dao();
        return  $dao->getMedia($tabela,  $campAgregacao, $campo,  $valor);
    }
    
    public static function salvar($objeto, $campo, array $erros, $tabela){
        $resultado = false;
        if(!$erros){
            $dao = new Dao();            
            if($objeto->$campo){
                $resultado =  $dao->editar(objToArray($objeto),$campo, $tabela);                
                if($resultado){
                    Flash::setMsg("Registro Alterado com sucesso",1);
                }else{
                    Flash::setMsg("Nenhum Registro foi alterado", -1) ;
                }
            }else{
                $resultado =  $dao->inserir(objToArray($objeto), $tabela);
                if($resultado){
                    Flash::setMsg("Registro inserido com sucesso",1);
                }else{
                    Flash::setMsg("Não foi Possível Inserir os dados", -1) ;
                }
            }
            Flash::limpaForm();
            return $resultado;
        }else{
            Flash::limpaErro();
            Flash::setErro($erros);
        }
        return false;
    }
    
    public static function inserir($dados, $tabela){
        $dao = new Dao();
        return  $dao->inserir($dados, $tabela);
    }
    
    public static function editar($dados, $campo, $tabela){
        $dao = new Dao();
        return  $dao->editar($dados, $campo, $tabela);
    }
    
    public static function excluir($tabela, $campo, $valor){
        $dao = new Dao();
        return  $dao->excluir($tabela, $campo, $valor);
    }
   
}

