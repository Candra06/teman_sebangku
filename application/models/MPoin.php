<?php

class MPoin extends CI_Model{

    public function tampilData(){
        $q = $this->db->query("SELECT * FROM poin");
        $ada = $q->result_array();
        return $ada;
    }

    public function updateData($data, $kode){
        $this->db->update("poin", $data, ['kd_poin' => $kode]);
    }

    // public function deleteData($kode)
    // {
    //     $this->db->where('kd_anggota', $kode);
    //     $this->db->delete('anggota');
    //     return true;
    // }

    public function input_data($data)
    {
        $this->db->insert("poin", $data);
    }
}
?>