<?php

class MKaryawan extends CI_Model{

    public function tampilData(){
        $q = $this->db->query("SELECT k.*, o.nama_outlet as outlet, 
        (CASE WHEN (k.jabatan = '1') THEN 'Admin'
        WHEN (k.jabatan = '2') THEN 'Manajer'
        WHEN (k.jabatan = '3') THEN 'Karyawan' 
        ELSE 'Kasir' END) as jabatan FROM karyawan k JOIN outlet o ON k.kd_outlet=o.kd_outlet");
        $ada = $q->result_array();
        return $ada;
    }
    public function hitung_data(){
        $q = $this->db->query("SELECT COUNT(judul) as jml_karyawan FROM karyawan");
        $ada = $q->row_array();
        return $ada['jml_karyawan'];
    }

    public function updateData($karyawan, $kode){
        $this->db->update("karyawan", $karyawan, ['kd_karyawan' => $kode]);
    }

    // public function deleteData($kode)
    // {
    //     $this->db->where('kd_anggota', $kode);
    //     $this->db->delete('anggota');
    //     return true;
    // }

    public function input_data($karyawan)
    {
        $this->db->insert("karyawan", $karyawan);
    }
}
?>