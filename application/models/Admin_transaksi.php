<?php
defined("BASEPATH") OR exit("Direct Script Not Allowed");

class Admin_transaksi extends CI_Model
{
	private $simpan_data, $list_data, $query, $hasil_query;


	/* Fungsi model untuk olah user */
	public function check_username($nama_user, $username)
	{
		$this->query 		= $this->db->select('user.nama_user, user. username')	
									   ->from('user')
									   ->where('user.nama_user', $nama_user)
									   ->where('user.username' , $username);

		$this->hasil_query 	= $this->db->get();

		return $this->hasil_query;
	}

	public function create_user($array_data)
	{
		$this->simpan_data = $this->db->insert('user', $array_data);

		return $this->simpan_data;
	}

	public function list_user()
	{
		$this->query 		 = $this->db->select('user.*, level_user.level')
									    ->from('user')
									    ->join('level_user','user.id_level = level_user.id_level');

		$this->list_data 	 = $this->db->get()
										->result();

		return $this->list_data;

	}

	public function user_by_id($id_user)
	{
		$this->query 		 = $this->db->select('user.nama_user')
										->from('user')
										->where('user.id_user', $id_user);

		$this->hasil_query 	 = $this->db->get()
										->result();

		return $this->hasil_query;
	}

	public function update_pass_user($id_user, $pass_baru)
	{
		$this->query 		 = $this->db->set('password',$pass_baru)
										->where('id_user', $id_user)
										->update('user');

		return $this->query;
	}

	public function user_lvl_byId($id_user)
	{
		$this->query 		 = $this->db->select('user.nama_user, level_user.level')
										->from('user')
										->join('level_user','user.id_level = level_user.id_level')
										->where('user.id_user', $id_user);

		$this->hasil_query 	 = $this->db->get()
										->result();

		return $this->hasil_query;
	}


	public function update_lvl_user($id_user, $lvl_baru)
	{
		$this->query 		 = $this->db->set('id_level',$lvl_baru)
										->where('id_user', $id_user)
										->update('user');

		return $this->query;
	}	
	/* Fungsi model untuk olah user */
	

	/* Fungsi model untuk olah company */
	public function create_company($array_data){

		$this->simpan_data = $this->db->insert('master_perusahaan', $array_data);

		return $this->simpan_data;
	}

	public function check_perusahaan($nm_perusahaan, $singkatan)
	{
		$this->query 		= $this->db->select('master_perusahaan.nama_perusahaan, master_perusahaan.singkatan')	
									   ->from('master_perusahaan')
									   ->where('master_perusahaan.nama_perusahaan', $nm_perusahaan)
									   ->where('master_perusahaan.singkatan' , $singkatan);

		$this->hasil_query 	= $this->db->get();

		return $this->hasil_query;
	}

	public function list_company()
	{
		$this->query 		= $this->db->select('master_perusahaan.*, user.nama_user')
									   ->from('master_perusahaan')
									   ->join('user','master_perusahaan.id_user = user.id_user');

		$this->list_data 	= $this->db->get()
									   ->result();

		return $this->list_data;
	}

	public function prsh_by_id($id_prsh)
	{
		$this->query 		= $this->db->select('master_perusahaan.nama_perusahaan, master_perusahaan.singkatan')
									   ->from('master_perusahaan')
									   ->where('master_perusahaan.id_perusahaan', $id_prsh);

		$this->hasil_query 	= $this->db->get()
									   ->result();

		return $this->hasil_query;
	}

	public function update_prsh($array_data, $id_prsh)
	{
		$this->query 		= $this->db->set($array_data)
									   ->where('id_perusahaan', $id_prsh)
									   ->update('master_perusahaan');

		return $this->query;
	}
	/* Fungsi model untuk olah company */

	/* Fungsi model untuk olah cabang */
	public function ls_prsh()
	{
		$this->query 		= $this->db->select('master_perusahaan.*')
									   ->from('master_perusahaan');

		$this->hasil_query  = $this->db->get()
									   ->result();

		return $this->hasil_query;
	}

