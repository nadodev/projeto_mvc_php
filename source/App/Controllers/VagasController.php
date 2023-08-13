<?php


namespace Source\App\Controllers;

session_start();

use Source\Helpers\ErrorHandler;
use Source\Helpers\FlashMessage;
use Source\App\Core\Controller;
use Source\App\Core\CsrfManager;
use Source\Config\Redirect;
use Source\Models\Vagas; 

class VagasController extends Controller {

    public function listAllVagas() {
        $csrfToken = CsrfManager::generateToken();

        $vagas = new Vagas();
        $vagas = $vagas->listAllVagas();


        echo $this->render("vagas/index", [
            "title" => "Lista de Usuários",
            "vagas" => $vagas,
            "csrfToken" => $csrfToken
        ]);
    }

    public function detalhesVagas($id) {
        $csrfToken = CsrfManager::generateToken();
        $vagas = new Vagas();
        $vagas = $vagas->buscarVagaPorId('vagas', $id);

        echo $this->render("vagas/detalhes", [
            "title" => "Detalhes da Vaga",
            "vagas" => $vagas[0],
            "csrfToken" => $csrfToken
        ]);
    }
}


?>