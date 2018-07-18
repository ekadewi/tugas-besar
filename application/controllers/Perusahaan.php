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

	public function lowongan($fk)
	{
		$data['lowongan'] = $this->dataPerusahaan->get_lowongan($fk);
		$this->load->view('perusahaan/lowongan', $data);
	}

	public function tambah($id_perusahaan)
	{
		$data['id_perusahaan'] = $id_perusahaan;

		$this->form_validation->set_rules('lowongan','Lowongan', 'required',
			array(
				'required' 	=> 'kolom %s tidak boleh kosong!!!!!!!'
			));
		$this->form_validation->set_rules('deskripsi','Deskripsi', 'required',
			array(
				'required' 	=> 'kolom %s tidak boleh kosong!!!!!!!'
			));
		$this->form_validation->set_rules('persyaratan','Persyaratan', 'required',
			array(
				'required' 	=> 'kolom %s tidak boleh kosong!!!!!!!'
			));
		$this->form_validation->set_rules('jumlah','Jumlah', 'trim|required|numeric',
			array(
				'required' 	=> 'kolom %s tidak boleh kosong!!!!!!!',
				'numeric' 	=> 'kolom %s hanya boleh angka'
			));

		if($this->form_validation->run()==False){
			$this->load->view('perusahaan/tambah', $data);
		}else{
			$this->dataPerusahaan->insert_lowongan($id_perusahaan);
			redirect('perusahaan/lowongan/'.$this->session->userdata('id'));
		}
	}

	public function edit($id_lowongan)
	{
		$data['detail'] = $this->dataPerusahaan->get_single_lowongan($id_lowongan);

		$this->form_validation->set_rules('lowongan','Lowongan', 'required',
			array(
				'required' 	=> 'kolom %s tidak boleh kosong!!!!!!!'
			));
		$this->form_validation->set_rules('deskripsi','Deskripsi', 'required',
			array(
				'required' 	=> 'kolom %s tidak boleh kosong!!!!!!!'
			));
		$this->form_validation->set_rules('persyaratan','Persyaratan', 'required',
			array(
				'required' 	=> 'kolom %s tidak boleh kosong!!!!!!!'
			));
		$this->form_validation->set_rules('jumlah','Jumlah', 'trim|required|numeric',
			array(
				'required' 	=> 'kolom %s tidak boleh kosong!!!!!!!',
				'numeric' 	=> 'kolom %s hanya boleh angka'
			));

		if($this->form_validation->run()==False){
			$this->load->view('perusahaan/edit', $data);
		} else {
			$this->dataPerusahaan->update_lowongan($id_lowongan);
			redirect('perusahaan/lowongan/'.$this->session->userdata('id'));
		}
	}

	public function hapus($id_lowongan)
	{
		$this->dataPerusahaan->delete_lowongan($id_lowongan);
		redirect('perusahaan/lowongan/'.$this->session->userdata('id'));
	}

}

/* End of file Perusahaan.php */
/* Location: ./application/controllers/Perusahaan.php */