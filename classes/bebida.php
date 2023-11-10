<?php

include_once ('Database.php');

class bebida {
    private $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function bebidaById($id) {
        $query     = "SELECT * FROM bebida WHERE id = $id";
        $getDataRow   = $this->db->select($query);
        $result    = $getDataRow->fetch_assoc();
        return $result;
    }

}

?>