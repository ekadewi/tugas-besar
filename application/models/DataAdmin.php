<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataAdmin extends CI_Model {

	public function get_jenis_perusahaan(){
		$query = $this->db->get('jenis_perusahaan');
		return $query->result();
	}	

	public function insert_jenis()
	{
		$data = array(
			'jenis_perusahaan' => $this->input->post('jenis_perusahaan')
		);

		$this->db->insert('jenis_perusahaan', $data);
	}

	public function get_single_jenis($id)
	{
		$query = $this->db->query('select * from jenis_perusahaan where id_jenis_perusahaan='.$id);
		return $query->result();
	}

	public function update_jenis($id){
			$data = array(
				'jenis_perusahaan' => $this->input->post('nama')
			);
		$this->db->where('id_jenis_perusahaan', $id);
		$this->db->update('jenis_perusahaan', $data);
	}

	public function delete_jenis($id){
		$this->db->where('id_jenis_perusahaan', $id);
		$this->db->delete('jenis_perusahaan');
	}

	public function get_member(){
		$query = $this->db->get('member');
		return $query->result();
	}

	public function upload()
	{
		$config['upload_path'] = './upload/';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']  = '2048';
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

	public function insert_user($level)
	{
		$data = array(
			'username'	=> $this->input->post('username'),
			'password'	=> $this->input->post('password'),
			'level'		=> $level
		);

		$this->db->insert('user', $data);
	}

	public function get_user($username)
	{
		$this->db->where('username', $username);
		$query = $this->db->get('user');
		return $query->result();
	}

	public function insert_member($id_user, $upload)
	{
		$data = array(
			'nama_member' => $this->input->post('nama'),
			'jenis_kelamin' => $this->input->post('jk'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'agama' => $this->input->post('agama'),
			'alamat' => $this->input->post('alamat'),
			'no_telp' => $this->input->post('no_telp'),
			'email' => $this->input->post('email'),
			'foto_member' => $upload['file']['file_name'],
			'fk_user' => $id_user
		);

		$this->db->insert('member', $data);
	}

	public function delete_member($id){
		$this->db->where('id_member', $id);
		$this->db->delete('member');
	}

	public function delete_user($fk_user)
	{
		$this->db->where('id_user', $fk_user);
		$this->db->delete('user');
	}

	public function get_lowongan(){
		$query = $this->db->get('lowongan');
		return $query->result();
	}

	public function delete_lowongan($id){
		$this->db->where('id_lowongan', $id);
		$this->db->delete('lowongan');
	}

	public function get_pendaftar(){
		$query = $this->db->get('pendaftar');
		return $query->result();
	}

	public function delete_pendaftar($id){
		$this->db->where('id_pendaftar', $id);
		$this->db->delete('pendaftar');
	}

	public function get_perusahaan(){
		$query = $this->db->get('perusahaan');
		return $query->result();
	}

	public function delete_perusahaan($id){
		$this->db->where('id_perusahaan', $id);
		$this->db->delete('perusahaan');
	}

	public function count_member()
	{
		$query = $this->db->query('select count(*) as jumlah from member');
		return $query->result();
	}

	public function count_perusahaan()
	{
		$query = $this->db->query('select count(*) as jumlah from perusahaan');
		return $query->result();
	}

	public function count_lowongan()
	{
		$query = $this->db->query('select count(*) as jumlah from lowongan');
		return $query->result();
	}

	public function get_single_member($id)
	{
		$this->db->select('*');
		$this->db->from('member');
		$this->db->join('user', 'member.fk_user = user.id_user');
		$this->db->where('member.id_member='.$id);
		return $this->db->get()->result();
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
			$datauser = array(
				'username'	=> $this->input->post('username'),
				'password'	=> $this->input->post('password')
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
			$datauser = array(
				'username'	=> $this->input->post('username'),
				'password'	=> $this->input->post('password')
			);
		}
		$this->db->where('id_member', $id);
		$this->db->update('member', $data);
		$this->db->where('id_user', $fk_user);
		$this->db->update('user', $datauser);
	}

}

/* End of file Admin.php */
/* Location: ./application/models/Admin.php */