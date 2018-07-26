<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPendaftar extends CI_Model {

	public function get_pendaftar()
	{
		return $this->db->get('pendaftar')->result();
	}

	public function get_pendaftar_by_perusahaan($id_perusahaan)
	{
		$this->db->from('pendaftar p');
		$this->db->join('lowongan l', 'l.id_lowongan = p.id_lowongan');
		$this->db->join('member m', 'm.id_member = p.id_member');
		$this->db->where('l.id_perusahaan', $id_perusahaan);
		return $this->db->get()->result();
	}

	public function get_pendaftar_by_perusahaan_dan_status($id_perusahaan, $status)
	{
		$this->db->from('pendaftar p');
		$this->db->join('lowongan l', 'l.id_lowongan = p.id_lowongan');
		$this->db->join('member m', 'm.id_member = p.id_member');
		$this->db->join('perusahaan per', 'per.id_perusahaan = l.id_perusahaan');
		$this->db->where('l.id_perusahaan', $id_perusahaan);
		$this->db->where('status_daftar', $status);
		return $this->db->get()->result();
	}

	public function terima_pendaftar($id_pendaftar)
	{
		$data = array('status_daftar'=>'lolos');
		$this->db->where('id_pendaftar', $id_pendaftar);
		$this->db->update('pendaftar', $data);
	}

	public function tolak_pendaftar($id_pendaftar)
	{
		$data = array('status_daftar'=>'tidak lolos');
		$this->db->where('id_pendaftar', $id_pendaftar);
		$this->db->update('pendaftar', $data);
	}

}

/* End of file dataPendaftar.php */
/* Location: ./application/models/dataPendaftar.php */