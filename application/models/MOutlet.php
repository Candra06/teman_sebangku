<?php

class MOutlet extends CI_Model{

    public function tampilData(){
        $q = $this->db->query("SELECT * FROM outlet");
        $ada = $q->result_array();
        return $ada;
    }
    public function hitung_data(){
        $q = $this->db->query("SELECT COUNT(judul) as jml_hikayat FROM hikayat");
        $ada = $q->row_array();
        return $ada['jml_hikayat'];
    }

    public function updateData($outlet, $kode){
        $this->db->update("outlet", $outlet, ['kd_outlet' => $kode]);
    }

    // public function deleteData($kode)
    // {
    //     $this->db->where('kd_anggota', $kode);
    //     $this->db->delete('anggota');
    //     return true;
    // }

    public function input_data($outlet)
    {
        $this->db->insert("outlet", $outlet);
    }
}
?>