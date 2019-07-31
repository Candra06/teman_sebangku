<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voucher extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper("Response_Helper");
        $this->load->helper("Input_helper");
        $this->load->model("M_front");
        $this->load->model("MVoucher");
        // $this->load->model("MHistory");
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
        $data['header'] = "Data Voucher";
        $data['content'] = "Voucher/index";
        $data['data'] = $this->MVoucher->tampilData();
        $this->load->view('backend/index',$data);
    }

    public function Add()
    {
        $this->load->model("M_front");
        $data['title'] = "Backend-Teman Sebangku"; // title project
        $data['header'] = "Input Data Voucher";
        $data['content'] = "Voucher/Add";
        $this->load->view('backend/index',$data);
    }

    public function Input(){
        
        
        try {
            $p = $_POST;
            $date = date('Y-m-d H:i:s');
            $kode_voucher = $this->M_front->auto_kode(7); 
            $kode_history = $this->M_front->auto_kode(8);

            $voucher = [
                'kd_voucher' => $kode_voucher,
                'voucher' => $p['voucher'],
                'poin' => $p['poin'],
                'deskripsi' => $p['deskripsi'],
                'status' => 1
            ];

            $history = [
                'id_history' => $kode_history,
                'tanggal' => $date,
                'kd_akun' => $_SESSION['kode'],
                'aktivitas' => 'Menambah Data',
                'keterangan' => 'Menambah Bab '.$p['no_bab']
            ];
            $this->MVoucher->input_data($voucher);
            // $this->MHistory->input_data($history);
            $this->session->set_flashdata("message", ['success', 'Berhasil input data '.$this->uri->segment(1)]);
            redirect(base_url("Voucher"));
        } catch (Exception $e) {
            $this->session->set_flashdata("message", ['danger', 'Gagal input data '.$this->uri->segment(1)]);
            redirect(base_url("Voucher/Add"));
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