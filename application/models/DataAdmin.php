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

	public function insert_member($upload)
	{
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

		$this->db->insert('member', $data);
	}

	public function delete_member($id){
		$this->db->where('id_member', $id);
		$this->db->delete('member');
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

}

/* End of file Admin.php */
/* Location: ./application/models/Admin.php */