<?php

namespace Source\App\Controllers;
use Source\App\Core\Controller;

class Web extends Controller
{
    public function home(){
        echo $this->render("home/home", [
            "title" => "Home | " ,
            "description" => "Descrição do site",
        ]);
    }
}
?>