	public function ls_cabang()
	{
		$this->query 		= $this->db->select('master_cabang.*, user.nama_user, master_perusahaan.singkatan')
									   ->from('master_cabang')
									   ->join('user','user.id_user = master_cabang.penginput')
									   ->join('master_perusahaan','master_perusahaan.id_perusahaan = master_cabang.id_perusahaan');

		$this->list_data 	= $this->db->get()
									   ->result();

		return $this->list_data;
	}

	public function check_cabang($id_prsh, $nm_cbg)
	{
		$this->query 		= $this->db->select('master_cabang.id_perusahaan, master_cabang.nama_cabang')
									   ->from('master_cabang')
									   ->where('master_cabang.id_perusahaan', $id_prsh)
									   ->where('master_cabang.nama_cabang', $nm_cbg);

		$this->hasil_query	= $this->db->get();

		return $this->hasil_query;
	}

	public function create_cabang($array_data)
	{
		$this->simpan_data = $this->db->insert('master_cabang', $array_data);
		return $this->simpan_data;
	}

	public function cabang_byId($id_cabang)
	{
		$this->query 		= $this->db->select('master_cabang.nama_cabang, master_perusahaan.singkatan, 
												 master_perusahaan.id_perusahaan')
									   ->from('master_cabang')
									   ->join('master_perusahaan','master_perusahaan.id_perusahaan = master_cabang.id_perusahaan')
									   ->where('master_cabang.id_cabang', $id_cabang);

		$this->list_data 	= $this->db->get()
									   ->result();

		return $this->list_data;
	}

	public function update_Cabang($id_cabang, $array_data)
	{
		$this->query 		= $this->db->set($array_data)
									   ->where('master_cabang.id_cabang', $id_cabang)
									   ->update('master_cabang');

		return $this->query;
	}

	/* Fungsi model untuk olah cabang */


	/* Fungsi model untuk olah master barang */

	public function create_barang($array_data)
	{
		$this->simpan_data = $this->db->insert('master_barang', $array_data);
		return $this->simpan_data;
	}

	public function check_barang($nama_barang)
	{
		$this->query 		= $this->db->select('master_barang.nama_barang')
									   ->from('master_barang')
									   ->where('master_barang.nama_barang', $nama_barang);

		$this->hasil_query	= $this->db->get()
									   ->num_rows();

		return $this->hasil_query;
	}

	public function list_barang()
	{
		$this->query 		= $this->db->select('master_barang.*, user.nama_user')
									   ->from('master_barang')
									   ->join('user','master_barang.penginput = user.id_user');

		$this->list_data 	= $this->db->get()
									   ->result();

		return $this->list_data;
	}

	public function brg_byId($id_barang)
	{
		$this->query 		= $this->db->select('master_barang.nama_barang')
									   ->from('master_barang')
									   ->where('master_barang.id_barang', $id_barang);

		$this->list_data 	= $this->db->get()
									   ->row()->nama_barang;

		return $this->list_data;	
	}

	public function update_barang($nama_barang, $id_barang)
	{
		$this->query 		 = $this->db->set('nama_barang',$nama_barang)
										->where('id_barang', $id_barang)
										->update('master_barang');

		return $this->query;
	}

	/* Fungsi model untuk olah master barang */

	/* FUngsi model untuk olah data admin sendiri */

	public function get_dt_admin($id_admin)
	{
		$this->query 		 = $this->db->select('user.nama_user, user.username, user.password')
										->from('user')
										->where('user.id_user', $id_admin);

		$this->list_data 	 = $this->db->get();

		return $this->list_data;
	}

	public function update_uname($id_admin, $uname_baru)
	{
		$this->query 		 = $this->db->set('username', $uname_baru)
										->where('id_user', $id_admin)
										->update('user');
		return $this->query;
	}

	public function update_password($id_admin, $password)
	{
		
		$this->query 		 = $this->db->set('password', $password)
										->where('id_user', $id_admin)
										->update('user');
		return $this->query;	
	}

	/* FUngsi model untuk olah data admin sendiri */


}
?>