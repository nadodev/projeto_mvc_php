<?php


namespace Source\App\Core;

use PDO;
use PDOException;

class Conexao {
    private $host = "localhost";
    private $dbname = "usuarios";
    private $usuario = "root";
    private $senha = "";

    private $port = "3306";
    private $conexao;

    public function __construct() {
        try {
            $this->conexao = new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->dbname", $this->usuario, $this->senha);
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new \ErrorException("Erro na conexão: " . $e->getMessage());
        }
    }

    public function getConexao() {
        return $this->conexao;
    }

    public function fecharConexao() {
        $this->conexao = null;
    }
}


?>
