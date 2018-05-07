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
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
		 	'password' => $password
		);
		die();
		$cek = $this->dataLogin->cek_login("user",$where)->num_rows();
		if($cek > 0){
		   	$data_session = array(
		    	'username' => $username,
		    	'status' => "login"
			);
			$data = $this->dataLogin->get_user($username, $password);
			if ($data[0]->level == '1') {
		    		$this->session->set_userdata($data_session);
					redirect('admin');
			} else if ($data[0]->level == '3') {
				$this->session->set_userdata($data_session);
				redirect('member');
			} else if ($data[0]->level == '2') {
				$this->session->set_userdata($data_session);
				redirect('perusahaan');
		    } else{
		    	echo"anda tidak terdaftar";
		    }
		}else{
			echo "<script type='text/javascript'>
		            alert ('Maaf Username Dan Password Anda Salah !');
		            document.write ('<center><h1> Harap Masukan Username Dan Password Dengan Benar !</h1></center>
		            <center><h1> www.kioscoding.com</h1></center>');
		    </script>";
  		}
	}

	public function logout(){
 		$this->session->sess_destroy();
 		redirect(base_url('login'));
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */