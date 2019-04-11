<?php

require_once "../config/config.php";

class DB {

    private $conx = null;

    public function __construct() {
        $this->conx = new mysqli(_HOST, _USER, _PSWD, _DB, _PORT);
        if($this->conx->errno == 0) {
            $this->conx->set_charset("utf8");
        }
    }

    public function select($query) {
        $rs = $this->conx->query($query);
        if($rs == null) {
            return null;
        }
        else if($rs->num_rows >= 0) {
            /*$returnArray = [];
            while($rsx = $rs->fetch_assoc()) {
                $returnArray = $rsx;
            }
            die();*/
            //return $returnArray;
            return $rs;
        }
        else return null;
        $this->conx->close();
        return $rs;
    }

    public function execute($query) {
        $value = $this->conx->query($query);
        $this->conx->close();
        return $value;
    }

    public function deletee($field, $table, $value) {
        $value = $this->conx->query("DELETE FROM $table WHERE $field = $value;");
        $this->conx->close();
        return $value;
    }

}