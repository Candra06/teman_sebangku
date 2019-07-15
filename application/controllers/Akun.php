<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper("Response_Helper");
        $this->load->helper('url');
        $this->load->helper("Input_helper");
        $this->load->model("M_front");
        $this->load->model("MAkun");
        $this->load->model("MHistory");
        if ($this->uri->segment(2) == "Add" && $_SERVER['REQUEST_METHOD'] == "POST") {
            $this->Input();
        }
        
    }

	public function index()
    {
        $this->load->model("M_front");
        $data['title'] = "Backend-Hikayat"; // title project
        $data['header'] = "Data Akun";
        $data['content'] = "akun/index";
        $data['data'] = $this->MAkun->tampilData();
        $this->load->view('backend/index',$data);
    }

    public function Add()
    {
        $this->load->model("M_front");
        $data['title'] = "Backend-Hikayat"; // title project
        $data['header'] = "Input Data Akun";
        $data['content'] = "Akun/add";
        $this->load->view('backend/index',$data);
    }

    public function Input(){
        $p = $_POST;
        $date = date('Y-m-d H:i:s');
        $kode_akun = $this->M_front->auto_kode(5); 
        $kode_history = $this->M_front->auto_kode(8);
        try {
            $akun = [
                'kd_akun' => $kode_akun,
                'nama' => $p['nama'],
                'username' => $p['username'],
                'password' => md5($p['password']),
                'status' => $p['status'],
            ];

            $history = [
                'id_history' => $kode_history,
                'tanggal' => $date,
                'kd_akun' => $_SESSION['kode'],
                'aktivitas' => 'Menambah Data',
                'keterangan' => 'Menambah akun '.$p['nama']
            ];
            $this->MAkun->input_data($akun);
            $this->MHistory->input_data($history);
            $this->session->set_flashdata("message", ['success', 'Berhasil input data '.$this->uri->segment(1)]);
            redirect(base_url("Akun"));
        } catch (Exception $e) {
            $this->session->set_flashdata("message", ['danger', 'Gagal input data '.$this->uri->segment(1)]);
            redirect(base_url("Akun/Add"));
            // echo 'Gagal menambah data';
        }
       
    }

}