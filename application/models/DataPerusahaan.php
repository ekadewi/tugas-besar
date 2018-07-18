<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPerusahaan extends CI_Model {

	public function get_profile($fk)
	{
		$this->db->select('*');
		$this->db->from('perusahaan');
		$this->db->join('user', 'perusahaan.fk_user = user.id_user');
		$this->db->join('jenis_perusahaan', 'perusahaan.id_jenis_perusahaan = jenis_perusahaan.id_jenis_perusahaan');
		$this->db->where('perusahaan.fk_user', $fk);
		return $this->db->get()->result();
	}

	public function get_lowongan($fk)
	{
		$this->db->select('*');
		$this->db->from('perusahaan');
		$this->db->join('lowongan', 'lowongan.id_perusahaan = perusahaan.id_perusahaan');
		$this->db->where('perusahaan.fk_user', $fk);
		return $this->db->get()->result();
	}

	public function get_single_lowongan($id_lowongan)
	{
		$this->db->select('*');
		$this->db->from('lowongan');
		$this->db->where('id_lowongan', $id_lowongan);
		return $this->db->get()->result();
	}

	public function insert_lowongan($id_perusahaan)
	{
		$data = array(
			'lowongan' => $this->input->post('lowongan'),
			'deskripsi' => $this->input->post('deskripsi'),
			'persyaratan' => $this->input->post('persyaratan'),
			'jumlah' => $this->input->post('jumlah'),
			'id_perusahaan' => $id_perusahaan,
			'tanggal_post' => date('Y-m-d'),
			'status' => 'buka'
		);

		$this->db->insert('lowongan', $data);
	}

	public function update_lowongan($id_lowongan)
	{
		$data = array(
			'lowongan' => $this->input->post('lowongan'),
			'deskripsi' => $this->input->post('deskripsi'),
			'persyaratan' => $this->input->post('persyaratan'),
			'jumlah' => $this->input->post('jumlah')
		);

		$this->db->where('id_lowongan', $id_lowongan);
		$this->db->update('lowongan', $data);
	}

	public function delete_lowongan($id_lowongan)
	{
		$this->db->where('id_lowongan', $id_lowongan);
		$this->db->delete('lowongan');
	}

}

/* End of file DataPerusahaan.php */
/* Location: ./application/models/DataPerusahaan.php */