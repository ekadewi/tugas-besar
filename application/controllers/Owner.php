<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Owner extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('level') != 5) {
			redirect('login');
		}
		$this->load->model('dataAdmin');
		$data['member'] = $this->dataAdmin->count_member();
		$data['perusahaan'] = $this->dataAdmin->count_perusahaan();
		$data['lowongan'] = $this->dataAdmin->count_lowongan();
		$this->load->view('owner/home', $data);	
	}

}

/* End of file Owner.php */
/* Location: ./application/controllers/Owner.php */