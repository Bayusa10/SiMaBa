<?php
defined("BASEPATH") OR exit("Direct Scripts Not Allowed");

class User extends CI_Controller
{
	private $list_data; 
	private $raw_data;
	private $form_input = array();

	function __construct()
	{
		parent::__construct();
		$this->load->model('User_transaksi','user_trans');
	}

	public function index()
	{
		if($this->session->userdata('is_logged')){

			$this->load->view('main_page');
		
		} else {

			die('Direct Access Not Allowed');

		}
	}

	public function brg_baru_in_out()
	{
		if($this->session->userdata('is_logged')){

			$data['list_perusahaan'] = $this->daftar_perusahaan();
			$data['list_barang']	 = $this->daftar_barang();	
			$this->load->view('user_view/barang_baru_inout', $data);	
		
		} else {

			die('Direct Access Not Allowed');

		}
	}

	private function daftar_perusahaan()
	{
		if($this->input->is_ajax_request()){

			$this->raw_data  = $this->user_trans->list_perusahaan();
			$this->list_data = array();

			foreach($this->raw_data as $list_perusahaan){
				array_push($this->list_data, array('id_perusahaan' => $list_perusahaan->id_perusahaan,
												   'perusahaan'	   => $list_perusahaan->singkatan."-".$list_perusahaan->nama_perusahaan
												   )
						  ); 
			}

			return json_encode($this->list_data);

		} else {

			die('Direct Access Not Allowed');

		}
	}

	private function daftar_barang()
	{
		if($this->input->is_ajax_request()){

			$this->raw_data = $this->user_trans->list_barang();
			$this->list_data= array();

			foreach($this->raw_data as $list_barang){
				array_push($this->list_data, array('id_barang' 	=> $list_barang->id_barang,
												   'nama_barang'=> $list_barang->nama_barang 
												  )
						  );
			}

			return json_encode($this->list_data);

		} else {

			die('Direct Access Not Allowed');

		}
	}

	public function cabang(int $id_perusahaan = 0)
	{
		if($this->input->is_ajax_request()){

			$this->list_data = array();
			$this->raw_data  = $this->user_trans->cabang($id_perusahaan);
			
			if($id_perusahaan == 0){
			
				$this->list_data[] = "<option value=-1> Data Tidak Ada </option>";
				echo json_encode($this->list_data);
			
			} else {

				$jumlah_data = $this->raw_data->num_rows();

				if($jumlah_data > 0){

					foreach($this->raw_data->result() as $cabang){
						$this->list_data[] = "<option value=".$cabang->id_cabang.">".$cabang->singkatan." ".$cabang->nama_cabang.
											 "</option>";
					}
		
					echo json_encode($this->list_data);

				} else {

					$this->list_data[] = "<option value=-1> Data Tidak Ada </option>";
					echo json_encode($this->list_data);
				}

			}
		
		} else {

			die('Direct Access is Forbidden');

		}
	}


	public function list_barang_masuk()
	{
		if($this->input->is_ajax_request()){
			
			$this->raw_data = $this->user_trans->list_barang_masuk();
			$this->list_data= array();
			$nomor 			= 1;

			foreach($this->raw_data as $data){
				array_push($this->list_data, array('no' 		=> $nomor,
												'tgl_terima'	=> date('d-m-Y', strtotime($data->tgl_terima)),
												'nama_barang'	=> $data->nama_barang,
												'spesifikasi'	=> $data->spek_barang,
												'no_po'			=> $data->no_po,
												'beban'			=> $data->singkatan." ".$data->nama_cabang,
												'pemakai'		=> $data->nama_pengguna,
												'pemberi'		=> $data->nama_pemberi,
												'penerima'		=> $data->nama_user
												)
						);
				$nomor++;
			}

			echo json_encode(array('data' => $this->list_data));
		
		} else {

			die('Direct Access is Forbidden');

		}
	}

