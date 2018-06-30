<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPerusahaan extends CI_Model {

	public function get_profile($fk)
	{
		$this->db->select('*');
		$this->db->from('perusahaan');
		$this->db->join('user', 'perusahaan.fk_user = user.id_user');
		$this->db->join('jenis_perusahaan', 'perusahaan.id_jenis_perusahaan = jenis_perusahaan.id_jenis_perusahaan');
		$this->db->where('perusahaan.fk_user='.$fk);
		return $this->db->get()->result();
	}

}

/* End of file DataPerusahaan.php */
/* Location: ./application/models/DataPerusahaan.php */