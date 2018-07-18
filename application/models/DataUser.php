<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataUser extends CI_Model {

	public function daftar_user($level)
	{
		$data = array(
			'username'	=> $this->input->post('username'),
			'password'	=> md5($this->input->post('password')),
			'id_level'		=> $level
		);

		$this->db->insert('user', $data);
	}

	public function get_user($username)
	{
		$this->db->where('username', $username);
		$query = $this->db->get('user');
		return $query->result();
	}

	public function upload()
	{
		$config['upload_path'] = './upload/';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']  = '2048';
		$config['remove_space']  = TRUE;
		
		$this->load->library('upload', $config);
		
		if ($this->upload->do_upload('foto_member') || $this->upload->do_upload('foto_perusahaan')){
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		} else {
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}

	public function daftar_member($fk_user, $upload)
	{
		$data = array(
			'nama_member'	=> $this->input->post('nama_member'),
			'jenis_kelamin'	=> $this->input->post('jenis_kelamin'),
			'tanggal_lahir'	=> $this->input->post('tanggal_lahir'),
			'agama'			=> $this->input->post('agama'),
			'alamat'		=> $this->input->post('alamat'),
			'no_telp'		=> $this->input->post('no_telp'),
			'email'			=> $this->input->post('email'),
			'foto_member'	=> $upload['file']['file_name'],
			'fk_user'		=> $fk_user
		);

		$this->db->insert('member', $data);
	}

	public function get_jenis_perusahaan()
	{
		$query = $this->db->get('jenis_perusahaan');
		return $query->result();
	}

	public function daftar_perusahaan($fk_user, $upload)
	{
		$data = array(
			'nama_perusahaan'		=> $this->input->post('nama_perusahaan'),
			'alamat'				=> $this->input->post('alamat'),
			'no_telp'				=> $this->input->post('no_telp'),
			'email'					=> $this->input->post('email'),
			'website'				=> $this->input->post('website'),
			'fax'					=> $this->input->post('fax'),
			'visi'					=> $this->input->post('visi'),
			'misi'					=> $this->input->post('misi'),
			'tahun_berdiri'			=> $this->input->post('tahun_berdiri'),
			'id_jenis_perusahaan'	=> $this->input->post('id_jenis_perusahaan'),
			'foto'			=> $upload['file']['file_name'],
			'fk_user'				=> $fk_user
		);

		$this->db->insert('perusahaan', $data);
	}
}

/* End of file dataUser.php */
/* Location: ./application/models/dataUser.php */