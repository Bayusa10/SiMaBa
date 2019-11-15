<?php
defined("BASEPATH") OR exit("Direct Script Not Allowed");

class User_transaksi extends CI_Model
{
	private $query, $simpan_data, $update_data, $hasil_query;
	private $list_data;

	public function list_barang_masuk()
	{
		$this->query = $this->db->select('data_barang_masuk.*, 
										  master_barang.nama_barang,
										  master_perusahaan.singkatan,
										  master_cabang.nama_cabang,
										  user.nama_user 
										')
								->from('data_barang_masuk')
								->join('master_barang','data_barang_masuk.id_master_barang = master_barang.id_barang')
								->join('master_cabang','data_barang_masuk.id_cabang = master_cabang.id_cabang')
								->join('master_perusahaan','master_cabang.id_perusahaan = master_perusahaan.id_perusahaan')
								->join('user','data_barang_masuk.id_penerima = user.id_user')
								->where('data_barang_masuk.status_terima', TRUE)
								->order_by('data_barang_masuk.id_barang_masuk','DESC');
		
		$this->list_data = $this->db->get()
									->result();
		
		return $this->list_data;
	}

	public function list_barang_keluar()
	{
		$this->query = $this->db->select('data_barang_masuk.*, 
										  data_barang_keluar.*,
										  master_barang.nama_barang,
										  master_perusahaan.singkatan,
										  master_cabang.nama_cabang,
										  user.nama_user 
										')
								->from('data_barang_masuk')
								->join('master_barang','data_barang_masuk.id_master_barang = master_barang.id_barang')
								->join('master_cabang','data_barang_masuk.id_cabang = master_cabang.id_cabang')
								->join('master_perusahaan','master_cabang.id_perusahaan = master_perusahaan.id_perusahaan')
								->join('user','data_barang_masuk.id_penerima = user.id_user')
								->join('data_barang_keluar',' data_barang_keluar.id_barang_masuk = data_barang_masuk.id_barang_masuk')
								->where('data_barang_masuk.status_terima', FALSE)
								->order_by('data_barang_masuk.id_barang_masuk','DESC'); 
		
		$this->list_data = $this->db->get()
									->result();
		
		return $this->list_data;
	}

	public function tambah_data_barang_masuk($array_form)
	{
		$this->simpan_data 	= $this->db->insert('data_barang_masuk', $array_form);
		return $this->simpan_data;
	}

	public function list_perusahaan()
	{
		$this->query 		= $this->db->select('master_perusahaan.id_perusahaan, master_perusahaan.singkatan,
												 master_perusahaan.nama_perusahaan')
									   ->from('master_perusahaan');
		$this->list_data 	= $this->db->get()
									   ->result();

		return $this->list_data;
	}

	public function list_barang()
	{
		$this->query 		= $this->db->select('master_barang.id_barang, master_barang.nama_barang')
									   ->from('master_barang');
		$this->list_data 	= $this->db->get()
									   ->result();

		return $this->list_data;
	}

	public function cabang(int $id_perusahaan = 0){
		if($id_perusahaan == 0){
		
			return 0;
		
		} else {

			$this->query 	= $this->db->select('master_cabang.id_cabang, master_cabang.nama_cabang,
												 master_perusahaan.singkatan')
									   ->from('master_cabang')
									   ->join('master_perusahaan','master_cabang.id_perusahaan = master_perusahaan.id_perusahaan')
									   ->where('master_cabang.id_perusahaan', $id_perusahaan);
			
			$this->list_data= $this->db->get();
			
			return $this->list_data;
		}
	}

	public function barang_byPO($no_po)	
	{
		$this->query = $this->db->select('data_barang_masuk.*, 
										  master_barang.nama_barang,
										  user.nama_user 
										')
								->from('data_barang_masuk')
								->join('master_barang','data_barang_masuk.id_master_barang = master_barang.id_barang')
								->join('user','data_barang_masuk.id_penerima = user.id_user')
								->where('data_barang_masuk.status_terima', TRUE)
								->where('data_barang_masuk.no_po',$no_po)
								->order_by('data_barang_masuk.id_barang_masuk','DESC');
		
		$this->list_data = $this->db->get()
									->result();
		
		return $this->list_data;
	}

	public function update_statusBarang($data)
	{
		$this->query 		 = $this->db->update_batch('data_barang_masuk', $data, 'id_barang_masuk');
		return $this->query;
	}

	public function simpan_barangRealese($data)
	{
		$this->query 		 = $this->db->insert_batch('data_barang_keluar', $data);
		return $this->query;
	}

	public function get_idPO($no_po)
	{
		$this->query 	= $this->db->select('data_barang_masuk.id_barang_masuk')
								   ->from('data_barang_masuk')
								   ->where('data_barang_masuk.no_po', $no_po);

		$this->list_data= $this->db->get()
								   ->result();

		return $this->list_data;
	}


	public function get_dt_user($id_user)
	{
		$this->query 		 = $this->db->select('user.nama_user, user.username, user.password')
										->from('user')
										->where('user.id_user', $id_user);

		$this->list_data 	 = $this->db->get();

		return $this->list_data;
	}

	public function update_uname($id_user, $uname_baru)
	{
		$this->query 		 = $this->db->set('username', $uname_baru)
										->where('id_user', $id_user)
										->update('user');
		return $this->query;
	}

	public function update_password($id_user, $password)
	{
		
		$this->query 		 = $this->db->set('password', $password)
										->where('id_user', $id_user)
										->update('user');
		return $this->query;	
	}


}						


?>