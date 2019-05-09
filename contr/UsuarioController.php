<?php

require_once "../model/Usuario.php";
require_once "../model/Rol.php";

class UsuarioController {

    public function __construct() {
        if(isset($_GET["action"])) {
            if(method_exists($this, $_GET["action"])) {
                $this->$_GET["action"]();
                if(session_status() != PHP_SESSION_ACTIVE) {
                    session_start();
                }
            }
            else{ 
                $this->giveError();
            }
        }
    }

    public function getAll() {
        $users = Usuario::getAll();
        $roles = Rol::getAll();
        include_once "../views/Usuario/main.php";
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

    public function insertUser() {
        if(isset($_POST["post1"])) {
            $user = new Usuario();
            $user->nomb1 = $_POST["field1"];
            $user->nomb2 = $_POST["field2"];
            $user->apellido1 = $_POST["field3"];
            $user->apellido2 = $_POST["field4"];
            $user->correo = $_POST["field5"];
            $user->cedula = $_POST["field6"];
            $user->contra = $_POST["field7"];
            $user->id_rol = $_POST["field8"];

            $this->getAll();
            if($user->insert()) {
                echo "<script>alert('¡Inserción correcta!')</script>";
            }
            else echo "<script>alert('¡Inserción incorrecta!')</script>";
        }
        else {
            $this->getAll();
        }
    }

    public function gotoLogin() {
        include "../views/Usuario/index.php";
    }

    public function createLogin() {

    }

    public function __destruct() {

    }

    public function giveError() {
        echo "<h1>Error - No se encuentra el recurso.</h1>";
    }

}

new UsuarioController();

?>