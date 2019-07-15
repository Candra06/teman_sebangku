<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper("Response_Helper");
        $this->load->helper('url');
        $this->load->helper("Input_helper");
        $this->load->model("M_front");
        $this->load->model("MKaryawan");
        $this->load->model("MUser");
        $this->load->model("MOutlet");
        if ($this->uri->segment(2) == "Add" && $_SERVER['REQUEST_METHOD'] == "POST") {
            $this->Insert();
        }
        
    }

	public function index()
	{
        $this->load->model("M_front");
        $data['title'] = "Backend TemanSebangku"; // title project
        $data['header'] = "Data Karyawan";
        $data['content'] = "Karyawan/index";
        $data['data'] = $this->MKaryawan->tampilData();
        $this->load->view('backend/index',$data);
    }

    public function Add()
    {
        $this->load->model("M_front");
        $data['title'] = "Backend-Teman Sebangku"; // title project
        $data['header'] = "Input Data Karyawan";
        $data['content'] = "Karyawan/Add";
        $data['outlet'] = $this->MOutlet->tampilData();
        $this->load->view('backend/index',$data);
    }

    public function Edit($kd_karyawan)
    {
        $this->load->model("M_front");
        $data['title'] = "Backend-Teman Sebangku"; // title project
        $data['header'] = "Edit Data Karyawan";
        $data['content'] = "Karyawan/Add";
        $data['outlet'] = $this->MOutlet->tampilData();
        $data['data'] = $this->db->get_where("karyawan", ['kd_karyawan' => $kd_karyawan])->row_array();
        $data['user'] = $this->db->get_where("user", ['kd_karyawan' => $kd_karyawan])->row_array();
        $this->load->view('backend/index',$data);
    }

    public function Insert()
    {
        $p = $_POST;
        $date = date('Y-m-d H:i:s');
        $kode_karyawan = $this->M_front->auto_kode(8); 
        $kode_user = $this->M_front->auto_kode(15);
        try {
            
            $karyawan = [
            'kd_karyawan' => $kode_karyawan,
            'nama' => $p['nama'],
            'alamat' => $p['alamat'],
            'kd_outlet' => $p['outlet'],
            'no_hp' => $p['no_hp'],
            'jabatan' => $p['jabatan'],
            'create_at' => $date,
            'create_by' => 'admin',
            'status' => 1
            ];

            $user = [
                'kd_user' => $kode_user,
                'kd_karyawan' => $kode_karyawan,
                'level' => $p['jabatan'],
                'username' => $p['username'],
                'password' => md5($p['password']),
                'status' => 1
                ];

            // $history = [
            //     'id_history' => $kode_history,
            //     'tanggal' => $date,
            //     'kd_akun' => $_SESSION['kode'],
            //     'aktivitas' => 'Menambah Data',
            //     'keterangan' => 'Menambah judul hikayat '.$p['judul']
            // ];
            $this->MKaryawan->input_data($karyawan);
            $this->MUser->input_data($user);
            // $this->MHistory->input_data($history);
            $this->session->set_flashdata("message", ['success', 'Berhasil input data '.$this->uri->segment(1)]);
            redirect(base_url("Karyawan"));
            echo 'berhasil menambah data';
        } catch (Exception $e) {
            $this->session->set_flashdata("message", ['danger', 'Gagal input data '.$this->uri->segment(1)]);
            redirect(base_url("Karyawan/Add"));
            echo 'Gagal menambah data';
        } 
    }


    public function tolak($kode)
    {
        
    }
}