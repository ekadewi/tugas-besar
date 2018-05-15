<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dataAdmin');
	}

	public function index()
	{
		$data['member'] = $this->dataAdmin->count_member();
		$data['perusahaan'] = $this->dataAdmin->count_perusahaan();
		$data['lowongan'] = $this->dataAdmin->count_lowongan();
		$this->load->view('admin/home', $data);		
	}

	public function jenis_perusahaan()
	{
		$data['jenis_perusahaan'] = $this->dataAdmin->get_jenis_perusahaan();
		$this->load->view('admin/select_jenis', $data);
	}

	public function insert_jenis_perusahaan()
	{
		$data = array();
		$this->form_validation->set_rules('jenis_perusahaan','jenis perusahaan', 'required|alpha|is_unique[jenis_perusahaan.jenis_perusahaan]',
			array(
				'required' 	=> 'kolom %s tidak boleh kosong!!!!!!!',
				'alpha' 	=> 'kolom %s hanya boleh diisi huruf',
				'is_unique'		=> 'isi dari kolom %s sudah ada'
			));

		if($this->form_validation->run()==False){
			$this->load->view('admin/insert_jenis');
		}else{
			$this->dataAdmin->insert_jenis();
			redirect('admin/jenis_perusahaan');
		}
	}

	public function update_jenis_perusahaan($id) {
		$data['detail'] = $this->dataAdmin->get_single_jenis($id);
		$this->form_validation->set_rules('nama','jenis perusahaan', 'required|alpha|is_unique[jenis_perusahaan.jenis_perusahaan]',
			array(
				'required' 	=> 'kolom %s tidak boleh kosong!!!!!!!',
				'alpha' 	=> 'kolom %s hanya boleh diisi huruf',
				'is_unique'		=> 'isi dari kolom %s sudah ada'
			));
		if($this->form_validation->run()==False){
			$this->load->view('admin/update_jenis', $data);
		} else {
			if ($this->input->post('update')) {
				$this->dataAdmin->update_jenis($id);
				redirect('admin/jenis_perusahaan');
			}
			$this->load->view('admin/update_jenis', $data);
		}	
	}

	public function delete_jenis_perusahaan($id)
	{
		$this->dataAdmin->delete_jenis($id);
		redirect('admin/jenis_perusahaan');
	}

	public function member()
	{
		$data['member'] = $this->dataAdmin->get_member();
		$this->load->view('admin/select_member', $data);
	}

	public function insert_member()
	{

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
			$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]',
			array(
				'required' 		=> 'kolom %s tidak boleh kosong!!!!!!!',
				'is_unique'		=> 'isi dari kolom %s sudah ada'
			));
			$this->form_validation->set_rules('password', 'Password', 'required',
				array(
					'required' 		=> 'kolom %s tidak boleh kosong!!!!!!!'
				));
		if($this->form_validation->run()==False){
			$this->load->view('admin/insert_member', $data);
		}else{
			$upload = $this->dataAdmin->upload();
			if ($upload['result'] == 'success') {
				$this->dataAdmin->insert_user(3);
				$user = $this->dataAdmin->get_user($this->input->post('username'));
				$this->dataAdmin->insert_member($user[0]->id_user, $upload);
				redirect('admin/member');
			}else{
				$data['message'] = $upload['error'];
			}
		}
	}

	public function delete_member($id)
	{
		$user = $this->dataAdmin->get_single_member($id);
		$this->dataAdmin->delete_user($user[0]->fk_user);
		$this->dataAdmin->delete_member($id);
		redirect('admin/member');
	}

	public function lowongan()
	{
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
		$this->dataAdmin->delete_perusahaan($id);
		redirect('admin/perusahaan');
	}

	public function update_member($id)
	{
		$data['detail'] = $this->dataAdmin->get_single_member($id);
		$this->form_validation->set_rules('nama', 'Nama', 'required|alpha',
			array(
				'required' 		=> 'kolom %s tidak boleh kosong!!!!!!!',
				'alpha' 	=> 'kolom %s hanya boleh diisi huruf'
			));
		$this->form_validation->set_rules('alamat', 'alamat', 'required',
			array(
				'required' 		=> 'kolom %s tidak boleh kosong!!!!!!!'
			));
		$this->form_validation->set_rules('no_telp', 'NoTelp', 'required|numeric',
			array(
				'required' 		=> 'kolom %s tidak boleh kosong!!!!!!!',
				'numeric' 	=> 'kolom %s hanya boleh diisi angka'
			));
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email',
			array(
				'required' 		=> 'kolom %s tidak boleh kosong!!!!!!!',
				'valid_email' 	=> 'kolom %s harus diisi dengan format email'
			));
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]',
			array(
				'required' 		=> 'kolom %s tidak boleh kosong!!!!!!!',
				'is_unique'		=> 'isi dari kolom %s sudah ada'
			));
		$this->form_validation->set_rules('password', 'password', 'required',
			array(
				'required' 		=> 'kolom %s tidak boleh kosong!!!!!!!'
			));
		if($this->form_validation->run()==False){
			$this->load->view('admin/update_member', $data);
		} else {
			if ($this->input->post('update')) {
				$upload=$this->dataAdmin->upload();
				$fk_user = $data['detail'][0]->fk_user;
				// var_dump($fk_user);
				// die();
				$this->dataAdmin->update($upload, $id, $fk_user);
				redirect('admin/member');
			}
			$this->load->view('admin/update_member', $data);
		}
		
	}
	public function insert_perusahaan()
	{
		$data = array();
		$data['jenis'] = $this->dataAdmin->get_jenis_perusahaan();
		if ($this->input->post('simpan')) {
			$upload = $this->dataAdmin->upload();
			if ($upload['result'] == 'success') {
				$this->dataAdmin->insert_user(2);
				$user = $this->dataAdmin->get_user($this->input->post('username'));
				$this->dataAdmin->insert_perusahaan($user[0]->id_user, $upload);
				redirect('admin/perusahaan');
			}else{
				$data['message'] = $upload['error'];
			}
		}
		$this->load->view('admin/insert_perusahaan', $data);
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */