<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class API extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // $this->load->helper("input_helper");
        $this->load->model("MAPI");
        $this->load->model("M_front");
    }

    public function index(){
        header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");
    }

    public function auth_login(){
        $p = $_POST;
        $pass = md5($p['password']);
        $auth_code = $this->M_front->get_kode(25);
        $login = $this->db->query("SELECT user.*, user.level, (CASE when user.level = 1 then karyawan.nama WHEN user.level = 3 then pelanggan.nama end) as nama FROM `user` LEFT JOIN karyawan ON user.kd_akses=karyawan.kd_karyawan LEFT JOIN pelanggan ON user.kd_akses=pelanggan.kd_pelanggan WHERE user.username='$p[email]'")->row_array();
        if ($login > 1 ) {
            if ($login['status_auth'] == 1) {
                
                $batas = mktime(0,0,0,date("n"),date("j")+7,date("Y"));
                $exp = date("Y-m-d", $batas);
                
                $array = [
                    'last_login' => date('Y-m-d h:i:s'),
                    'auth_key' => $auth_code,
                    'exp_date' => $exp,
                    'status_auth' => 1
                ];
                $data_auth = [
                    'auth_key' => $auth_code,
                    'kd_akses' => $login['kd_akses'],
                    'level' => $login['level'],
                    'exp_date' => $exp,
                    'username' => $login['username'],
                    'nama' => $login['nama'] 
                ];
                $this->MAPI->auth_login($array, $login['kd_user']);
                $data['respon'] = [
                    'pesan' => 'Login Berhasil',
                    'boollogin' => true,
                    'data' => $data_auth
                ];
            } else {
                $data['respon'] = [
                    'pesan' => 'Akun tidak aktif',
                    'boollogin' => FALSE];
            }
            
        } else {
            $data['respon'] = [
                'pesan' => 'Login Gagal',
                'boollogin' => FALSE
            ];
            print_r($login);
        }
        echo json_encode($data, JSON_PRETTY_PRINT);
        
    }

    public function get_data(){
        $auth = $this->input->post('kode');
        $batas = date("Y-m-d");
        $cek_auth = $this->db->get_where("user", ["auth_key" =>$auth])->row_array();
        if ($cek_auth > 1) {
            if ($cek_auth['exp_date'] > $batas && $cek_auth['status_auth'] == 1) {
                $tipe = $this->input->post('tipe');
                if ($tipe == 'profil') {
                    $data['data']  = $this->MAPI->get_data('profil', $cek_auth['kd_akses']);
                } else if ($tipe == 'detail_outlet') {
                    $kode = $this->input->post('kd_outlet');
                    $data['data'] = $this->MAPI->get_data('detail_outlet', $kode);
                }else if($tipe == 'myvoucher'){
                    $kode = $this->input->post('kd_voucher');
                    $me = $this->input->post('kd_user');
                    $data['data'] = $this->MAPI->multi_data('detail_voucher', $kode, $me);
                }elseif ($tipe == 'detail_menu') {
                    $kode = $this->input->post('kd_menu');
                    $data['data'] = $this->MAPI->get_data('detail_menu', $kode);
                }elseif ($tipe == 'menu') {
                    $data['data'] = $this->MAPI->get_data('menu');
                }elseif ($tipe == 'outlet') {
                    $data['data'] = $this->MAPI->get_data('outlet');
                }elseif ($tipe == 'detail_voucher') {
                    $kode = $this->input->post('kd_voucher');
                    $me = $this->input->post('kd_user');
                    $data['data'] = $this->MAPI->multi_data('my_voucher', $kode, $me);
                }elseif ($tipe == 'promo') {
                    $data['data'] = $this->MAPI->get_data('promo');
                }elseif ($tipe == 'blog') {
                    $data['data'] = $this->MAPI->get_data('blog');
                }else if($tipe == 'voucher'){
                    $data['data'] = $this->MAPI->multi_data('voucher_ku', '', $cek_auth['kd_akses']);
                }else if($tipe == 'kasir_profil'){
                    $data['data'] = $this->MAPI->get_data('karyawan', $cek_auth['kd_akses']);
                }elseif ($tipe == 'detail_promo') {
                    $kode = $this->input->post('kd_promo');
                    $data['data'] = $this->MAPI->get_data('dt_promo', $kode);
                }
            } else {
                $data['respon'] = [
                    'pesan' => 'Kode auth expired, silahkan login kembali',
                    'bool' => true
                ];
            }
            
        } else {
            $data['respon'] = [
                'pesan' => 'kode auth salah'
            ];
        }
        echo json_encode($data);
    }

    public function input_data(){
        $date = date("Y-m-d");
        $tipe = $this->input->post("tipe");
        if ($tipe == 'cek_nohp') {
            $no_hp = $this->input->post('no_hp');
            $logg = $this->db->get_where("karyawan", ["no_hp" => $no_hp])->row_array();
            if ($logg > 0) {
                $data['respon'] = [
                    'pesan' => 'Selamat datang karyawan',
                    'status' => 2,
                    'boollogin' => true
                ];
            }else{
                $log = $this->db->get_where("pelanggan", ["no_hp" => $no_hp])->row_array();
                if ($log > 0) {
                    $data['respon'] = [
                        'pesan' => 'Selamat datang pelanggan',
                        'status' => 3,
                        'boollogin' => true
                    ];
                }else{
                    $data['respon'] = [
                        'pesan' => 'Selamat datang',
                        'status' => 0,
                        'boollogin' => true
                    ];
                }
            }
        } else if ($tipe == 'login') {
            $no_hp = $this->input->post('no_hp');
            $cek = $this->db->get_where("karyawan", ["no_hp" => $no_hp])->row_array();
            if ($cek > 0) { 
                // karyawan
                $p = $_POST;
                $pass = md5($p['password']);
                $auth_code = $this->M_front->get_kode(25);
                $login = $this->db->get_where("user", ['kd_akses' => $cek['kd_karyawan']] )->row_array();
                if($pass == $login['password']){
                    $batas = mktime(0,0,0,date("n"),date("j")+7,date("Y"));
                    $exp = date("Y-m-d", $batas);
                    
                    $array = [
                        'last_login' => date('Y-m-d h:i:s'),
                        'auth_key' => $auth_code,
                        'exp_date' => $exp,
                        'status_auth' => 1
                    ];

                    $data_auth = [
                        'auth_key' => $auth_code,
                        'kd_akses' => $login['kd_akses'],
                        'level' => $login['level'],
                        'exp_date' => $login['exp_date'],
                        'username' => $login['username'],
                        'nama' => $cek['nama'],
                        'no_hp' => $cek['no_hp'] 
                    ];

                    $this->MAPI->update_data('user', $array, 'kd_akses', $cek['kd_karyawan']);
                    $data['respon'] = [
                        'pesan' => 'Login Berhasil',
                        'boollogin' => true,
                        'data' => $array,
                        'user' => $data_auth,
                        'auth_key' => $auth_code,
                        'kd_akses' => $login['kd_akses'],
                        'level' => $login['level'],
                        'exp_date' => $login['exp_date'],
                        'username' => $login['username'],
                        'nama' => $cek['nama'],
                        'status' => 1,
                        'no_hp' => $cek['no_hp'] 
                    ];
                }else {
                    $data['respon'] = [
                        'pesan' => 'Login gagal',
                        'status' => 1,
                        'boollogin' => false
                    ];
                }
                // $data['respon'] = [
                //     'pesan' => 'UMetode salah2',
                //     'boollogin' => false
                // ];
                   
            }else {
                $log = $this->db->get_where("pelanggan", ["no_hp" => $no_hp])->row_array();
                $aksi = $this->input->post('aksi');
                if ($log > 1) { // pelanggan
                    
                        $p = $_POST;
                        $pass = md5($p['password']);
                        $auth_code = $this->M_front->get_kode(25);
                        $login = $this->db->get_where("user", ['kd_akses' => $log['kd_pelanggan']] )->row_array();
                        if($pass == $login['password']){
                            $batas = mktime(0,0,0,date("n"),date("j")+7,date("Y"));
                            $exp = date("Y-m-d", $batas);
                            
                            $array = [
                                'last_login' => date('Y-m-d h:i:s'),
                                'auth_key' => $auth_code,
                                'exp_date' => $exp,
                                'status_auth' => 1
                            ];

                            $data_auth = [
                                'auth_key' => $auth_code,
                                'kd_akses' => $login['kd_akses'],
                                'level' => $login['level'],
                                'exp_date' => $login['exp_date'],
                                'username' => $login['username'],
                                'nama' => $log['nama'],
                                'no_hp' => $log['no_hp'] 
                            ];

                            $this->MAPI->update_data('user', $array, 'kd_akses', $log['kd_pelanggan']);
                            $data['respon'] = [
                                'pesan' => 'Login Berhasil',
                                'boollogin' => true,
                                'data' => $array,
                                'user' => $data_auth,
                                'auth_key' => $auth_code,
                                'kd_akses' => $login['kd_akses'],
                                'level' => $login['level'],
                                'exp_date' => $login['exp_date'],
                                'username' => $login['username'],
                                'nama' => $log['nama'],
                                'status' => 2,
                                'no_hp' => $log['no_hp'] 
                            ];
                        }else{
                            $data['respon'] = [
                                'pesan' => 'Login gagal',
                                'boollogin' => false
                            ];
                        }
                    }else {
                        // pelanggan baru
                        $pass = md5($this->input->post('password'));
                        $kode = $this->M_front->get_kode(8);
                        $kd_user = $this->M_front->get_kode(15);
                        $auth_code = $this->M_front->get_kode(25);
                        $batas = mktime(0,0,0,date("n"),date("j")+7,date("Y"));
                        $exp = date("Y-m-d", $batas);
                        $arr = [
                            'kd_pelanggan' => $kode,
                            'no_hp' => $no_hp,
                            'status' => 0
                        ];
                        $usr = [
                            'kd_user' => $kd_user,
                            'kd_akses' => $kode,
                            'status' => 0,
                            'level' => 3,
                            'password' => $pass,
                            'last_login' => date('Y-m-d h:i:s'),
                            'auth_key' => $auth_code,
                            'exp_date' => $exp,
                            'status_auth' => 1
                        ];
                        $session = [
                            'kd_user' => $kd_user,
                            'kd_akses' => $kode,
                            'status' => 0,
                            'level' => 3,
                            'password' => $pass,
                            'last_login' => date('Y-m-d h:i:s'),
                            'auth_key' => $auth_code,
                            'exp_date' => $exp,
                            'status_auth' => 1,
                            'username' => '',
                            'nama' => '',
                            'auth_key' => '',
                        ];

                        $data['respon'] = [
                            'pesan' => 'Input Berhasil',
                            'data' => $arr,
                            'user' => $session,
                            'boollogin' => true
                        ];
                        $this->generate_qr($kode);
                        $this->MAPI->insert_into('pelanggan', $arr);
                        $this->MAPI->insert_into('user', $usr);
                
                }
            }
        } else if($tipe == 'register'){
            $akses = $this->input->post('kd_user');
            $email = $this->input->post('email');
            $nama = $this->input->post('nama');
            $arr = [
                'email' => $email,
                'nama' => $nama,
                'poin' => 100,
                'status' => 1
            ];
            $usr = [
                'username' => $email,
                'status' => 1
            ];
            $this->MAPI->update_data('pelanggan', $arr, 'kd_pelanggan', $akses);
            $this->MAPI->update_data('user', $usr, 'kd_akses', $akses);
            $data['respon'] = [
                'pesan' => 'Input Berhasil',
                'data_pelanggan' => $arr,
                'data_user' => $usr,
                'bool' => true
            ];
        }elseif ($tipe == 'complete') {
            $auth = $this->input->post('kode');
            // $alamat = $this->input->post('alamat');
            $gender = $this->input->post('gender');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $domisili = $this->input->post('domisili');
            $kode = $this->input->post('kode_user');
            $batas = date("Y-m-d");
            $get_poin = $this->db->get_where("pelanggan", ["kd_pelanggan" =>$kode])->row_array();
            $poin = (int)$get_poin['poin'] + 100;
            $cek_auth = $this->db->get_where("user", ["auth_key" =>$auth])->row_array();
            if ($cek_auth > 1) {
                if ($cek_auth['exp_date'] > $batas && $cek_auth['status_auth'] == 1){
                    $arr = [
                        // 'alamat' => $alamat,
                        'gender' => $gender,
                        'tgl_lahir' => $tgl_lahir,
                        'domisili' => $domisili,
                        'status' => 2,
                        'poin' => $poin
                    ];
                    $this->MAPI->update_data('pelanggan', $arr, 'kd_pelanggan', $kode);
                    $data['respon'] = [
                        'pesan' => 'Input Berhasil',
                        'data' => $arr,
                        'savedata' => true
                    ];
                } else {
                    $data['respon'] = [
                        'pesan' => 'Kode auth kadaluarsa, silahkan login kembali'
                    ];
                }
                
            } else {
                $data['respon'] = [
                    'pesan' => 'Kode auth salah'
                ];
            }
        }elseif ($tipe == 'edit') {
            $auth = $this->input->post('kode');
            $alamat = $this->input->post('alamat');
            $gender = $this->input->post('gender');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $domisili = $this->input->post('domisili');
            $kode = $this->input->post('kode_user');
            $batas = date("Y-m-d");
            $cek_auth = $this->db->get_where("user", ["auth_key" =>$auth])->row_array();
            if ($cek_auth > 1) {
                if ($cek_auth['exp_date'] > $batas && $cek_auth['status_auth'] == 1){
                    $arr = [
                        'alamat' => $alamat,
                        'gender' => $gender,
                        'tgl_lahir' => $tgl_lahir,
                        'domisili' => $domisili
                    ];
                    $this->MAPI->update_data('pelanggan', $arr, 'kd_pelanggan', $kode);
                    $data['respon'] = [
                        'pesan' => 'Update Berhasil',
                        'data' => $arr,
                        'savedata' => true
                    ];
                } else {
                    $data['respon'] = [
                        'pesan' => 'Kode auth kadaluarsa, silahkan login kembali'
                    ];
                }
                
            } else {
                $data['respon'] = [
                    'pesan' => 'Kode auth salah'
                ];
            }
        }elseif ($tipe == 'klaim') {
            $auth = $this->input->post('kode');
            $vocher = $this->input->post('voucher');
            $user = $this->input->post('kd_pelanggan');
            $kd_detail = $this->M_front->get_kode(10);
            $array = [
                'kd_detail' => $kd_detail,
                'kd_voucher' => $vocher,
                'kd_pelanggan' => $user,
                'status' => 1
            ];
            $this->generate_qr($kd_detail);
            $this->MAPI->insert_into('detail_voucher', $array);
            $data['respon'] = [
                'pesan' => 'Input Berhasil',
                'data' => $array,
                'savedata' => true
            ];
        }elseif($tipe == 'acc_voucher'){
            $auth = $this->input->post('kode');
            $promo = $this->input->post('kd_promo');
            $id = $this->input->post('kd_user');
            $get_promo = $this->db->get_where("promo", ["kd_promo" =>$promo])->row_array();
            $get_user = $this->db->get_where("pelanggan", ["kd_pelanggan" =>$id])->row_array();
            $count = (int)$get_user['poin'] - (int)$get_promo['poin'];
            $arr = ['poin' => (int)$count];
            $this->MAPI->update_data('pelanggan', $arr, 'kd_pelanggan', $id);
            $data['respon'] = [
                'pesan' => 'Voucher berhasil digunakan',
                'data' => $arr,
                'savedata' => true
            ];
        }else{
            $data['respon'] = [
                'pesan' => 'Input gagal'
            ];
        }

        echo json_encode($data, JSON_PRETTY_PRINT);
        
    }

    public function generate_link(){
        $auth = $this->input->post('kode');
        $tgl = date("Y-m-d");
        $batas = mktime(0,0,0,date("n"),date("j")+3,date("Y"));
        $exp = date("Y-m-d", $batas);
        $cek_auth = $this->db->get_where("user", ["auth_key" =>$auth])->row_array();
        if ($cek_auth > 1) {
            $referal = $this->M_front->generate_referal(6);
            $in_ref = [
                'kd_referal' => $referal,
                'kd_pelanggan' => $cek_auth['kd_akses'],
                'generate_date' => $tgl,
                'exp_date' => $exp,
                'status' => 1
            ];
            $base = base_url();
            $link = "http://localhost/teman_sebangku/Front/invitation/".$referal;
            $data['respon'] = [
                'link' => $link,
                'data' => $in_ref,
                'bool' => true
            ];
            $this->MAPI->insert_into('referal', $in_ref);
        } else {
            $data['respon'] = [
                'pesan' => 'Input gagal',
                'bool' => false
            ];
        }
        echo json_encode($data, JSON_PRETTY_PRINT);
        
    }

    public function generate_qr($kode_detali){
        $this->load->library('ciqrcode'); //pemanggilan library QR CODE

		$config['cacheable']	= true; //boolean, the default is true
		$config['cachedir']		= './foto/'; //string, the default is application/cache/
		$config['errorlog']		= './foto/'; //string, the default is application/logs/
		$config['imagedir']		= './foto/qrcode/'; //direktori penyimpanan qr code
		$config['quality']		= true; //boolean, the default is true
		$config['size']			= '1024'; //interger, the default is 1024
		$config['black']		= array(225,255,255); // array, default is array(255,255,255)
		$config['white']		= array(70,130,180); // array, default is array(0,0,0)
		$this->ciqrcode->initialize($config);

		$image_name=$kode_detali.'.png'; //buat name dari qr code sesuai dengan nim

		$params['data'] = $kode_detali; //data yang akan di jadikan QR CODE
		$params['level'] = 'H'; //H=High
		$params['size'] = 10;
		$params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
		$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
    }
}

?>