	public function list_barang_keluar()
	{
		if($this->input->is_ajax_request()){

			$this->raw_data = $this->user_trans->list_barang_keluar();
			$this->list_data= array();
			$nomor 			= 1;

			foreach($this->raw_data as $data){
				array_push($this->list_data, array('no' 			=> $nomor,
													'tgl_keluar'	=> date('d-m-Y', strtotime($data->tgl_keluar)),
													'nama_barang'	=> $data->nama_barang,
													'spesifikasi'	=> $data->spek_barang,
													'no_po'			=> $data->no_po,
													'beban'			=> $data->singkatan." ".$data->nama_cabang,
													'pemakai'		=> $data->nama_pengguna,
													'pemberi'		=> $data->nama_user,
													'penerima'		=> $data->nama_penerima	
												   )
							);
				$nomor++;
			}

			echo json_encode(array('data' => $this->list_data));

		} else {

			die('Direct Access is Forbidden');

		}
	}

	public function tambah_data_barang_masuk()
	{
		if($this->input->is_ajax_request()){

			$this->form_input['tgl_terima'] 		= date('Y-m-d', strtotime($this->input->post('ftgl_terima', TRUE)));
			$this->form_input['id_master_barang']	= $this->input->post('fjns_brg', TRUE);
			$this->form_input['spek_barang']		= $this->input->post('fspek_barang', TRUE);
			$this->form_input['no_po']				= $this->input->post('fno_po', TRUE);
			$this->form_input['id_cabang']			= $this->input->post('fcbg', TRUE);
			$this->form_input['nama_pengguna']		= $this->input->post('fuser', TRUE);
			$this->form_input['nama_pemberi']		= $this->input->post('fpenyerah', TRUE);
			$this->form_input['id_penerima']		= $this->session->userdata('id');//$this->input->post('fpenerima', TRUE);-> pake session
				
			$this->db->trans_begin();
			$this->simpan_data 	= $this->user_trans->tambah_data_barang_masuk($this->form_input);

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

	public function barang_byPO()
	{
		if ($this->input->is_ajax_request()) {
			
			$no_po = $this->input->post('no_po', TRUE);
			$this->raw_data = $this->user_trans->barang_byPO($no_po);
			$this->list_data= array();

			foreach($this->raw_data as $data){
				array_push($this->list_data, array('tgl_terima' => date('d-m-Y', strtotime($data->tgl_terima)),
												   'jenis'		=> $data->nama_barang,
												   'spesifikasi'=> $data->spek_barang,
												   'penerima'	=> $data->nama_user
												   )
						  );
			}
			
			echo json_encode($this->list_data);

		} else {

			die('Direct Access is Forbidden');

		}

	}

	public function release_barangBy_PO()
	{
		if($this->input->is_ajax_request()){

			$no_po 			= $this->input->post('no_po', TRUE);
			$penerima 		= $this->input->post('penerima', TRUE);
			
			$this->raw_data	= $this->user_trans->get_idPO($no_po);
			$this->list_data= array();
			$data_insert    = array();

			foreach ($this->raw_data as $data) {
				
				array_push($this->list_data, array('status_terima' 	=> FALSE,
												   'id_barang_masuk'=> $data->id_barang_masuk
												  )
						  );
				
				array_push($data_insert, array('id_barang_masuk' => $data->id_barang_masuk,
											   'tgl_keluar'		 => date('Y-m-d'),
											   'id_pemberi'		 => $this->session->userdata('id'),
											   'nama_penerima'	 => $penerima)
						  );
			}
			
			$this->db->trans_begin();
			$update_status 		= $this->user_trans->update_statusBarang($this->list_data);
			$simpan_brg_realese = $this->user_trans->simpan_barangRealese($data_insert);
			

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

	public function setting_akun()
	{
		if($this->session->userdata('is_logged')){

			$id = $this->session->userdata('id');
			$this->array_response = $this->user_trans->get_dt_user($id);
			$this->array_data 	  = array('nama_user' => $this->array_response->row()->nama_user,
										  'username'  => $this->array_response->row()->username,
										  'password'  => $this->array_response->row()->password,
								    	 );

			$data['data_akun'] = json_encode(array('data' => $this->array_data));
			$this->load->view('user_view/setting_akun', $data);

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

			$this->simpan_data = $this->user_trans->update_uname($id_user, $uname);

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

			$this->simpan_data = $this->user_trans->update_password($id_user, $pass);
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