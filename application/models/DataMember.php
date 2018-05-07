<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataMember extends CI_Model {

	public function get_profile($id)
	{
		$this->db->select('*');
		$this->db->from('member');
		$this->db->join('user', 'member.fk_user = user.id_user');
		$this->db->where('member.id_member='.$id);
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

	public function get_perusahaan()
	{
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

}

/* End of file DataMember.php */
/* Location: ./application/models/DataMember.php */