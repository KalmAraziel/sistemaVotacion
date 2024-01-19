<?php 
    
    require_once "models/DataBase.php";

    if(!isset($_GET['c'])) {        
        require_once "controllers/InicioController.php";
        $controlador = new InicioController();     
        call_user_func(array($controlador, "Inicio"));
    } else {       
        $controlador = $_GET['c'];         
        $rutaController = "controllers/".ucwords($controlador)."Controller.php";           
        
        require_once  $rutaController;                 
        $controlador = ucwords($controlador)."Controller";       
        $controlador = new $controlador;
        $accion = isset($_GET['a']) ? $_GET['a'] : "Inicio";
        call_user_func(array($controlador, $accion));       
    }
?>