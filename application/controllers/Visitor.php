<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visitor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('dataVisitor');
	}

	public function index()
	{
		$data['perusahaan'] = $this->dataVisitor->get_perusahaan();
		$data['lowongan'] = $this->dataVisitor->get_lowongan();
		$this->load->view('visitor/home', $data);
	}

	public function perusahaan()
	{
		$this->load->model('dataMember');
		$limit_per_page = 3;
		$start_index = ( $this->uri->segment(3) ) ? $this->uri->segment(3) : 0;
		$total_records = $this->dataMember->get_total_perusahaan();
		if ($total_records > 0) {
			$data['perusahaan'] = $this->dataMember->get_perusahaan($limit_per_page, $start_index);

			$config['base_url'] = base_url() . 'visitor/perusahaan';
			$config['total_rows'] = $total_records;
			$config['per_page'] = $limit_per_page;
			$config['uri_segment'] = 3;
			
			$this->pagination->initialize($config);
			
			$data['links'] = $this->pagination->create_links();
		}
		$this->load->view('visitor/perusahaan', $data);
	}

	public function perusahaan_profile($id)
	{
		$this->load->model('dataMember');
		$data['profile'] = $this->dataMember->get_profile_perusahaan($id);
		$this->load->view('visitor/single_perusahaan', $data);
	}

	public function lowongan()
	{
		$this->load->model('dataMember');
		$limit_per_page = 3;
		$start_index = ( $this->uri->segment(3) ) ? $this->uri->segment(3) : 0;
		$total_records = $this->dataMember->get_total_lowongan();
		if ($total_records > 0) {
			$data['lowongan'] = $this->dataMember->get_lowongan($limit_per_page, $start_index);

			$config['base_url'] = base_url() . 'visitor/lowongan';
			$config['total_rows'] = $total_records;
			$config['per_page'] = $limit_per_page;
			$config['uri_segment'] = 3;
			
			$this->pagination->initialize($config);
			
			$data['links'] = $this->pagination->create_links();
		}
		$this->load->view('visitor/lowongan', $data);
	}

	public function detail_lowongan($id)
	{
		$this->load->model('dataMember');
		$data['profile'] = $this->dataMember->get_single_lowongan($id);
		if ($this->input->post('daftar')) {
			redirect('visitor/lowongan');
			$this->session->set_flashdata('not_allow', 'login terlebih dahulu untuk mendaftar');
		}
		$this->load->view('visitor/single_lowongan', $data);
	}
}

/* End of file Visitor.php */
/* Location: ./application/controllers/Visitor.php */