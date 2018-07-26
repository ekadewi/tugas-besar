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
		$this->db->select('*');
		$this->db->from('member');
		$this->db->order_by('id_member', 'DESC');
		return $this->db->get()->result();
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

	public function insert_user()
	{
		$data = array(
			'username'	=> $this->input->post('username'),
			'password'	=> md5($this->input->post('password')),
			'id_level'	=> $this->input->post('type_user')
		);

		$this->db->insert('user', $data);
	}

	public function insert_user_perusahaan($id)
	{
		$data = array(
			'username'	=> $this->input->post('username'),
			'password'	=> md5($this->input->post('password')),
			'id_level'	=> $id
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

	public function delete_user($id_user)
	{
		$this->db->where('id_user', $id_user);
		$this->db->delete('user');
	}

	public function get_lowongan(){
		$this->db->select('*');
		$this->db->from('lowongan');
		$this->db->join('perusahaan', 'lowongan.id_perusahaan = perusahaan.id_perusahaan');
		$this->db->order_by('id_lowongan', 'desc');
		return $this->db->get()->result();
	}

	public function delete_lowongan($id){
		$this->db->where('id_lowongan', $id);
		$this->db->delete('lowongan');
	}

	public function get_pendaftar(){
		$this->db->select('*');
		$this->db->from('pendaftar');
		$this->db->join('lowongan', 'lowongan.id_lowongan = pendaftar.id_lowongan');
		$this->db->join('perusahaan', 'lowongan.id_perusahaan = perusahaan.id_perusahaan');
		$this->db->join('member', 'pendaftar.id_member = member.id_member');
		$this->db->order_by('id_pendaftar', 'desc');
		return $this->db->get()->result();
	}

	public function delete_pendaftar($id){
		$this->db->where('id_pendaftar', $id);
		$this->db->delete('pendaftar');
	}

	public function get_perusahaan(){
		$this->db->select('*');
		$this->db->from('perusahaan');
		$this->db->order_by('id_perusahaan', 'desc');
		return $this->db->get()->result();
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
				'id_level'	=> $this->input->post('type_user')
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
				'id_level'	=> $this->input->post('type_user')
			);
		}
		$this->db->where('id_member', $id);
		$this->db->update('member', $data);
		$this->db->where('id_user', $fk_user);
		$this->db->update('user', $datauser);
	}

	public function get_single_perusahaan($id)
	{
		$this->db->select('*');
		$this->db->from('perusahaan');
		$this->db->join('user', 'perusahaan.fk_user = user.id_user');
		$this->db->where('perusahaan.id_perusahaan='.$id);
		return $this->db->get()->result();
	}

	public function insert_perusahaan($id_user, $upload)
	{
		$data = array(
			'nama_perusahaan' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_telp' => $this->input->post('no_telp'),
			'email' => $this->input->post('email'),
			'website' => $this->input->post('website'),
			'fax' => $this->input->post('fax'),
			'visi' => $this->input->post('visi'),
			'misi' => $this->input->post('misi'),
			'tahun_berdiri' => $this->input->post('tahun_berdiri'),
			'id_jenis_perusahaan' => $this->input->post('id_jenis_perusahaan'),
			'foto' => $upload['file']['file_name'],
			'fk_user' => $id_user
		);

		$this->db->insert('perusahaan', $data);
	}

	public function update_perusahaan($upload, $id, $fk_user)
	{
		if ($upload['result']=='success') {
			$data = array(
				'nama_perusahaan' => $this->input->post('nama_perusahaan'),
				'id_jenis_perusahaan' => $this->input->post('id_jenis_perusahaan'),
				'alamat' => $this->input->post('alamat'),
				'no_telp' => $this->input->post('no_telp'),
				'fax' => $this->input->post('fax'),
				'email' => $this->input->post('email'),
				'website' => $this->input->post('website'),
				'visi' => $this->input->post('visi'),
				'visi' => $this->input->post('visi'),
				'misi' => $this->input->post('misi'),
				'tahun_berdiri' => $this->input->post('tahun_berdiri'),
				'foto' => $upload['file']['file_name']
			);
			$datauser = array(
				'username'	=> $this->input->post('username')
			);
		} else {
			$data = array(
				'nama_perusahaan' => $this->input->post('nama_perusahaan'),
				'id_jenis_perusahaan' => $this->input->post('id_jenis_perusahaan'),
				'alamat' => $this->input->post('alamat'),
				'no_telp' => $this->input->post('no_telp'),
				'fax' => $this->input->post('fax'),
				'email' => $this->input->post('email'),
				'website' => $this->input->post('website'),
				'visi' => $this->input->post('visi'),
				'visi' => $this->input->post('visi'),
				'misi' => $this->input->post('misi'),
				'tahun_berdiri' => $this->input->post('tahun_berdiri'),
			);
			$datauser = array(
				'username'	=> $this->input->post('username')
			);
		}
		$this->db->where('id_perusahaan', $id);
		$this->db->update('perusahaan', $data);
		$this->db->where('id_user', $fk_user);
		$this->db->update('user', $datauser);
	}

}

/* End of file Admin.php */
/* Location: ./application/models/Admin.php */