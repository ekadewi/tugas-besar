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
		$this->load->view('perusahaan/home');		
	}

	public function profile($id)
	{
		$data['profile'] = $this->dataPerusahaan->get_profile($id);
		$this->load->view('perusahaan/home', $data);
	}

}

/* End of file Perusahaan.php */
/* Location: ./application/controllers/Perusahaan.php */