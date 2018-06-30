<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataLogin extends CI_Model {

	public function login($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);

		$result = $this->db->get('user');

		if ($result->num_rows() == 1) {
			return $result->row(0)->id_user;
		} else {
			return false;
		}
	}	


	public function get_user($id_user)
	{
		$this->db->select('id_level');
		$this->db->from('user');
		$this->db->where('id_user', $id_user);
		return $this->db->get()->result();
	}	

}

/* End of file DataLogin.php */
/* Location: ./application/models/DataLogin.php */