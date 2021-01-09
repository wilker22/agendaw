<?php

namespace app\models\service;

use app\core\Flash;
use app\models\dao\ClienteDao;
use app\models\validacao\ClienteValidacao;

class ClienteService
{
    public static function getCliente($id_cliente)
    {
        $dao = new ClienteDao();
        return $dao->getCliente($id_cliente);
    }
    
    public static function lista()
    {
        $dao = new ClienteDao();
        return $dao->lista();
    }

    public static function salvar($cliente)
    {
        $resultado = false;
        $validacao = ClienteValidacao::salvar($cliente);
        if($validacao->qtdeErro() <= 0){
            $dao = new ClienteDao();

            if(isset($cliente->id_cliente)){
                $resultado = $dao->editar(objToArray($cliente));
                if($resultado){
                    Flash::setMsg("Registro Alterado com Sucesso!");
                }else{
                    Flash::setMsg("Registro  NÃO Alterado!", -1);
                }
            }else{
                $resultado = $dao->inserir(objToArray($cliente));
                if($resultado){
                    Flash::setMsg("Registro inserido com Sucesso!");
                }else{
                    Flash::setMsg("Registro  NÃO inserido!", -1);
                }
            }
            Flash::limpaForm();
             
        }else{
            Flash::limpaErro();
            Flash::setErro($validacao->listaErros());
        }
        return $resultado;
    }

    
}