<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\ClienteService;

class ClienteController extends Controller{

    private $tabela = "cliente";
    private $campo = "id_cliente";
   
    public function index(){
       $dados["lista"] = Service::lista($this->tabela);
       $dados["view"]  = "Cliente/Index";
       $this->load("template", $dados);
    }
    
    public function create(){
        $dados["view"] = "Cliente/Create";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $dados["view"]      = "Cliente/Create";
        $this->load("template", $dados);
    }
    
    public function salvar(){
    }
    
    public function excluir($id){
    }
}

