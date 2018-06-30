<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perusahaan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dataPerusahaan');
	}

	public function index()
	{
		redirect('perusahaan/profile/'.$this->session->userdata('id'));		
	}

	public function profile($fk)
	{
		$data['profile'] = $this->dataPerusahaan->get_profile($fk);
		$this->load->view('perusahaan/home', $data);
	}

}

/* End of file Perusahaan.php */
/* Location: ./application/controllers/Perusahaan.php */