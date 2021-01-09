<?php

namespace app\models\dao;

use app\core\Model;

class Dao extends Model
{
    public function lista($tabela)
    {
        return $this->all($this->db, $tabela);
    }

    public function get($tabela, $campo, $valor)
    {
        return $this->find($this->db, $tabela, $campo, $valor);
    }

    public function inserir($dados, $tabela)
    {
        return $this->add($this->db, $dados, $tabela);
    }

    public function editar($dados, $campo, $tabela)
    {
        return $this->edit($this->db, $dados, $campo, $tabela);
    }
}