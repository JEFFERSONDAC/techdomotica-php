<?php

require_once "../db/db.php";

class Rol {

    public $tipo_rol = null;
    public $id_rol = 1;

    public function __construct() {

    }

    public static function getAll() {
        $conx = new DB();
        $resultset = $conx->select("SELECT * FROM rol;");
        return $resultset;
    }

    public static function getFromID($id) {
        $conx = new DB();
        $resultset = $conx->select("SELECT * FROM rol WHERE id_rol = $id;");
        return $resultset;
    }

    public function insert() {
        $conx = new DB();
        $return = $conx->execute("INSERT INTO rol VALUES(null, '{$this->tipo_rol}');");
        return $return;
    }

    public function edit() {
        $conx = new DB();
        $return = $conx->execute("UPDATE rol SET tipo_rol = '{$this->tipo_rol}' WHERE id_rol = {$this->id_rol};");
        return $return;
    }
    
    public static function erase($id) {
        $conx = new DB();
        $response = $conx->deletee("id_rol", "rol", $id);
    }

    public function __destruct() {

    }

}