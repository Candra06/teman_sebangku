<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

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
       $this->load->model("MFrontEnd");
     
     }


	 public function index()
	 {
		 $this->load->model("M_front");
		 $data['title'] = "Kopi Teman Sebangku"; // title project
		 $data['content'] = "index";
		 $data['blog'] = $this->MFrontEnd->blog();
		 $data['menu'] = $this->MFrontEnd->menu();
		 $this->load->view('frontend/index',$data);
	 }
}