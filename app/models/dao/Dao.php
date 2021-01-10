<?php

namespace app\models\dao;

use app\core\Model;

class Dao extends Model
{
    public function lista($tabela)
    {
        return $this->all($this->db, $tabela);
    }

    public function get($tabela, $campo, $valor, $eh_lista)
    {
        return $this->find($this->db, $campo, $valor, $tabela, $eh_lista);
    }

    public function getEntre($tabela, $campo, $valor1, $valor2)
    {
        return $this->findEntre($this->db, $campo, $valor1, $valor2, $tabela);
    }

    public function getTotal($tabela, $campo, $valor, $campoAgregacao)
    {
        return $this->findAgrega($this->db, 'total', $campoAgregacao, $tabela, $campo, $valor);
    }

    public function getSoma($tabela, $campo, $valor, $campoAgregacao)
    {
        return $this->findAgrega($this->db, 'soma', $campoAgregacao, $tabela, $campo, $valor);
    }
    
    public function getMedia($tabela, $campo, $valor, $campoAgregacao)
    {
        return $this->findAgrega($this->db, 'media', $campoAgregacao, $tabela, $campo, $valor);
    }
    
    public function getMaximo($tabela, $campo, $valor, $campoAgregacao)
    {
        return $this->findAgrega($this->db, 'maximo', $campoAgregacao, $tabela, $campo, $valor);
    }
    
    public function getMinimo($tabela, $campo, $valor, $campoAgregacao)
    {
        return $this->findAgrega($this->db, 'minimo', $campoAgregacao, $tabela, $campo, $valor);
    }
    
    public function getLike($tabela, $campo, $valor, $eh_lista, $posicao)
    {
        return $this->findLike($this->db, $campo, $valor, $tabela, $eh_lista, $posicao);
    }

    public function getGeral($tabela, $campo, $operador, $valor, $eh_lista)
    {
        return $this->findGeral($this->db, $campo, $operador, $valor, $tabela, $eh_lista);
    }

    public function inserir($dados, $tabela)
    {
        return $this->add($this->db, $dados, $tabela);
    }

    public function editar($dados, $campo, $tabela)
    {
        return $this->edit($this->db, $dados, $campo, $tabela);
    }

    public function excluir ($tabela, $campo, $valor)
    {
        return $this->del($this->db, $campo, $valor, $tabela);
    }

}