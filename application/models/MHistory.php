<?php

class MHistory extends CI_Model{

    public function tampilData(){
        $q = $this->db->query("SELECT h.*, a.nama FROM history h JOIN akun a ON h.kd_akun=a.kd_akun");
        $ada = $q->result_array();
        return $ada;
    }

    public function updateData($hikayat, $kode){
        $this->db->update("hikayat", $hikayat, ['kd_hikayat' => $kode]);
    }

    // public function deleteData($kode)
    // {
    //     $this->db->where('kd_anggota', $kode);
    //     $this->db->delete('anggota');
    //     return true;
    // }

    public function input_data($history)
    {
        $this->db->insert("history", $history);
    }
}
?>