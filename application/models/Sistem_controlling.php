<?php

defined("BASEPATH") OR exit("Direct Script Not Allowed");

class Sistem_controlling extends CI_Model
{
	
	public function check_user($uname, $pass)
	{
		$check_data 	= $this->db->select('user.*, level_user.level')
								   ->from('user')
								   ->join('level_user','user.id_level = level_user.id_level')
								   ->where('user.username',$uname)
								   ->where('user.password',$pass);

		$hasil_query 	= $this->db->get();

		return $hasil_query;
	}

	public function up_stat_login($uname, $pass)
	{
		$update_flag 	= $this->db->set('user.is_login', TRUE)
								   ->where('user.username',$uname)
								   ->where('user.password',$pass)
								   ->update('user');

		return $update_flag;	
	}

	public function up_stat_logout($id_user)
	{
		$update_flag 	= $this->db->set('user.is_login', FALSE)
								   ->where('user.id_user',$id_user)
								   ->update('user');
		return $update_flag;	
	}


}


?>