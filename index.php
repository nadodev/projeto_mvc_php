<?php 

require __DIR__ . '/vendor/autoload.php';
use CoffeeCode\Router\Router;
defineErrors();

$templates = new League\Plates\Engine('views');
$router = new Router(URL_BASE);


/**
*  Namespaces da pasta controllers
*/
$router->namespace("Source\App\Controllers");

$router->group(null);



/**
* Rota: / (home)
* Controller: Web
* Método: home 
*/

$router->get("/", "Web:home");




/**
* Rota: / (contato)
* Controller: Contato
* Método: contact 
*/
$router->get("/contato",  "Contato:contact");

/**
* Rota: / (usuarios)
* Controller: UserController
* Método: index 
*/
$router->get("/usuarios",  "UserController:listAllUsers");
$router->post("/usuarios/store",  "UserController:store");

/**
*  Group Error
*/

$router->group("ops");

/**
* Rota: / (ops/404)
* Controller: Error
* Método: error 
*/

$router->get("/{errcode}",  "Error:error");


$router->dispatch();

if ($router->error()) {
$router->redirect("/ops/{$router->error()}");
}