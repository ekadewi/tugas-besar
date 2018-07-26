<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dataMember');
		$this->load->model('dataPendaftar');
	}

	public function index()
	{
		$this->load->model('dataVisitor');
		$data['perusahaan'] = $this->dataVisitor->get_perusahaan();
		$data['lowongan'] = $this->dataVisitor->get_lowongan();
		$this->load->view('member/home', $data);		
	}

	public function Profile()
	{
		$id = $this->session->userdata('id');
		$data['biodata'] = $this->dataMember->get_profile($id);
		$this->load->view('member/profile', $data);
	}

	public function Akun()
	{
		if ($this->session->userdata('level') != 4) {
			$this->session->set_flashdata('not_allow', 'maaf anda bukan member premium, silahkan hubungi admin untuk mengganti type member');
			redirect('member/profile/'.$this->session->userdata('id'));
		}
		$id = $this->session->userdata('id');
		$data['biodata'] = $this->dataMember->get_profile($id);
		$this->load->view('member/akun', $data);
	}

	public function update_akun($id)
	{
		if ($this->session->userdata('level') != 4) {
			$this->session->set_flashdata('not_allow', 'maaf anda bukan member premium, silahkan hubungi admin untuk mengganti type member');
			redirect('member/profile/'.$this->session->userdata('id'));
		}
		$data['biodata'] = $this->dataMember->get_profile($id);
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]',
			array(
				'required' 		=> 'kolom %s tidak boleh kosong!!!!!!!',
				'is_unique'		=> 'isi dari kolom %s sudah ada'
			));
		if ($this->form_validation->run()==False) {
			$this->load->view('member/update_akun', $data);
		}else{
			if ($this->input->post('update')) {
				// $fk_user = $data['biodata'][0]->fk_user;
				$this->dataMember->update_akun($this->session->userdata('id'));
				redirect('member/akun/'.$this->session->userdata('id'));
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
				// $fk_user = $data['biodata'][0]->fk_user;
				// var_dump($fk_user);
				// die();
				$this->dataMember->update($upload, $data['biodata'][0]->id_member, $this->session->userdata('id'));
				redirect('member/profile/'.$this->session->userdata('id'));
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
		$data['profile'] = $this->dataMember->get_profile_perusahaan($id);
		$this->load->view('member/select_single_perusahaan', $data);
	}

	public function detail_lowongan($id)
	{
		$data['profile'] = $this->dataMember->get_single_lowongan($id);
		$data['pendaftar']= $this->dataPendaftar->get_pendaftar();
		$data['member'] = $this->dataMember->get_profile($this->session->userdata('id'));

		if ($this->input->post('daftar')) {
			$uploadCV = $this->dataMember->uploadCV();
			if ($uploadCV['result']=='success') {
				$this->dataMember->daftarLowongan($uploadCV, $data['member'][0]->id_member, $id);
				redirect('member/detail_lowongan/'.$id);
			} else {
				$data['error'] = $uploadCV['error'];
			}
		}
		
		$this->load->view('member/select_single_lowongan', $data);
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

	public function history()
	{
		$member = $this->dataMember->get_profile($this->session->userdata('id'));
		$data['history'] = $this->dataMember->pendaftar($member[0]->id_member);
		$this->load->view('member/select_history', $data);
	}

	public function update_foto($id)
	{
		$this->dataMember->update_foto($id);
		redirect('member/profile/'.$this->session->userdata('id'));
	}

	

}

/* End of file Member.php */
/* Location: ./application/controllers/Member.php */