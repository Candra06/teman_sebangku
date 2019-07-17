<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper("Response_Helper");
        $this->load->helper("Input_helper");
        $this->load->model("M_front");
        $this->load->model("MPelanggan");
        $this->load->model("MHistory");
        $this->load->helper(array('form', 'url'));
        if ($this->uri->segment(2) == "Add" && $_SERVER['REQUEST_METHOD'] == "POST") {
            $this->Input();
        }
        // if (session_destroy()) {
        //     redirect(base_url('App'));
        // }
        
    }

	public function index()
	{
        $this->load->model("M_front");
        $data['title'] = "Backend-Teman Sebangku"; // title project
        $data['header'] = "Data Pelanggan";
        $data['content'] = "Pelanggan/index";
        $data['data'] = $this->MPelanggan->tampilData();
        $this->load->view('backend/index',$data);
    }

    public function Add()
    {
        $this->load->model("M_front");
        $data['title'] = "Backend-Teman Sebangku"; // title project
        $data['header'] = "Input Data Pelanggan";
        $data['content'] = "Pelanggan/Add";
        $data['data'] = null;
        $this->load->view('backend/index',$data);
    }

    public function Edit($kd_pelanggan)
    {
        $this->load->model("M_front");
        $data['title'] = "Backend-Teman Sebangku"; // title project
        $data['header'] = "Edit Data Pelanggan";
        $data['content'] = "Pelanggan/Add";
        $data['data'] = $this->db->get_where("pelanggan", ['kd_pelanggan' => $kd_pelanggan])->row_array();
        
        $this->load->view('backend/index',$data);
    }

    public function Input(){
        
        
        try {
            $p = $_POST;
            $date = date('Y-m-d H:i:s');
            $kode_pelanggan = $this->M_front->auto_kode(10); 
            $kode_history = $this->M_front->auto_kode(8);
           

            $pelanggan = [
                'kd_pelanggan' => $kode_pelanggan,
                'nama' => $p['nama'],
                'no_hp' => $p['no_hp'],
                'email' => $p['username'],
                'password' => $p['password'],
                'alamat' => $p['alamat'],
                'gender' => $p['gender'],
                'tgl_lahir' => $p['tgl_lahir'],
                'domisili' => $p['domisili'],
                'poin' => 0,
                'status' => 1
            ];

            $history = [
                'id_history' => $kode_history,
                'tanggal' => $date,
                'kd_akun' => $_SESSION['kode'],
                'aktivitas' => 'Menambah Data',
                'keterangan' => 'Menambah Bab '.$p['no_bab']
            ];
            $this->MPelanggan->input_data($pelanggan);
            // $this->MHistory->input_data($history);
            $this->session->set_flashdata("message", ['success', 'Berhasil input data '.$this->uri->segment(1)]);
            redirect(base_url("Pelanggan"));
        } catch (Exception $e) {
            $this->session->set_flashdata("message", ['danger', 'Gagal input data '.$this->uri->segment(1)]);
            redirect(base_url("Pelanggan/Add"));
            // echo 'Gagal menambah data';
        }
       
    }

    // function do_upload() {
    //     // setting konfigurasi upload
    //     $config['upload_path'] = '.asset/audio/';
    //     $config['allowed_types'] = 'audio/mpeg|audio/mpeg3|audio/mpg|audio/x-mpeg|audio/mp3|application/force-download|application/octet-stream';
    //     // load library upload
    //     $this->load->library('upload', $config);
    //     if (!$this->upload->do_upload('gambar')) {
    //         $error = $this->upload->display_errors();
    //         // menampilkan pesan error
    //         print_r($error);
    //     } else {
    //         $result = $this->upload->data();
    //         echo "<pre>";
    //         print_r($result);
    //         echo "</pre>";
    //     }
    // }
}