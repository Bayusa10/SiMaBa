<?php
defined("BASEPATH") OR exit("Direct Scripts Not Allowed");

class Sistem_control extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('sistem_controlling','sistem_control');
	}

	public function index()
	{
		if(!$this->session->userdata('is_logged')){
		
			$this->load->view('login_page');	
		
		} else {

			$route = $this->session->userdata('route');

			redirect(base_url().$route);

		}
		
	}

	public function doLogin()
	{
		$uname = $this->input->post('uname', TRUE);
		$pass  = substr(md5($this->input->post('passwd', TRUE)), 0,8);

		//check apakah sudah sesuai atau belum
		$is_user = $this->sistem_control->check_user($uname, $pass);

		if($is_user->num_rows() > 0){
			
			if(!$is_user->row()->is_login){

				$up_flag_login = $this->sistem_control->up_stat_login($uname, $pass);

				if($is_user->row()->level == 'Admin'){

					$array_data = array('id' 		=> $is_user->row()->id_user,
										'username'	=> $is_user->row()->username,
										'level'		=> $is_user->row()->level,
										'nama_user' => $is_user->row()->nama_user,
										'route'		=> 'admin',
										'is_logged' => TRUE);

					$this->session->set_userdata($array_data);

					echo json_encode(array("response" => 'adm',
										   "route"	  => 'admin')
									);

				} else {

					$array_data = array('id' 		=> $is_user->row()->id_user,
										'username'	=> $is_user->row()->username,
										'level'		=> $is_user->row()->level,
										'nama_user' => $is_user->row()->nama_user,
										'route'		=> 'user',
										'is_logged' => TRUE);

					$this->session->set_userdata($array_data);

					echo json_encode(array("response" => 'usr',
										   "route"	  => 'user')
									);

				}


			} else {

				echo json_encode(array("response" => 'logged_in'));

			}

		
		} else {

			echo json_encode(array("response" => 'not_user'));
		
		}

	}

	public function doLogout()
	{
		$id_user 		= $this->session->userdata('id');
		$up_flag_login 	= $this->sistem_control->up_stat_logout($id_user);

		if($up_flag_login){

			$this->session->sess_destroy();
			echo json_encode(array("response" => 200));

		} else {

			echo json_encode(array("response" => 404));			

		}

	}

	public function menu($nama_menu = null)
	{
		$nama_menu = $this->uri->segment(2);
		$tampilan  = array('admin-dashboard' 	=> 'admin_dashboard',
						   'manage-user'	  	=> 'manajemen_user',
						   'master-perusahaan'	=> 'master_perusahaan',
						   'master-cabang'		=> 'master_cabang',
						   'master-jns-brg'		=> 'master_jns_brg',
						   'admin-akun'			=> 'admin_set_akun',
						   'user-dashboard'		=> 'brg_br_in_out',
						   'user-akun'			=> 'user_set_akun'
						  );

		echo json_encode(array('route_menu' => $tampilan[$nama_menu]));
	}

	public function create_Session()
	{
		$arr_sess = array('level' => 'Admin');

		$this->session->set_userdata($arr_sess);

	}

	public function delete_Session()
	{
		$this->session->sess_destroy();
	}

}
?>