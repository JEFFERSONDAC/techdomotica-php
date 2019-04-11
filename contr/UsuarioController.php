<?php

require_once "../model/Usuario.php";
require_once "../model/Rol.php";

class UsuarioController {

   public function __construct() {
        if(isset($_GET["action"])) {
            if(method_exists($this, $_GET["action"])) {
                $accion = $_GET["action"];
                $this->$accion();
            }
            else{ 
                $this->giveError();
            }
        }
    }

    public function getAll() {
        $users = Usuario::getAll();
        $roles = Rol::getAll();
        include_once "../views/Usuario/index.php";
    }

    public function erase() {
        $response = Usuario::erase( (isset($_GET["id"]) ? $_GET["id"] : -1) );
        header("Location: ../contr/UsuarioController.php?action=getAll");
    }

    public function modify() {
        $user = Usuario::getFromID( (isset($_GET["id"]) ? $_GET["id"] : -1) );
        $roles = Rol::getAll();
        include "../views/Usuario/modify.php";
    }

    public function __destruct() {

    }

    public function giveError() {
        echo "<h1>Error - No se encuentra el recurso.</h1>";
    }

}

new UsuarioController();

?>