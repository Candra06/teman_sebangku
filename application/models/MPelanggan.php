<?php

class MPelanggan extends CI_Model{

    public function tampilData(){
        $q = $this->db->query("SELECT * FROM pelanggan");
        $ada = $q->result_array();
        return $ada;
    }

    public function hitung_data(){
        $q = $this->db->query("SELECT COUNT(kd_bab) as jml_bab FROM bab_hikayat");
        $ada = $q->row_array();
        return $ada['jml_bab'];
    }

    public function pilih_hikayat(){
        $q = $this->db->query("SELECT * FROM hikayat")->result_array();
        return $q;
    }

    public function updateData($array, $kode){
        $this->db->update("anggota", $array, ['kd_anggota' => $kode]);
    }

    public function deleteData($kode)
    {
        $this->db->where('kd_anggota', $kode);
        $this->db->delete('anggota');
        return true;
    }

    public function input_data($pelanggan)
    {
        $this->db->insert("pelanggan", $pelanggan);
    }
}
?>