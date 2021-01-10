<?php

namespace app\core;

use Exception;

abstract class Model{
    protected $db;
    protected $tabela;
    
    public function __construct() {
        $this->db = Conexao::getConexao();
    }
    
    //Serve para fazer consultas utilizando parametros
   function consultar($conn, $sql, $parametro = array(), $isLista=true ){        
        $stmt = $conn->prepare($sql);
        if(!$parametro){
            throw new Exception("É necessário enviar os parâmetros para o método consultar");
        }
        
        try {
            foreach($parametro as $chave=>$valor){
                $stmt->bindValue(":$chave", $valor);
            }
            $stmt->execute();
            if($isLista){
                return $stmt->fetchAll(\PDO::FETCH_OBJ);
            }else{
                return $stmt->fetch(\PDO::FETCH_OBJ);
            }
        }catch (\PDOException $e){
            throw new \Exception($e->getMessage());
        }    
     }
     
     //Serve para fazer consultas diversas, sem parâmetros
     function select($conn, $sql, $isLista=true ){              
         try {
             $stmt = $conn->query($sql); 
             if($isLista){
                 return $stmt->fetchAll(\PDO::FETCH_OBJ);
             }else{
                 return $stmt->fetch(\PDO::FETCH_OBJ);
             }
         }catch (\PDOException $e){
             throw new \Exception($e->getMessage());
         }
     }
     
     //Retorna uma lista da tabela
     function all($conn, $tabela =null){
         $tabela = ($tabela) ? $tabela: $this->tabela;
         try {
             $sql = "SELECT * FROM ". $tabela;
             $stmt = $conn->query($sql);
             return $stmt->fetchAll(\PDO::FETCH_OBJ);
            
         }catch (\PDOException $e){
             throw new \Exception($e->getMessage());
         }
     }
     
     //Retorna uma consulta por um campo
     function find($conn, $campo, $valor, $tabela=null, $isLista=false ){
         $tabela = ($tabela) ? $tabela: $this->tabela;
         try {
             $sql = "SELECT * FROM ". $tabela . " WHERE " . $campo . " =:campo " ;
             $stmt = $conn->prepare($sql);
             $stmt->bindValue(":campo", $valor);
             $stmt->execute();
             if($isLista){
                 return $stmt->fetchAll(\PDO::FETCH_OBJ);
             }else{
                 return $stmt->fetch(\PDO::FETCH_OBJ);
             }
             
         }catch (\PDOException $e){
             throw new \Exception($e->getMessage());
         }
     }
     
     
     function add($conn, $dados, $tabela=null ){ 
         $tabela = ($tabela) ? $tabela: $this->tabela;
         if(!$dados){
             throw new Exception("É necessário enviar os parâmetros para o método add");
         }         
         
         if(!is_array($dados)){
             throw new Exception("Para poder inserir os dados os valores precisam está em forma de array");
         } 
        try {
            $campos 	= implode(", " , array_keys($dados));
            $valores 	= ":" . implode(", :" , array_keys($dados));            
            $sql = "INSERT INTO {$tabela} ({$campos}) VALUES ({$valores}) ";
            $stmt = $conn->prepare($sql);
            foreach($dados as $chave=>$valor){
                $stmt->bindValue(":$chave", $valor);
            }
            if ($stmt->execute()){
                return $conn->lastInsertId();
            }
            return false;
        } catch (Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
    
    function edit($conn, $dados, $campo, $tabela =null){
        $tabela = ($tabela) ? $tabela: $this->tabela;
        $parametro = null;
        
        if(!$dados){
            throw new Exception("É necessário enviar os parâmetros para o método edit");
        }
        
        if(!is_array($dados)){
            throw new Exception("Para poder editar os dados os valores precisam está em forma de array");
        } 
        
        try {
            foreach($dados as $chave=>$valor){
                $parametro .="$chave=:$chave, ";
            }
            $condicao = $campo ." = " . $dados[$campo];
            $parametro = rtrim($parametro, ', ');
            
            $sql = "UPDATE {$tabela} SET {$parametro} WHERE {$condicao} ";
            $stmt = $conn->prepare($sql);
            foreach($dados as $chave=>$valor){
                $stmt->bindValue(":$chave", $valor);
            }
            $stmt->execute();
            return $stmt->rowCount() ;
        } catch (Exception $e) {
            throw new \Exception($e->getMessage());
        }
        
    }
    
    function del($conn, $campo, $valor,$tabela=null){
        $tabela = ($tabela) ? $tabela: $this->tabela;
        
        if(!$campo || !$valor){
            throw new Exception("É necessário enviar o campo e o valor para fazer a exclusão");
        }        
        try {
            $sql  = "DELETE FROM {$tabela} WHERE {$campo} = :valor";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(":valor", $valor);
            $stmt->execute();
            return $stmt->rowCount() ;
        } catch (Exception $e) {
            throw new \Exception($e->getMessage());
        }
        
    }
}
