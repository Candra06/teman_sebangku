<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promo extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper("Response_Helper");
        $this->load->helper(array('form', 'url'));
        $this->load->helper("Input_helper");
        $this->load->model("M_front");
        $this->load->model("MPromo");
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
        $data['header'] = "Data Promo";
        $data['content'] = "Promo/index";
        $data['data'] = $this->MPromo->tampilData();
        $this->load->view('backend/index',$data);
    }

    public function Add()
    {
        $this->load->model("M_front");
        $data['title'] = "Kopi Teman Sebangku"; // title project
        $data['header'] = "Input Data Promo";
        $data['content'] = "Promo/Add";
        $data['data'] = null;
        $this->load->view('backend/index',$data);
    }

    public function Edit($kd_Promo)
    {
        $this->load->model("M_front");
        $data['title'] = "Kopi Teman Sebangku"; // title project
        $data['header'] = "Input Data Promo";
        $data['content'] = "Promo/Add";
        $data['data'] = $this->db->get_where("Promo", ['kd_Promo' => $kd_Promo])->row_array();
        $this->load->view('backend/index',$data);
    }

    public function Insert()
    {
        
        try {
            $p = $_POST;
            $date = date('Y-m-d H:i:s');
            $kode_promo = $this->M_front->auto_kode(5); 
            $kode_history = $this->M_front->auto_kode(8);
            $foto = $_FILES['foto_promo']['name'];

            if ($foto == '') {
                echo "<script type=text/javascript>alert(Foto masih kosong!');</script>";
            } else {
                // setting konfigurasi upload
                $config['upload_path'] = './foto/promo/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['file_name'] = 'promo_'.$p['promo'];
                $config['remove_space'] = TRUE;
                // load library upload
                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('foto_promo')){
                    echo "<script type=text/javascript>alert('Upload gagal!');</script>";
                    
                }else{
                    $foto = $config['upload_path'].$this->upload->data('file_name');
                }
                
            }
            
            // print_r($_FILES);
            $promo = [
            'kd_promo' => $kode_promo,
            'judul_promo' => $p['promo'],
            'syarat_ketentuan' => $p['sk'],
            'tgl_mulai' => $p['mulai'],
            'tgl_akhir' => $p['akhir'],
            'foto' => $foto,
            'poin' => $p['poin'],
            'status' => 1
            ];

            // $history = [
            //     'id_history' => $kode_history,
            //     'tanggal' => $date,
            //     'kd_akun' => $_SESSION['kode'],
            //     'aktivitas' => 'Menambah Data',
            //     'keterangan' => 'Menambah judul hikayat '.$p['judul']
            // ];
            $this->MPromo->input_data($promo);
            // $this->MHistory->input_data($history);
            $this->session->set_flashdata("message", ['success', 'Berhasil input data '.$this->uri->segment(1)]);
            redirect(base_url("Promo"));
            echo 'berhasil menambah data';
        } catch (Exception $e) {
            $this->session->set_flashdata("message", ['danger', 'Gagal input data '.$this->uri->segment(1)]);
            redirect(base_url("Promo/Add"));
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