<?php

include_once ('Database.php');

class evento {
    private $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function eventoById($id) {
        $query     = "SELECT * FROM evento WHERE id = $id";
        $getDataRow   = $this->db->select($query);
        $result    = $getDataRow->fetch_assoc();
        return $result;
    }

}

?>