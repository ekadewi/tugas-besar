<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('dataAdmin');
		$data['member'] = $this->dataAdmin->count_member();
		$data['perusahaan'] = $this->dataAdmin->count_perusahaan();
		$data['lowongan'] = $this->dataAdmin->count_lowongan();
		$this->load->view('admin/home', $data);		
	}

	public function jenis_perusahaan()
	{
		$this->load->model('dataAdmin');
		$data['jenis_perusahaan'] = $this->dataAdmin->get_jenis_perusahaan();
		$this->load->view('admin/select_jenis', $data);
	}

	public function insert_jenis_perusahaan()
	{
		

		$this->load->model('dataAdmin');
	$this->form_validation->set_rules('jenis_perusahaan','jenis_perusahaan', 'trim|required');
if($this->form_validation->run()==False){
		$this->load->view('admin/insert_jenis');
		}else{
		$this->dataAdmin->insert_jenis();
			redirect('admin/jenis_perusahaan');
		}


	
	}

	public function update_jenis_perusahaan($id) {
		$this->load->model('dataAdmin');
		$data['detail'] = $this->dataAdmin->get_single_jenis($id);

		if ($this->input->post('update')) {
			$this->dataAdmin->update_jenis($id);
			redirect('admin/jenis_perusahaan');
		}

		$this->load->view('admin/update_jenis', $data);
	}

	public function delete_jenis_perusahaan($id)
	{
		$this->load->model('dataAdmin');
		$this->dataAdmin->delete_jenis($id);
		redirect('admin/jenis_perusahaan');
	}

	public function member()
	{
		$this->load->model('dataAdmin');
		$data['member'] = $this->dataAdmin->get_member();
		$this->load->view('admin/select_member', $data);
	}

	public function insert_member()
	{
		$this->load->model('dataAdmin');

			$data = array();
			$this->form_validation->set_rules('nama','nama', 'required|alpha',
				array(
					'required' 	=> 'kolom %s tidak boleh kosong!!!!!!!',
					'alpha' 	=> 'kolom %s hanya boleh diisi huruf'
				));
			$this->form_validation->set_rules('jk','jk', 'required',
				array(
					'required' 	=> 'kolom %s tidak boleh kosong!!!!!!!'
				));
			$this->form_validation->set_rules('tanggal_lahir','tanggal_lahir', 'required',
				array(
					'required' 	=> 'kolom %s tidak boleh kosong!!!!!!!'
				));
			$this->form_validation->set_rules('agama','agama', 'required',
				array(
					'required' 	=> 'kolom %s tidak boleh kosong!!!!!!!'
				));
			$this->form_validation->set_rules('alamat','alamat', 'required',
				array(
					'required' 	=> 'kolom %s tidak boleh kosong!!!!!!!'
				));
			$this->form_validation->set_rules('no_telp','no_telp', 'required|numeric',
				array(
					'required' 	=> 'kolom %s tidak boleh kosong!!!!!!!',
					'numeric' 	=> 'kolom %s hanya boleh diisi angka'
				));
			$this->form_validation->set_rules('email','email', 'required|valid_email',
				array(
					'required' 		=> 'kolom %s tidak boleh kosong!!!!!!!',
					'valid_email' 	=> 'kolom %s harus diisi dengan format email'
				));
		if($this->form_validation->run()==False){
			$this->load->view('admin/insert_member', $data);
		}else{
			$upload = $this->dataAdmin->upload();
			if ($upload['result'] == 'success') {
				$this->dataAdmin->insert_member($upload);
				redirect('admin/member');
			}else{
				$data['message'] = $upload['error'];
			}
		}
	}

	public function delete_member($id)
	{
		$this->load->model('dataAdmin');
		$this->dataAdmin->delete_member($id);
		redirect('admin/member');
	}

	public function lowongan()
	{
		$this->load->model('dataAdmin');
		$data['lowongan'] = $this->dataAdmin->get_lowongan();
		$this->load->view('admin/select_lowongan', $data);
	}

	public function delete_lowongan($id)
	{
		$this->load->model('dataAdmin');
		$this->dataAdmin->delete_lowongan($id);
		redirect('admin/lowongan');
	}

	public function pendaftar()
	{
		$this->load->model('dataAdmin');
		$data['pendaftar'] = $this->dataAdmin->get_pendaftar();
		$this->load->view('admin/select_pendaftar', $data);
	}

	public function delete_pendaftar($id)
	{
		$this->load->model('dataAdmin');
		$this->dataAdmin->delete_pendaftar($id);
		redirect('admin/pendaftar');
	}

	public function perusahaan()
	{
		$this->load->model('dataAdmin');
		$data['perusahaan'] = $this->dataAdmin->get_perusahaan();
		$this->load->view('admin/select_perusahaan', $data);
	}

	public function delete_perusahaan($id)
	{
		$this->load->model('dataAdmin');
		$this->dataAdmin->delete_perusahaan($id);
		redirect('admin/perusahaan');
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */