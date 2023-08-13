<?php


namespace Source\App\Controllers;
use Source\Helpers\ErrorHandler;
use Source\Helpers\FlashMessage;
session_start();
use Source\App\Core\Controller;
use Source\App\Core\CsrfManager;
use Source\Config\Redirect;
use Source\Models\User; 

class UserController extends Controller {

    public function listAllUsers() {
        $csrfToken = CsrfManager::generateToken();
        $user = new User();
        $users = $user->listAllUsers();


        echo $this->render("usuarios/index", [
            "title" => "Lista de Usuários",
            "users" => $users,
            "csrfToken" => $csrfToken
        ]);
    }


    public function store() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            ErrorHandler::throwError("Erro ao criar usuário.");
        }
    
        $csrfToken = $_POST['csrf_token'] ?? null;
        if (!$csrfToken || !CsrfManager::validateToken($csrfToken)) {
            ErrorHandler::throwError("Token CSRF inválido.");
        }
    
        $userModel = new User();
        $postData = $_POST;
        $fillableFields = $userModel->getFillable();
        $fillableData = array_intersect_key($postData, array_flip($fillableFields));
        $fillableData['password'] = password_hash($fillableData['password'], PASSWORD_DEFAULT);
    
        $emailExist = $userModel->verifyEmailExist($fillableData['email']);
        if ($emailExist) {
            FlashMessage::set('error', 'Email já está em uso.');
            Redirect::to("/usuarios");
        }
    
        $result = $userModel->saveUser($fillableData);
        if ($result) {
            FlashMessage::set('success', 'Usuário criado com sucesso.');
            Redirect::to("/usuarios");
        } else {
            ErrorHandler::throwError("Erro ao criar usuário.");
        }
    }
    
}


?>