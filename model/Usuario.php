<?php

require_once "../db/db.php";

class Usuario {

    public $id_usuario = 0;
    public $id_rol = 1;
    public $nomb1 = null;
    public $nomb2 = null;
    public $contra = null;
    public $apellido1 = null;
    public $apellido2 = null;
    public $correo = null;
    public $cedula = 0;

    public function __construct() {

    }

    public static function getAll() {
        $conx = new DB();
        $resultset = $conx->select("SELECT * FROM usuario INNER JOIN rol ON rol.id_rol = usuario.id_rol;");
        return $resultset;
    }

    public static function getFromID($id) {
        $conx = new DB();
        $resultset = $conx->select("SELECT * FROM usuario INNER JOIN rol ON rol.id_rol = usuario.id_rol WHERE id_usuario = $id;");
        return $resultset;
    }

    public function insert() {
        $conx = new DB();
        $return = $conx->execute("INSERT INTO usuario VALUES(null, {$this->id_rol}, '{$this->correo}', '{$this->contra}', '{$this->nomb1}', '{$this->nomb2}', '{$this->apellido1}', '{$this->apellido2}', {$this->cedula});");
        return $return;
    }

    public function edit() {
        $conx = new DB();
        $return = $conx->execute("UPDATE usuario SET id_rol = {$this->id_rol}, correo = '{$this->correo}', password = '{$this->contra}', nom1 = '{$this->nomb1}', nom2 = '{$this->nomb2}', apellido1 = '{$this->apellido1}', apellido2 = '{$this->apellido2}', dni = {$this->cedula} WHERE id_usuario = {$this->id_usuario};");
        return $return;
    }
    
    public static function erase($id) {
        $conx = new DB();
        $response = $conx->deletee("id_usuario", "usuario", $id);
    }

    public function __destruct() {

    }

}