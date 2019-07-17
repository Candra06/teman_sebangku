<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outlet extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper("Response_Helper");
        $this->load->helper(array('form', 'url'));
        $this->load->helper("Input_helper");
        $this->load->model("M_front");
        $this->load->model("MOutlet");
        $this->load->model("MHistory");
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
        $data['title'] = "Backend-Hikayat"; // title project
        $data['header'] = "Data Outlet";
        $data['content'] = "Outlet/index";
        $data['data'] = $this->MOutlet->tampilData();
        $this->load->view('backend/index',$data);
    }

    public function Add()
    {
        $this->load->model("M_front");
        $data['title'] = "Backend-Hikayat"; // title project
        $data['header'] = "Input Data Outlet";
        $data['content'] = "Outlet/Add";
        $data['data'] = null;
        $this->load->view('backend/index',$data);
    }

    public function Edit($kd_outlet)
    {
        $this->load->model("M_front");
        $data['title'] = "Backend-Hikayat"; // title project
        $data['header'] = "Input Data Outlet";
        $data['content'] = "Outlet/Add";
        $data['data'] = $this->db->get_where("outlet", ['kd_outlet' => $kd_outlet])->row_array();
        $this->load->view('backend/index',$data);
    }

    public function Insert()
    {
        
        try {
            $p = $_POST;
            $date = date('Y-m-d H:i:s');
            $kode_outlet = $this->M_front->auto_kode(8); 
            $kode_history = $this->M_front->auto_kode(8);
            $foto = $_FILES['foto_outlet']['name'];

            if ($foto == '') {
                echo "<script type=text/javascript>alert(Foto masih kosong!');</script>";
            } else {
                // setting konfigurasi upload
                $config['upload_path'] = './foto/outlet/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['file_name'] = 'outlet_'.$p['nama'];
                $config['remove_space'] = TRUE;
                // load library upload
                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('foto_outlet')){
                    echo "<script type=text/javascript>alert('Upload gagal!');</script>";
                    
                }else{
                    $foto = $this->upload->data('file_name');
                }
                
            }
            
            // print_r($_FILES);
            $outlet = [
            'kd_outlet' => $kode_outlet,
            'nama_outlet' => $p['nama'],
            'alamat' => $p['alamat'],
            'open' => $p['open'],
            'closed' => $p['closed'],
            'foto' => $foto,
            'create_at' => $date,
            'create_by' => 'admin',
            'status' => 1
            ];

            // $history = [
            //     'id_history' => $kode_history,
            //     'tanggal' => $date,
            //     'kd_akun' => $_SESSION['kode'],
            //     'aktivitas' => 'Menambah Data',
            //     'keterangan' => 'Menambah judul hikayat '.$p['judul']
            // ];
            $this->MOutlet->input_data($outlet);
            // $this->MHistory->input_data($history);
            $this->session->set_flashdata("message", ['success', 'Berhasil input data '.$this->uri->segment(1)]);
            redirect(base_url("Outlet"));
            echo 'berhasil menambah data';
        } catch (Exception $e) {
            $this->session->set_flashdata("message", ['danger', 'Gagal input data '.$this->uri->segment(1)]);
            redirect(base_url("Outlet/Add"));
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