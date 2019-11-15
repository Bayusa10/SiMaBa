<?php
defined("BASEPATH") OR exit("Direct Scripts Not Allowed");

class Admin extends CI_Controller
{
	private $form_input = array(), $form_data, $array_response, $list_data;
	private $simpan_data, $array_data;
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_transaksi', 'adm_trans');
		$this->load->model('sistem_controlling','sistem_control');
	}

	public function index()
	{
		if($this->session->userdata('is_logged')){

			$this->load->view('main_page');

		} else {

			die('Direct Access Not Allowed');

		}
	}

	public function dashboard()
	{
		if($this->session->userdata('is_logged')){

			$this->load->view('admin_view/admin_dashboard');

		} else {

			die('Direct Access Not Allowed');

		}	
	}

	public function manage_user()
	{
		if($this->session->userdata('is_logged')){

			$this->load->view('admin_view/manage_user');

		} else {

			die('Direct Access Not Allowed');

		}
	}

	public function create_user()
	{
		if($this->input->is_ajax_request()){

			$this->form_input[0]	= $this->input->post('fname', TRUE);
			$this->form_input[1]	= $this->input->post('funame', TRUE);
			$this->form_input[2]	= substr(md5($this->input->post('fpwd', TRUE)), 0,8);
			$this->form_input[3]	= $this->input->post('flevel', TRUE);

			$is_inserted= $this->adm_trans->check_username($this->form_input[0], $this->form_input[1])->num_rows();

			if($is_inserted == 0){

				$this->form_data 	= array('nama_user' => $this->form_input[0],
											'username'	=> $this->form_input[1],
											'password'	=> $this->form_input[2],
											'id_level'	=> $this->form_input[3]);

				$this->db->trans_begin();

				$this->simpan_data 		= $this->adm_trans->create_user($this->form_data);

				if($this->db->trans_status() === FALSE){

					$this->db->trans_rollback();

					$array_response = array('response' => 500);

					echo json_encode($array_response);


				} else {

					$this->db->trans_commit();

					$array_response = array('response' => 200);

					echo json_encode($array_response);

				}

			} else {

				$array_response = array('response' => 404);

				echo json_encode($array_response);			

			}

		} else {

			die("Direct Access is Forbidden");

		}
		
	}

	public function list_user()
	{
		if($this->input->is_ajax_request()){

			$this->array_data	= $this->adm_trans->list_user();
			$this->list_data    = array();
			$no 				= 1;

			foreach ($this->array_data as $data) {
				array_push($this->list_data, array('no'			=> $no,
												   'nama' 		=> $data->nama_user,
												   'username'	=> $data->username,
												   'level'		=> $data->level,
												   'aksi'		=> '<button type="button" class="btn btn-warning" id="btn-update-usr" data-id='.$data->id_user.'> Reset Password </button>'." ".
												   					'<button type="button" class="btn btn-info" id="btn-update-lvl" data-id='.$data->id_user.'> Ubah Level </button>'
												  )
						  );
				$no++;
			}

			echo json_encode(array('data' => $this->list_data));
		
		} else {

			die("Direct Access is Forbidden");

		}
	}

	public function user_by_id($id_user = null)
	{
		if($this->input->is_ajax_request()){
			
			$id_pass 			= urldecode($this->uri->segment(2));
			$explode_keypass 	= explode(" ", $id_pass);
			$id 				= $explode_keypass[1];

			$this->list_data 	= $this->adm_trans->user_by_id($id);

			echo json_encode($this->list_data);	
		
		} else {

			die("Direct Access is Forbidden");

		} 
		
	}

	public function user_level_byId($id_user = null)
	{
		if($this->input->is_ajax_request()){
			
			$id_pass 			= urldecode($this->uri->segment(2));
			$explode_keypass 	= explode(" ", $id_pass);
			$id 				= $explode_keypass[1];

			$this->list_data 	= $this->adm_trans->user_lvl_byId($id);

			echo json_encode($this->list_data);	
		
		} else {

			die("Direct Access is Forbidden");

		}
	}

	public function update_password()
	{
		if($this->input->is_ajax_request()){

			$id_pass 			= urldecode($this->input->post('id_user', TRUE));
			$explode_keypass 	= explode(" ", $id_pass);
			$id 				= $explode_keypass[1];
			$pass_baru 			= substr(md5('12345678'), 0,8);

			$this->db->trans_begin();

			$this->simpan_data 		= $this->adm_trans->update_pass_user($id, $pass_baru);

			if($this->db->trans_status() === FALSE){

				$this->db->trans_rollback();

				$array_response = array('response' => 500);

				echo json_encode($array_response);


			} else {

				$this->db->trans_commit();

				$array_response = array('response' => 200);

				echo json_encode($array_response);

			}


		} else {

			die("Direct Access is Forbidden");

		}

	}

	public function update_lv_user()
	{
		if($this->input->is_ajax_request()){

			$lvl_baru 			= $this->input->post('lvl_baru', TRUE);
			$id_pass 			= urldecode($this->input->post('id_user', TRUE));
			$explode_keypass 	= explode(" ", $id_pass);
			$id 				= $explode_keypass[1];

			$this->db->trans_begin();

			$this->simpan_data 		= $this->adm_trans->update_lvl_user($id, $lvl_baru);

			if($this->db->trans_status() === FALSE){

				$this->db->trans_rollback();

				$array_response = array('response' => 500);

				echo json_encode($array_response);


			} else {

				$this->db->trans_commit();

				$array_response = array('response' => 200);

				echo json_encode($array_response);

			}

		} else {

			die("Direct Access is Forbidden");

		}
	}

	public function master_perusahaan()
	{
		if($this->session->userdata('is_logged')){

			$this->load->view('admin_view/master_perusahaan');

		} else {

			die('Direct Access Not Allowed');

		}
	}

	public function create_company()
	{
		if($this->input->is_ajax_request()){

			$this->form_input[0] 	= $this->input->post('fnm_prsh', TRUE);
			$this->form_input[1] 	= $this->input->post('fsingkatan', TRUE);
			$this->form_input[2] 	= date('Y-m-d H:i:s');
			$this->form_input[3] 	= $this->session->userdata('id');

			$is_inserted 			= $this->adm_trans->check_perusahaan($this->form_input[0], $this->form_input[1])->num_rows();

			if($is_inserted == 0){

				$this->form_data 	= array('nama_perusahaan'=> $this->form_input[0],
											'singkatan'		 => $this->form_input[1],
											'tgl_input'		 => $this->form_input[2],
											'id_user'		 => $this->form_input[3]);

				$this->db->trans_begin();

				$this->simpan_data 		= $this->adm_trans->create_company($this->form_data);

				if($this->db->trans_status() === FALSE){

					$this->db->trans_rollback();
					$array_response = array('response' => 500);
					echo json_encode($array_response);


				} else {

					$this->db->trans_commit();
					$array_response = array('response' => 200);
					echo json_encode($array_response);

				}


			} else {

				$array_response = array('response' => 404);
				echo json_encode($array_response);			

			}

		} else {

			die("Direct Access is Forbidden");

		}

	}

	public function list_company()
	{
		if($this->input->is_ajax_request()){


			$this->array_data	= $this->adm_trans->list_company();
			$this->list_data    = array();
			$no 				= 1;

			foreach ($this->array_data as $data) {
				array_push($this->list_data, array('no'			=> $no,
												   'nama' 		=> $data->nama_perusahaan,
												   'singkatan'	=> $data->singkatan,
												   'tgl_input'	=> date('d-m-Y H:i:s', strtotime($data->tgl_input)),
												   'penginput'	=> $data->nama_user,
												   'aksi'		=> '<button type="button" class="btn btn-warning" id="btn-update" data-id='.$data->id_perusahaan.'> Update </button>'
													  )
							  );
					$no++;
				}

			echo json_encode(array('data' => $this->list_data));

		} else {

			die("Direct Access is Forbidden");

		}
	}

	public function prsh_by_id($id_prsh = null)
	{
		if($this->input->is_ajax_request()){

			$id_pass 	= urldecode($this->uri->segment(2));
			$explode 	= explode(" ", $id_pass);
			$id_prsh 	= $explode[1];

			$this->array_response = $this->adm_trans->prsh_by_id($id_prsh);

			foreach ($this->array_response as $data) {
				$this->array_data = array('nama_perusahaan' => $data->nama_perusahaan,
										  'singkatan'		=> $data->singkatan);
			}

			echo json_encode($this->array_data);

		} else {

			die("Direct Access is Forbidden");

		}
	}

	public function update_company()
	{
		if($this->input->is_ajax_request()){

			$nama_perusahaan = $this->input->post('nm_prsh', TRUE);
			$singkatan  	 = $this->input->post('singkatan', TRUE);
			$id_pass 		 = urldecode($this->input->post('id_pass', TRUE));
			$explode 		 = explode(" ", $id_pass);
			$id_prsh 		 = $explode[1];

			$this->array_data = array('nama_perusahaan' => $nama_perusahaan,
									 'singkatan'	   => $singkatan);


			$this->db->trans_begin();

			$this->simpan_data= $this->adm_trans->update_prsh($this->array_data, $id_prsh);

			if($this->db->trans_status() === FALSE){

				$this->db->trans_rollback();
				$array_response = array('response' => 500);				
				echo json_encode($array_response);


			} else {

				$this->db->trans_commit();
				$array_response = array('response' => 200);				
				echo json_encode($array_response);

			}

		} else {

			die("Direct Access is Forbidden");

		}
	}

	public function master_cabang()
	{
		if($this->session->userdata('is_logged')){

			$this->load->view('admin_view/master_cabang');

		} else {

			die('Direct Access Not Allowed');

		}
	}

	public function list_cabang()
	{
		$this->array_response = $this->adm_trans->ls_cabang();
		$this->array_data 	  = array();
		$no 				  = 1;

		foreach ($this->array_response as $data) {
			array_push($this->array_data, array('no' 			=> $no,
												'nama_cabang'	=> $data->singkatan." ".$data->nama_cabang,
												'tgl_input' 	=> date('d-m-Y H:i:s', strtotime($data->tgl_input)),
												'penginput' 	=> $data->nama_user,
												'aksi'			=> '<button type="button" class="btn btn-warning" id="btn-update" data-id='.$data->id_cabang.'> Update </button>'
												)
					  );
			$no++;
		}

		echo json_encode(array('data' => $this->array_data));

	}

	public function dt_prsh()
	{
		if($this->input->is_ajax_request()){

			$this->array_response = $this->adm_trans->ls_prsh();
			$this->array_data 	  = array();

			foreach ($this->array_response as $data) {
				$this->array_data[] = "<option value =".$data->id_perusahaan."> [".$data->singkatan."] ".$data->nama_perusahaan."</option>";			
			}

			echo json_encode($this->array_data);

		} else {

			die("Direct Access is Forbidden");

		}

	}

	public function cabang_byId()
	{
		if($this->input->is_ajax_request()){

			$id_pass 				= urldecode($this->uri->segment(2));
			$explode 				= explode(" ", $id_pass);
			$id_prsh 				= $explode[1];
			$this->array_response 	= $this->adm_trans->cabang_byId($id_prsh);

			foreach ($this->array_response as $data) {
				$this->array_data = array('id_prsh'	   => $data->id_perusahaan,	
		   								  'perusahaan' => $data->singkatan." - ".$data->nama_cabang,
									      'cabang'	   => $data->nama_cabang);
			}

			echo json_encode($this->array_data);

		} else {

			die("Direct Access is Forbidden");

		}

	}

	public function create_cabang()
	{
		if($this->input->is_ajax_request()){

			$this->form_input[0] = $this->input->post('fnm_cbg', TRUE);
			$this->form_input[1] = date('Y-m-d H:i:s');
			$this->form_input[2] = $this->session->userdata('id');
			$this->form_input[3] = $this->input->post('fprsh', TRUE);

			$is_inserted 		 = $this->adm_trans->check_cabang($this->form_input[3], $this->form_input[0])->num_rows();

			if($is_inserted == 0){

				$this->form_data 	= array('nama_cabang'	=> $this->form_input[0],
											'tgl_input'		=> $this->form_input[1],
											'penginput'		=> $this->form_input[2],
											'id_perusahaan'	=> $this->form_input[3]);

				$this->db->trans_begin();
				$this->simpan_data 		= $this->adm_trans->create_cabang($this->form_data);

				if($this->db->trans_status() === FALSE){

					$this->db->trans_rollback();
					$array_response = array('response' => 500);
					echo json_encode($array_response);


				} else {
					
					$this->db->trans_commit();
					$array_response = array('response' => 200);
					echo json_encode($array_response);

				}

			} else {

				$array_response = array('response' => 404);
				echo json_encode($array_response);	

			}

		} else {

			die("Direct Access is Forbidden");

		}
	}

	public function update_Cabang()
	{
		if($this->input->is_ajax_request()){

			$id_pass 				= urldecode($this->input->post('id_cbg', TRUE));
			$explode 				= explode(" ", $id_pass);
			$id_cabang 				= $explode[1];

			$this->array_data 		= array('nama_cabang' 	=> $this->input->post('nm_cbg', TRUE),
											'id_perusahaan'	=> $this->input->post('id_prs', TRUE)
										   );

			$this->db->trans_begin();

			$this->simpan_data 		= $this->adm_trans->update_Cabang($id_cabang, $this->array_data);

			if($this->db->trans_status() === FALSE){

				$this->db->trans_rollback();
				$array_response = array('response' => 500);
				echo json_encode($array_response);


			} else {

				$this->db->trans_commit();
				$array_response = array('response' => 200);
				echo json_encode($array_response);

			}

		} else {

			die("Direct Access is Forbidden");

		}
	}

	public function master_barang()
	{
		if($this->session->userdata('is_logged')){

			$this->load->view('admin_view/master_jenis_barang');

		} else {

			die('Direct Access Not Allowed');

		}	
	}

	/* Fungsi-fungsi untuk proses master barang */

	public function list_barang()
	{
		if($this->input->is_ajax_request()){

			$this->list_data = $this->adm_trans->list_barang();
			$this->array_data= array();
			$no 			 = 1;

			foreach ($this->list_data as $data) {
				array_push($this->array_data, array('no' 			=> $no,
													'nama_barang'	=> $data->nama_barang,
													'tgl_input'		=> date('d-m-Y H:i:s', strtotime($data->tgl_input)),
													'penginput'		=> $data->nama_user,
													'aksi'			=> '<button type="button" class="btn btn-warning" id="btn-update" data-id='.$data->id_barang.'> Update </button>'
													)
						  );
				$no++;
			}

			echo json_encode(array('data' => $this->array_data));

		} else {

			die("Direct Access is Forbidden");

		}

	}

	public function create_barang()
	{
		if($this->input->is_ajax_request()){

			$this->form_input[0] = $this->input->post('nama_barang', TRUE);
			$this->form_input[1] = date('Y-m-d H:i:s');
			$this->form_input[2] = $this->session->userdata('id');


			$is_inserted 		 = $this->adm_trans->check_barang($this->form_input[0]);

			if($is_inserted == 0){

				$this->form_data = array('nama_barang' 	=> $this->form_input[0],
										 'tgl_input'	=> $this->form_input[1],
										 'penginput'	=> $this->form_input[2]);

				$this->db->trans_begin();

				$this->simpan_data 		= $this->adm_trans->create_barang($this->form_data);

				if($this->db->trans_status() === FALSE){

					$this->db->trans_rollback();
					$array_response = array('response' => 500);
					echo json_encode($array_response);


				} else {

					$this->db->trans_commit();
					$array_response = array('response' => 200);
					echo json_encode($array_response);

				}


			} else {

				$array_response = array('response' => 404);
				echo json_encode($array_response);

			}

		} else {

			die('Direct Access is Forbidden');

		}

	}

	public function brg_byId()
	{
		if($this->input->is_ajax_request()){

			$id_pass 	= urldecode($this->uri->segment(2));
			$explode 	= explode(" ", $id_pass);
			$id_brg 	= $explode[1];

			$this->array_response = $this->adm_trans->brg_byId($id_brg);

			echo json_encode($this->array_response);

		} else {

			die('Direct Access is Forbidden');

		}
	}

	public function update_barang()
	{
		if($this->input->is_ajax_request()){

			$id_pass 		= urldecode($this->input->post('id_barang', TRUE));
			$explode 		= explode(" ", $id_pass);
			$id_brg 		= $explode[1];

			$nama_barang	= $this->input->post('nama_barang', TRUE);

			$this->db->trans_begin();

			$this->simpan_data = $this->adm_trans->update_barang($nama_barang, $id_brg);

			if($this->db->trans_status() === FALSE){

				$this->db->trans_rollback();				
				$array_response = array('response' => 500);				
				echo json_encode($array_response);


			} else {

				$this->db->trans_commit();
				$array_response = array('response' => 200);				
				echo json_encode($array_response);

			}

		} else {

			die('Direct Access is Forbidden');

		}

	}

	/* Fungsi-fungsi untuk proses master barang */

	public function setting_akun()
	{
		if($this->session->userdata('is_logged')){

			$id = $this->session->userdata('id');
			$this->array_response = $this->adm_trans->get_dt_admin($id);
			$this->array_data 	  = array('nama_user' => $this->array_response->row()->nama_user,
										  'username'  => $this->array_response->row()->username,
										  'password'  => $this->array_response->row()->password,
								    	 );

			$data['data_akun'] = json_encode(array('data' => $this->array_data));
			$this->load->view('admin_view/setting_akun', $data);


		} else {

			die('Direct Access Not Allowed');

		}	
	}

	public function update_uname()
	{
		if($this->input->is_ajax_request()){

			$id_pass = urldecode($this->input->post('id_user', TRUE));
			$explode = explode(" ", $id_pass);
			$id_user = $explode[1];
			$uname 	 = $this->input->post('uname', TRUE);

			$this->db->trans_begin();

			$this->simpan_data = $this->adm_trans->update_uname($id_user, $uname);

			if($this->db->trans_status() === FALSE){

				$this->db->trans_rollback();				
				$array_response = array('response' => 500);				
				echo json_encode($array_response);


			} else {

				$this->db->trans_commit();
				$array_response = array('response' => 200);				
				echo json_encode($array_response);

			}

		} else {

			die('Direct Access is Forbidden');

		}
	}

	public function update_pwd()
	{
		if($this->input->is_ajax_request()){

			$id_pass = urldecode($this->input->post('id_user', TRUE));
			$explode = explode(" ", $id_pass);
			$id_user = $explode[1];
			$pass 	 = substr(md5($this->input->post('passwd', TRUE)), 0,8);

			$this->db->trans_begin();

			$this->simpan_data 	= $this->adm_trans->update_password($id_user, $pass);
			$up_flag_login 		= $this->sistem_control->up_stat_logout($id_user);

			if($this->db->trans_status() === FALSE){

				$this->db->trans_rollback();				
				$array_response = array('response' => 500);				
				echo json_encode($array_response);


			} else {

				$this->db->trans_commit();
				$array_response = array('response' => 200);				
				echo json_encode($array_response);

			}

		} else {

			die("Direct Access is Forbidden");

		}

	}

}


?>