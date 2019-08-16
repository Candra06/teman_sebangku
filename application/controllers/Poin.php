<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poin extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper("Response_Helper");
        $this->load->helper(array('form', 'url'));
        $this->load->helper("Input_helper");
        $this->load->model("M_front");
        $this->load->model("MPoin");
        // $this->load->model("MHistory");
        if ($this->uri->segment(2) == "Add" && $_SERVER['REQUEST_METHOD'] == "POST") {
            $this->Insert();
        }elseif($this->uri->segment(2) == "Edit" && $_SERVER['REQUEST_METHOD'] == "POST"){
            $this->Update($this->uri->segment(3));
        }
        // if (session_destroy()) {
        //     redirect(base_url('App'));
        // }
        
    }

	public function index()
	{
        $this->load->model("M_front");
        $data['title'] = "Kopi Teman Sebangku"; // title project
        $data['header'] = "Pengaturan Poin";
        $data['content'] = "Poin/index";
        $data['data'] = $this->MPoin->tampilData();
        $this->load->view('backend/index',$data);
    }

    public function Add()
    {
        $this->load->model("M_front");
        $data['title'] = "Kopi Teman Sebangku"; // title project
        $data['header'] = "Input Data Poin";
        $data['content'] = "Poin/Add";
        $data['data'] = null;
        $this->load->view('backend/index',$data);
    }

    public function Edit($kd_poin)
    {
        $this->load->model("M_front");
        $data['title'] = "Kopi Teman Sebangku"; // title project
        $data['header'] = "Edit Poin";
        $data['content'] = "Poin/Add";
        $data['data'] = $this->db->get_where("poin", ['kd_poin' => $kd_poin])->row_array();
        $this->load->view('backend/index',$data);
    }

    public function Insert()
    {
        
        try {
            $p = $_POST;
            $date = date('Y-m-d H:i:s');
            $kode_poin = $this->M_front->auto_kode(3); 
            $kode_history = $this->M_front->auto_kode(8);
            
            $data = [
            'kd_poin' => $kode_poin,
            'aksi' => $p['aksi'],
            'tipe' => $p['tipe'],
            'jml_belanja' => $p['jml_belanja'],
            'jml_poin' => $p['jml_poin'],
            'status' => 1
            ];

            // $history = [
            //     'id_history' => $kode_history,
            //     'tanggal' => $date,
            //     'kd_akun' => $_SESSION['kode'],
            //     'aktivitas' => 'Menambah Data',
            //     'keterangan' => 'Menambah judul hikayat '.$p['judul']
            // ];
            $this->MPoin->input_data($data);
            // $this->MHistory->input_data($history);
            $this->session->set_flashdata("message", ['success', 'Berhasil input data '.$this->uri->segment(1)]);
            redirect(base_url("Poin"));
            // echo 'berhasil menambah data';
        } catch (Exception $e) {
            $this->session->set_flashdata("message", ['danger', 'Gagal input data '.$this->uri->segment(1)]);
            redirect(base_url("Poin/Add"));
            echo 'Gagal menambah data';
        } 
    }

    public function Update()
    {
        echo 'yuhuu';
    }

    public function Delete()
    {
        
    }
}