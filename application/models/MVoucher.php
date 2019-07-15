<?php

class MVoucher extends CI_Model{

    public function tampilData(){
        $q = $this->db->query("SELECT * FROM voucher");
        $ada = $q->result_array();
        return $ada;
    }

    public function hitung_data(){
        $q = $this->db->query("SELECT COUNT(kd_voucher) as jml_voucher FROM voucher");
        $ada = $q->row_array();
        return $ada['jml_voucher'];
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

    public function input_data($voucher)
    {
        $this->db->insert("voucher", $voucher);
    }
}
?>