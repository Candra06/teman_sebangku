<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 function __construct()
  	{
		parent::__Construct();
		$this->load->helper("Response_helper");
		$this->load->helper("Input_helper");
		$this->load->model("M_front");
		// $this->load->model("MHistory");
		// $this->load->model("MAkun");
		$this->load->model("MOutlet");
		// $this->load->model("MBab");
		// if($_SERVER['REQUEST_METHOD'] == "POST"){
		// $this->register();
		// }
		if (!isset($_SESSION['kode'])) {
			redirect(base_url());
		}
		// if (session_destroy()) {
		// 	redirect(base_url());
		// }
  	}

	public function index()
	{
		$this->load->model("M_front");
        $data['title'] = "Admin"; // title project
        $data['header'] = "Dashboard";
		$data['content'] = "dashboard/index";
		// $data['data'] = $this->MHistory->tampilData();
		// $data['hitung_hikayat'] = $this->MHikayat->hitung_data();
		// $data['hitung_bab'] = $this->MBab->hitung_data();
		// $data['hitung_akun'] = $this->MAkun->hitung_data();
        // $data['data'] = $this->db->get_where("user", ['kd_user' => $_SESSION['kd']])->row_array();
		// $data['notif'] = $this->M_front->notifikasi();
		// echo "<pre>";
		// print_r($data);
        $this->load->view('backend/index',$data);
		
	}

	public function registrasi()
	{
		$this->load->model("M_front");
		$data['title'] = "Kopi Uber";
		$data['content'] = "home/register";
		$data['data_fakultas'] = $this->mProdi_Fakultas->tampilDataFakultas();
		$data['data_prodi'] = $this->mProdi_Fakultas->tampilDataProdi();
		$this->load->view('frontend/index',$data);
	}

	public function register(){
		$data = $this->mAnggota->registerAnggota();
		echo json_encode($data);
	}
	public function test(){
				echo "workds";
	}

	public function visi(){
		$this->load->model("M_front");
		$data['visi'] = $this->M_front->tampil_visi();
		
		echo json_encode();
	}

	public function logout(){
		session_destroy();
		redirect(base_url());
	}
	
  
}
