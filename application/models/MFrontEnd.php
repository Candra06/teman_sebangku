<?php

class MFrontEnd extends CI_Model{

    public function tampilData(){
        $q = $this->db->query("SELECT h.*, a.nama FROM history h JOIN akun a ON h.kd_akun=a.kd_akun");
        $ada = $q->result_array();
        return $ada;
    }

    public function updateData($hikayat, $kode){
        $this->db->update("hikayat", $hikayat, ['kd_hikayat' => $kode]);
    }

    public function menu(){
        $q = $this->db->query("SELECT * FROM menu WHERE status=1");
        $ada = $q->result_array();
        return $ada;
    }

    public function blog(){
        $q = $this->db->query("SELECT * FROM blog WHERE status=1");
        $ada = $q->result_array();
        return $ada;
    }
    public function outlet(){
        $q = $this->db->query("SELECT * FROM outlet WHERE status=1");
        $ada = $q->result_array();
        return $ada;
    }

    public function promo(){
        $q = $this->db->query("SELECT * FROM promo WHERE status=1");
        $ada = $q->result_array();
        return $ada;
    }

    public function det_blog($kode){
        $q = $this->db->query("SELECT * FROM blog WHERE kd_blog='$kode' AND status=1");
        $ada = $q->result_array();
        return $ada;
    }
}
?>