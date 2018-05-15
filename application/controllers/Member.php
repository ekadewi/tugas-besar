<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dataMember');
	}

	public function index()
	{
		$this->load->view('member/home');		
	}

	public function Profile($id)
	{
		$data['biodata'] = $this->dataMember->get_profile($id);
		$this->load->view('member/profile', $data);
	}

	public function Akun($id)
	{
		$data['biodata'] = $this->dataMember->get_profile($id);
		$this->load->view('member/akun', $data);
	}

	public function update_akun($id)
	{
		$data['biodata'] = $this->dataMember->get_profile($id);
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]',
			array(
				'required' 		=> 'kolom %s tidak boleh kosong!!!!!!!',
				'is_unique'		=> 'isi dari kolom %s sudah ada'
			));
		$this->form_validation->set_rules('password', 'Password', 'required',
			array(
				'required' 		=> 'kolom %s tidak boleh kosong!!!!!!!'
			));
		if ($this->form_validation->run()==False) {
			$this->load->view('member/update_akun', $data);
		}else{
			if ($this->input->post('update')) {
				$fk_user = $data['biodata'][0]->fk_user;
				$this->dataMember->update_akun($fk_user);
				//redirect('member/akun');
			}
			$this->load->view('member/update_akun', $data);
		}
	}

	public function update($id)
	{
		$data['biodata'] = $this->dataMember->get_profile($id);
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
		if($this->form_validation->run()==False){
			$this->load->view('member/editProfile', $data);
		} else {
			if ($this->input->post('update')) {
				$upload=$this->dataMember->upload();
				$fk_user = $data['biodata'][0]->fk_user;
				// var_dump($fk_user);
				// die();
				$this->dataMember->update($upload, $id, $fk_user);
				redirect('member/profile/'.$id);
			}
			$this->load->view('member/editProfile', $data);
		}
		
	}

	public function perusahaan()
	{
		$limit_per_page = 3;
		$start_index = ( $this->uri->segment(3) ) ? $this->uri->segment(3) : 0;
		$total_records = $this->dataMember->get_total_perusahaan();
		if ($total_records > 0) {
			$data['perusahaan'] = $this->dataMember->get_perusahaan($limit_per_page, $start_index);

			$config['base_url'] = base_url() . 'member/perusahaan';
			$config['total_rows'] = $total_records;
			$config['per_page'] = $limit_per_page;
			$config['uri_segment'] = 3;
			
			$this->pagination->initialize($config);
			
			$data['links'] = $this->pagination->create_links();
		}
		$this->load->view('member/select_perusahaan', $data);
	}

	public function perusahaan_profile($id)
	{
		$this->load->model('dataPerusahaan');
		$data['profile'] = $this->dataPerusahaan->get_profile($id);
		$this->load->view('member/select_single_perusahaan', $data);
	}

	public function lowongan()
	{
		$limit_per_page = 3;
		$start_index = ( $this->uri->segment(3) ) ? $this->uri->segment(3) : 0;
		$total_records = $this->dataMember->get_total_lowongan();
		if ($total_records > 0) {
			$data['lowongan'] = $this->dataMember->get_lowongan($limit_per_page, $start_index);

			$config['base_url'] = base_url() . 'member/lowongan';
			$config['total_rows'] = $total_records;
			$config['per_page'] = $limit_per_page;
			$config['uri_segment'] = 3;
			
			$this->pagination->initialize($config);
			
			$data['links'] = $this->pagination->create_links();
		}
		$this->load->view('member/select_lowongan', $data);
	}

}

/* End of file Member.php */
/* Location: ./application/controllers/Member.php */