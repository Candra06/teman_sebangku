<?php

class MBlog extends CI_Model{

    public function tampilData(){
        $q = $this->db->query("SELECT * FROM blog");
        $ada = $q->result_array();
        return $ada;
    }
    public function hitung_data(){
        $q = $this->db->query("SELECT COUNT(judul) as jml_hikayat FROM hikayat");
        $ada = $q->row_array();
        return $ada['jml_hikayat'];
    }

    public function updateData($data, $kode){
        $this->db->update("blog", $data, ['kd_blog' => $kode]);
    }

    // public function deleteData($kode)
    // {
    //     $this->db->where('kd_anggota', $kode);
    //     $this->db->delete('anggota');
    //     return true;
    // }

    public function input_data($data)
    {
        $this->db->insert("blog", $data);
    }
}
?>