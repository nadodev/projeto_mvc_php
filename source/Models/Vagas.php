<?php

namespace Source\Models;

use Source\App\Core\Conexao;
use Source\App\Core\DB;
use Source\App\Core\Model;

class Vagas extends Model {
    protected $fillable = ['titulo', 'descricao', 'status', 'numero_vagas'];
    private $conexao;

    public function __construct() {
        $this->conexao = new Conexao();
        parent::__construct($this->conexao->getConexao());

    }

    public function getFillable() {
        return $this->fillable;
    }

    public function setFillable(array $fillable) {
        $this->fillable = $fillable;
    }


    public function listAllVagas() {
        try {
            $vagas = $this->find('vagas');
            return $vagas;
        } catch (\PDOException $e) {
            return [];
        }
    }

    public function saveVagas($vagasData) {
        
        return $this->save('vagas', $vagasData);
    }

    public function buscarVagaPorId($tabela, $id)
    {
        $vaga = $this->find('vagas', $id);

            return $vaga;
    }

}

    ?>