<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataLogin extends CI_Model {

	public function cek_login($table,$where){
  		return $this->db->get_where($table,$where);
 	}

 	public function get_user($username, $password)
	{
		$query = $this->db->query('select * from user where username="'.$username.'" AND password="'.$password.'"');
		return $query->result();
	}	

}

/* End of file DataLogin.php */
/* Location: ./application/models/DataLogin.php */