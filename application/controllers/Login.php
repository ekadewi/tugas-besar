<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */