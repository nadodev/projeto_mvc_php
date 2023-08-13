<?php

namespace Source\App\Core;

use PDO;
use PDOException;
use Dotenv\Dotenv;

class Conexao {
    private $conexao;

    public function __construct() {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../../'); // Ajuste o caminho para a raiz do projeto
        $dotenv->load();

        $host = $_ENV['DB_HOST'];
        $port = $_ENV['DB_PORT'];
        $dbname = $_ENV['DB_DATABASE'];
        $usuario = $_ENV['DB_USERNAME'];
        $senha = $_ENV['DB_PASSWORD'];

        try {
            $this->conexao = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $usuario, $senha);
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
