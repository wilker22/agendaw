<?php

namespace app\models\dao;

use app\core\Model;

class Dao extends Model
{
    public function lista($tabela)
    {
        return $this->all($this->db, $tabela);
    }
}