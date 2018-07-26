<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataOwner extends CI_Model {

	public function countallpendaftar()
	{
		$query = $this->db->query('select count(*) as jumlah from pendaftar');
		return $query->result();
	}

	public function count_pendaftarlolos()
	{
		$query = $this->db->query('select count(*) as jumlah from pendaftar inner join lowongan on lowongan.id_lowongan = pendaftar.id_lowongan inner join perusahaan on perusahaan.id_perusahaan = lowongan.id_perusahaan where pendaftar.status_daftar = "lolos"');
		return $query->result();
	}

	public function count_pendaftartidaklolos()
	{
		$query = $this->db->query('select count(*) as jumlah from pendaftar inner join lowongan on lowongan.id_lowongan = pendaftar.id_lowongan inner join perusahaan on perusahaan.id_perusahaan = lowongan.id_perusahaan where pendaftar.status_daftar = "tidak lolos"');
		return $query->result();
	}	

}

/* End of file DataOwner.php */
/* Location: ./application/models/DataOwner.php */