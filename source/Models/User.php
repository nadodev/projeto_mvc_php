<?php

namespace Source\Models;

use Source\App\Core\Conexao;
use Source\App\Core\DB;
use Source\App\Core\Model;

class User extends Model {
    protected $fillable = ['nome', 'email', 'password', 'username', 'created_at', 'updated_at'];
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


    public function listAllUsers() {
        try {
            $users = $this->find('usuarios');
            return $users;
        } catch (\PDOException $e) {
            return [];
        }
    }

    public function saveUser($userData) {
        
        return $this->save('usuarios', $userData);
    }

    public function verifyEmailExist(string $email)  : bool{
      return $this->verifyEmailById('usuarios', $email);
    }
    
}

    ?>