<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Owner extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('level') != 5) {
			redirect('login');
		}
		$this->load->model('dataAdmin');
		$this->load->model('dataOwner');
		$data['member'] = $this->dataAdmin->count_member();
		$data['perusahaan'] = $this->dataAdmin->count_perusahaan();
		$data['lowongan'] = $this->dataAdmin->count_lowongan();
		$data['pendaftar'] = $this->dataOwner->countallpendaftar();
		$data['pendaftarlolos'] = $this->dataOwner->count_pendaftarlolos();
		$data['pendaftartolak'] = $this->dataOwner->count_pendaftartidaklolos();
		$this->load->view('owner/home', $data);	
	}

}

/* End of file Owner.php */
/* Location: ./application/controllers/Owner.php */