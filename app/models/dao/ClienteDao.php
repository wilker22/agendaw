<?php

namespace app\models\dao;

use app\core\Model;

class ClienteDao extends Model
{
    protected $tabela = "cliente";
    
    public function getCliente($id_cliente)
    {
        return $this->find($this->db, "id_cliente", $id_cliente);
    }
    
    public function lista()
    {
        $sql = "SELECT * FROM cliente";
        return $this->select($this->db, $sql);
    }

    public function inserir($cliente)
    {
         return $this->add($this->db, $cliente);
    }

    public function editar($cliente)
    {
        return $this->edit($this->db, $cliente, "id_cliente");
    }

    public function excluir($id_cliente)
    {
        return $this->del($this->db, "id_cliente", $id_cliente);
    }
}
