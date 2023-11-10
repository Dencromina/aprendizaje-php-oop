<?php

include_once ('Database.php');

class venta {
    private $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function ventaById($idven) {
        $query     = "SELECT * FROM venta WHERE idventa = $idven";
        $getDataRow   = $this->db->select($query);
        $result    = $getDataRow->fetch_assoc();
        return $result;
    }

    public function findeventoById($ideven) {
        $query     = "SELECT * FROM venta WHERE idevento = $ideven";
        $getDataRow   = $this->db->select($query);
        $result    = $getDataRow->fetch_assoc();
        return $result;
    }

    public function findbarraById($idbar) {
        $query     = "SELECT * FROM venta WHERE idbarra = $idbar";
        $getDataRow   = $this->db->select($query);
        $result    = $getDataRow->fetch_assoc();
        return $result;
    }

    public function findbebidaById($idbeb) {
        $query     = "SELECT * FROM venta WHERE idbebida = $idbeb";
        $getDataRow   = $this->db->select($query);
        $result    = $getDataRow->fetch_assoc();
        return $result;
    }

    public function findprecioById($valor) {
        $query     = "SELECT * FROM venta WHERE precio = $valor";
        $getDataRow   = $this->db->select($query);
        $result    = $getDataRow->fetch_assoc();
        return $result;
    }

    public function findmetodo_pagoById($idmet) {
        $query     = "SELECT * FROM venta WHERE idmetodo_pago = $idmet";
        $getDataRow   = $this->db->select($query);
        $result    = $getDataRow->fetch_assoc();
        return $result;
    }

    public function totalVentaById($total) {
        $query     = "SELECT 
        round(sum(precio*cantidad),0)
        AS total FROM venta
        WHERE id = $total";
        $getDataRow   = $this->db->select($query);
        $result    = $getDataRow->fetch_assoc();
        $total = $result['total'];
        return $total;
    }

}

?>