<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper("Response_Helper");
        $this->load->helper(array('form', 'url'));
        $this->load->helper("Input_helper");
        $this->load->model("M_front");
        $this->load->model("MMenu");
        $this->load->library('upload');
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
        $data['header'] = "Data Menu";
        $data['content'] = "Menu/index";
        $data['data'] = $this->MMenu->tampilData();
        $this->load->view('backend/index',$data);
    }

    public function Add()
    {
        $this->load->model("M_front");
        $data['title'] = "Kopi Teman Sebangku"; // title project
        $data['header'] = "Input Data Menu";
        $data['content'] = "Menu/Add";
        $data['data'] = null;
        $this->load->view('backend/index',$data);
    }

    public function Edit($kd_menu)
    {
        $this->load->model("M_front");
        $data['title'] = "Kopi Teman Sebangku"; // title project
        $data['header'] = "Edit Menu";
        $data['content'] = "Menu/Add";
        $data['data'] = $this->db->get_where("menu", ['kd_menu' => $kd_menu])->row_array();
        $this->load->view('backend/index',$data);
    }

    public function Insert()
    {
        
        try {
            $p = $_POST;
            $date = date('Y-m-d H:i:s');
            $kode_menu = $this->M_front->auto_kode(5); 
            $kode_history = $this->M_front->auto_kode(8);
            $foto = $_FILES['foto_menu']['name'];

            if ($foto == '') {
                echo "<script type=text/javascript>alert(Foto masih kosong!');</script>";
            } else {
                // setting konfigurasi upload
                $config['upload_path'] = './foto/menu/';
                $config['allowed_types'] = 'jpg|png|jpeg|PNG';
                $config['file_name'] = 'menu_'.$p['menu'];
                $config['remove_space'] = TRUE;
                // $config['overwrite'] = TRUE;
                // $config['encrypt_name'] = TRUE;
                $config['max_size'] = 10000;
                // load library upload
                $this->upload->initialize($config);
                if($this->upload->do_upload('foto_menu')){
                    $foto = $config['upload_path'].$this->upload->data('file_name');
                }else{
                    echo "<script type=text/javascript>alert('Upload gagal!');</script>";
                    // echo $this->upload->display_errors('<p>', '</p>');

                }
                
            }
            
            // print_r($_FILES);
            // print_r($foto);
            $data = [
            'kd_menu' => $kode_menu,
            'menu' => $p['menu'],
            'deskripsi' => $p['deskripsi'],
            'foto' => $foto,
            'jenis' => $p['jenis'],
            'harga' => $p['harga'],
            'deskripsi' => $p['deskripsi'],
            'status' => 1
            ];

            // $history = [
            //     'id_history' => $kode_history,
            //     'tanggal' => $date,
            //     'kd_akun' => $_SESSION['kode'],
            //     'aktivitas' => 'Menambah Data',
            //     'keterangan' => 'Menambah judul hikayat '.$p['judul']
            // ];
            $this->MMenu->input_data($data);
            // $this->MHistory->input_data($history);
            $this->session->set_flashdata("message", ['success', 'Berhasil input data '.$this->uri->segment(1)]);
            redirect(base_url("Menu"));
            // echo 'berhasil menambah data';
        } catch (Exception $e) {
            $this->session->set_flashdata("message", ['danger', 'Gagal input data '.$this->uri->segment(1)]);
            redirect(base_url("Menu/Add"));
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