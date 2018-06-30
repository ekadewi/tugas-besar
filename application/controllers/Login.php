<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dataLogin');
	}

	public function index()
	{
		$this->load->view('login/login');
	}

	public function daftar($level) //dari form open
	{
		$this->load->model('DataUser');
		// $data['level'] = $level;
		$data['jenis_perusahaan'] = $this->DataUser->get_jenis_perusahaan();

		if ($this->input->post('submit')) {
			
			$upload = $this->DataUser->upload();

			if ($upload['result'] == 'success') {
				$this->DataUser->daftar_user($level); 
				$user = $this->DataUser->get_user($this->input->post('username'));
				
				if ($level == 3) {
					$this->DataUser->daftar_member($user[0]->id_user, $upload);
					redirect('login/');
				} else {
					$this->DataUser->daftar_perusahaan($user[0]->id_user, $upload);
					redirect('admin');
				}
			}else{
				$data['message'] = $upload['error'];
			}
		}

		$this->load->view('login/daftarMember', $data);
	}

	public function cek_login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required',
			array(
				'required' 		=> 'kolom %s tidak boleh kosong!!!!!!!'
			));
		$this->form_validation->set_rules('password', 'Password', 'required',
			array(
				'required' 		=> 'kolom %s tidak boleh kosong!!!!!!!'
			));

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('login/login');
		} else {
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			// $level = $this->input->post('level');

			$id_user = $this->dataLogin->login($username, $password);
			// var_dump($id_user);
			// die();
			if ($id_user) {
				$level = $this->dataLogin->get_user($id_user);
				$user_data = array(
					'id' => $id_user,
					'username' => $username,
					'logged_in' => true,
					'level' => $level[0]->id_level
				);

				$this->session->set_userdata($user_data);
				$this->session->set_flashdata('user_loggedin', 'You are now logged in');
				// redirect('blog');
				if ($this->session->userdata('level') == 1) {
					redirect('admin');
				} else if ($this->session->userdata('level') == 2) {
					redirect('perusahaan');
				} else if ($this->session->userdata('level') == 3) {
					redirect('member/profile/'.$this->session->userdata("id"));
				} else {
					redirect('welcome');
				} 
				
			} else {
				$this->session->set_flashdata('login_failed', 'Login Failed');
				// var_dump($username);
				// var_dump($password);
				// var_dump($id_user);
				redirect('login');
			}

		}
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');

		$this->session->set_flashdata('user_loggedout', 'You are logged out');

		redirect('login');
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */