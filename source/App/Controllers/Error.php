<?php 

namespace Source\App\Controllers;
use Source\App\Core\Controller;
defineErrors();
class Error extends Controller
{

   public function error($data){
        echo $this->render("errors/index", [
            "title" => "ERRO | ". $data["errcode"] ,
            "description" => "Descrição do site",
            "error" => $data["errcode"],
        ]);
    }
}