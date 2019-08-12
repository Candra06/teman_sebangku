<?php
class MAPI extends CI_Model{

    public function auth_login($array, $kode){
        $this->db->update("user", $array, ['kd_user' => $kode]);
    }

    public function insert_into($tabel, $value){
        $this->db->insert($tabel, $value);
    }

    public function update_data($tabel, $value, $key, $id){
        $this->db->update($tabel, $value, [$key => $id]);
    }

    public function get_data($tabel, $key=null){
        $q = "";
        if ($tabel == 'profil') {
            $q = "SELECT * FROM pelanggan WHERE kd_pelanggan = '$key'";
        } else if ($tabel == 'detail_menu') {
            $q = "SELECT * FROM menu WHERE kd_menu = '$key'";
        }elseif ($tabel == 'detail_outlet') {
            $q = "SELECT * FROM outlet WHERE kd_outlet = '$key'";
        }elseif ($tabel == 'outlet') {
            $q = "SELECT * FROM outlet WHERE status='1'";
        }elseif($tabel == 'menu'){
            $q = "SELECT * FROM menu  WHERE status='1'";
        }elseif ($tabel == 'blog') {
            $q = "SELECT * FROM blog  WHERE status='1'";
        }elseif ($tabel == 'promo') {
            $q = "SELECT * FROM promo  WHERE status='1'";
        }elseif ($tabel == 'karyawan') {
            $q = "SELECT * FROM karyawan  WHERE kd_karyawan='$key' AND status='1'";
        }elseif ($tabel == 'dt_promo') {
            $q = "SELECT * FROM promo  WHERE kd_promo='$key' AND status='1'";
        }
        $db_result = $this->db->query($q);
        $result_object = $db_result->result_array();
        return $result_object;
    }

    public function multi_data($tabel, $key=null, $user){
        $q = "";
        if ($tabel == 'detail_voucher') {
            $q = "SELECT dv.kd_detail, v.kd_voucher, v.voucher, v.deskripsi, p.nama, v.poin FROM detail_voucher dv, voucher v,  pelanggan p WHERE dv.status=1 AND v.kd_voucher='$key' AND p.kd_pelanggan='$user' AND dv.kd_voucher=v.kd_voucher AND dv.kd_pelanggan=p.kd_pelanggan";
        } elseif ($tabel == 'my_voucher') {
            $q = "SELECT v.*, dv.kd_detail FROM voucher v, detail_voucher dv WHERE dv.kd_voucher='$key' AND dv.kd_pelanggan='$user' AND dv.kd_voucher=v.kd_voucher AND dv.kd_pelanggan=p.kd_pelanggan";
        }elseif ($tabel == 'voucher_ku') {
            $q = "SELECT v.*, dv.kd_detail FROM voucher v, detail_voucher dv WHERE dv.kd_pelanggan='$user' AND dv.status=1";
        }
        
        $db_result = $this->db->query($q);
        $result_object = $db_result->result_array();
        return $result_object;
    }
}
?>