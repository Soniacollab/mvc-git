<?php

use App\controllers\HomeController;


require_once 'src/config/settings.php';
require_once 'src/services/Router.php';

spl_autoload_register(function($classename)
{
   
    $path = str_replace('\\','/',$classename);
    
    // On remplace "App" par "src" => src\Controllers\RegisterController
    $path = str_replace('App','src',$path);
    
    // On ajoute l'extension .php => src\Controllers\RegisterController.php
    $filename = $path.'.php';
    
    // on inclut le fichier s'il existe 
    if(file_exists($filename)){
        include $filename;// include src/Controllers/RegisterController.php
    }
});


//vérifie si une route spécifique a été demandée, si non alors on charge la page home
if (!isset($_GET['page'])) {
    $url = 'home';
} else {
    $url = $_GET['page'];
}


// Create router
$router = new Router($url);


// Instanciate controller
$controllerInstance = $router->getController();


switch ($url) {
    case 'home':
        $controllerInstance->display();
        break;

    default:
        echo "Erreur 404 : page non trouvée.";
        break;
}

