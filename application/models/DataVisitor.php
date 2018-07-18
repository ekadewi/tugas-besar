<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataVisitor extends CI_Model {

	public function get_perusahaan()
	{
		$this->db->select('*');
		$this->db->from('perusahaan');
		$this->db->join('jenis_perusahaan', 'perusahaan.id_jenis_perusahaan = jenis_perusahaan.id_jenis_perusahaan');
		$this->db->order_by('id_perusahaan', 'desc');
		$this->db->limit(3);
		return $this->db->get()->result();
	}

	public function get_lowongan()
	{
		$this->db->select('*');
		$this->db->from('lowongan');
		$this->db->join('perusahaan', 'lowongan.id_perusahaan = perusahaan.id_perusahaan');
		$this->db->order_by('id_lowongan', 'desc');
		$this->db->limit(3);
		return $this->db->get()->result();
	}
	

}

/* End of file DataVisitor.php */
/* Location: ./application/models/DataVisitor.php */