<?php

class MUser extends CI_Model{

    public function tampilData(){
        $q = $this->db->query("SELECT * FROM user");
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

    public function input_data($user)
    {
        $this->db->insert("user", $user);
    }
}
?>