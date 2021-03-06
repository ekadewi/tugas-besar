<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataMember extends CI_Model {

	public function get_profile($fk)
	{
		$this->db->select('*');
		$this->db->from('member');
		$this->db->join('user', 'member.fk_user = user.id_user');
		$this->db->join('level', 'user.id_level = level.id_level');
		$this->db->where('member.fk_user='.$fk);
		return $this->db->get()->result();
	}

	public function get_profile_perusahaan($fk)
	{
		$this->db->select('*');
		$this->db->from('perusahaan');
		$this->db->join('jenis_perusahaan', 'perusahaan.id_jenis_perusahaan = jenis_perusahaan.id_jenis_perusahaan');
		$this->db->where('perusahaan.fk_user', $fk);
		return $this->db->get()->result();
	}

	public function upload()
	{
		$config['upload_path'] = './upload/';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']  = '2048000';
		$config['remove_space']  = TRUE;
		
		$this->load->library('upload', $config);
		
		if ($this->upload->do_upload('foto')){
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		} else {
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}

	public function uploadCV()
	{
		$config['upload_path'] = './upload/cv/';
		$config['allowed_types'] = 'pdf';
		$config['remove_space']  = TRUE;
		
		$this->load->library('upload', $config);
		
		if ($this->upload->do_upload('cv')){
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		} else {
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}

	public function daftarLowongan($uploadCV, $id_member, $id_lowongan)
	{
		$data = array(
			'id_member' 	=> $id_member,
			'id_lowongan'	=> $id_lowongan,
			'cv'			=> $uploadCV['file']['file_name'],
			'tanggal_daftar'=> date('Y-m-d'),
			'status_daftar'		=> 'baru'
		);
		$this->db->insert('pendaftar', $data);
	}

	public function update($upload, $id, $fk_user)
	{
		if ($upload['result']=='success') {
			$data = array(
				'nama_member' => $this->input->post('nama'),
				'jenis_kelamin' => $this->input->post('jk'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'agama' => $this->input->post('agama'),
				'alamat' => $this->input->post('alamat'),
				'no_telp' => $this->input->post('no_telp'),
				'email' => $this->input->post('email'),
				'foto_member' => $upload['file']['file_name']
			);
		} else {
			$data = array(
				'nama_member' => $this->input->post('nama'),
				'jenis_kelamin' => $this->input->post('jk'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'agama' => $this->input->post('agama'),
				'alamat' => $this->input->post('alamat'),
				'no_telp' => $this->input->post('no_telp'),
				'email' => $this->input->post('email')
			);
		}
		$this->db->where('id_member', $id);
		$this->db->update('member', $data);
	}

	public function update_akun($fk_user)
	{
		$data = array(
			'username'	=> $this->input->post('username')
		);
		$this->db->where('id_user', $fk_user);
		$this->db->update('user', $data);
	}

	public function get_perusahaan($limit = FALSE, $offset = FALSE)
	{
		if ($limit) {
			$this->db->limit($limit, $offset);
		}
		$this->db->select('*');
		$this->db->from('perusahaan');
		$this->db->join('jenis_perusahaan', 'perusahaan.id_jenis_perusahaan = jenis_perusahaan.id_jenis_perusahaan');
		return $this->db->get()->result();
	}

	public function get_jenis()
	{
		$query = $this->db->get('jenis_perusahaan');
		return $query->result();
	}

	public function get_total_perusahaan()
	{
		return $this->db->count_all("perusahaan");
	}

	public function get_lowongan($limit = FALSE, $offset = FALSE)
	{
		if ($limit) {
			$this->db->limit($limit, $offset);
		}
		$this->db->select('*');
		$this->db->from('lowongan');
		$this->db->join('perusahaan', 'lowongan.id_perusahaan = perusahaan.id_perusahaan');
		$this->db->order_by('id_lowongan', 'asc');
		$this->db->where('status', 'buka');
		return $this->db->get()->result();
	}


	public function get_total_lowongan()
	{
		return $this->db->count_all("lowongan");
	}

	// public function get_total_lowongan_perusahaan($id)
	// {
	// 	$this->db->where('id_perusahaan', $id);
	// 	return $this->db->count_all("lowongan");
	// }

	public function get_single_lowongan($id)
	{
		$this->db->select('*');
		$this->db->from('lowongan');
		$this->db->join('perusahaan', 'lowongan.id_perusahaan = perusahaan.id_perusahaan');
		$this->db->where('lowongan.id_lowongan', $id);
		return $this->db->get()->result();
	}

	public function pendaftar($id)
	{
		
		$this->db->select('*');
		$this->db->from('pendaftar');
		$this->db->join('lowongan', 'lowongan.id_lowongan = pendaftar.id_lowongan');
		$this->db->join('perusahaan', 'lowongan.id_perusahaan = perusahaan.id_perusahaan');
		$this->db->where('pendaftar.id_member', $id);
		return $this->db->get()->result();
	}

	public function update_foto($id)
	{
		$data = array(
			'foto_member'	=> 'user_icon.png'
		);
		$this->db->where('fk_user', $id);
		$this->db->update('member', $data);
	}

}

/* End of file DataMember.php */
/* Location: ./application/models/DataMember.php */