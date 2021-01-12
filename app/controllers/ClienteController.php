<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\ClienteService;
use app\util\UtilService;

class ClienteController extends Controller{

    private $tabela = "cliente";
    private $campo = "id_cliente";

    public function __construct()
   {
      $this->usuario = UtilService::getUsuario();
      if(!$this->usuario){
         $this->redirect(URL_BASE ."login");
         exit;
        
      }
      
   }
   
    public function index(){
       $dados["lista"] = Service::lista($this->tabela);
       $dados["view"]  = "Cliente/Index";
       $this->load("template", $dados);
    }
    
    public function create(){
        $dados["view"] = "Cliente/Create";
        $this->load("template", $dados);
    }
    
    public function edit($id)
    {
        $cliente = Service::get($this->tabela, $this->campo, $id);
        if(!$cliente){
            $this->redirect(URL_BASE. "cliente");
        }
        $dados ["cliente"] = $cliente;
        $dados["view"]      = "Cliente/Create";
        $this->load("template", $dados);
    }
    
    public function salvar()
    {
        $cliente = new \stdClass();
        $cliente->id_cliente = $_POST["id_cliente"];
        $cliente->cliente = $_POST["cliente"];
        $cliente->endereco = $_POST["endereco"];
        $cliente->complemento = $_POST["complemento"];
        $cliente->numero = $_POST["numero"];
        $cliente->bairro = $_POST["bairro"];
        $cliente->cidade = $_POST["cidade"];
        $cliente->uf = $_POST["uf"];
        $cliente->cep = $_POST["cep"];
        $cliente->celular = $_POST["celular"];
        $cliente->cpf = $_POST["cpf"];
        $cliente->sexo = $_POST["sexo"];
        $cliente->email = $_POST["email"];
        $cliente->senha = $_POST["senha"];
        $cliente->data_cadastro = date("Y-m-d");

        Flash::setForm($cliente);

        if(ClienteService::salvar($cliente, $this->campo, $this->tabela)){
            $this->redirect(URL_BASE."cliente");
        }else{
            if(!isset($cliente->id_cliente)){
                $this->redirect(URL_BASE."cliente/create");
            }else{
                $this->redirect(URL_BASE."cliente/edit/".$cliente->id_cliente);
            }

        }

    }
    
    public function excluir($id)
    {
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."cliente");
    }

    public function filtro ()
    {
        $campo = $_GET["campo"];
        $valor = $_GET["valor"];

        $dados["lista"] = Service::getLike($this->tabela, $campo, $valor, true);
        $dados["view"] = "Cliente/index";
        $this->load("template", $dados);
    }
}

