<?php

include_once ('Database.php');

class barra {
    private $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function barraById($id) {
        $query     = "SELECT * FROM barra WHERE id = $id";
        $getDataRow   = $this->db->select($query);
        $result    = $getDataRow->fetch_assoc();
        return $result;
    }

    public function findeventoById($id) {
        $query     = "SELECT * FROM barra WHERE idevento = $id";
        $getDataRow   = $this->db->select($query);
        $result    = $getDataRow->fetch_assoc();
        return $result;
    }

}

?>