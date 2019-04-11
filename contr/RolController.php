<?php

require_once "../model/Rol.php";

class RolController {

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
        $roles = Rol::getAll();
        include_once "../views/Rol/index.php";
    }

    public function erase() {
        $response = Rol::erase( (isset($_GET["id"]) ? $_GET["id"] : -1) );
        header("Location: ../contr/RolController.php?action=getAll");
    }

    public function modify() {
        $roles = Rol::getFromID( (isset($_GET["id"]) ? $_GET["id"] : -1) );
        include "../views/Rol/modify.php";
    }

    public function __destruct() {

    }

    public function giveError() {
        echo "<h1>Error - No se encuentra el recurso.</h1>";
    }

}

new RolController();

?>