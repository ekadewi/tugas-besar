<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPerusahaan extends CI_Model {

	public function get_profile($fk)
	{
		$this->db->select('*');
		$this->db->from('perusahaan');
		$this->db->join('user', 'perusahaan.fk_user = user.id_user');
		$this->db->join('jenis_perusahaan', 'perusahaan.id_jenis_perusahaan = jenis_perusahaan.id_jenis_perusahaan');
		$this->db->where('perusahaan.fk_user', $fk);
		return $this->db->get()->result();
	}

	public function get_lowongan($fk)
	{
		$this->db->select('*');
		$this->db->from('perusahaan');
		$this->db->join('lowongan', 'lowongan.id_perusahaan = perusahaan.id_perusahaan');
		$this->db->where('perusahaan.fk_user', $fk);
		return $this->db->get()->result();
	}

	public function get_single_lowongan($id_lowongan)
	{
		$this->db->select('*');
		$this->db->from('lowongan');
		$this->db->where('id_lowongan', $id_lowongan);
		return $this->db->get()->result();
	}

	public function insert_lowongan($id_perusahaan)
	{
		$data = array(
			'lowongan' => $this->input->post('lowongan'),
			'deskripsi' => $this->input->post('deskripsi'),
			'persyaratan' => $this->input->post('persyaratan'),
			'jumlah' => $this->input->post('jumlah'),
			'id_perusahaan' => $id_perusahaan,
			'tanggal_post' => date('Y-m-d'),
			'status' => 'buka'
		);

		$this->db->insert('lowongan', $data);
	}

	public function update_lowongan($id_lowongan)
	{
		$data = array(
			'lowongan' => $this->input->post('lowongan'),
			'deskripsi' => $this->input->post('deskripsi'),
			'persyaratan' => $this->input->post('persyaratan'),
			'jumlah' => $this->input->post('jumlah')
		);

		$this->db->where('id_lowongan', $id_lowongan);
		$this->db->update('lowongan', $data);
	}

	public function delete_lowongan($id_lowongan)
	{
		$this->db->where('id_lowongan', $id_lowongan);
		$this->db->delete('lowongan');
	}

	public function update_jumlah($id_lowongan, $jumlah_baru, $status)
	{
		$data = array('jumlah'=>$jumlah_baru, 'status'=>$status);
		$this->db->where('id_lowongan', $id_lowongan);
		$this->db->update('lowongan', $data);
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

	public function update($upload, $id, $fk)
	{
		if ($upload['result']=='success') {
			$data = array(
				'nama_perusahaan' => $this->input->post('nama_perusahaan'),
				'alamat' => $this->input->post('alamat'),
				'no_telp' => $this->input->post('no_telp'),
				'email' => $this->input->post('email'),
				'website' => $this->input->post('website'),
				'fax' => $this->input->post('fax'),
				'visi' => $this->input->post('visi'),
				'misi' => $this->input->post('misi'),
				'tahun_berdiri' => $this->input->post('tahun_berdiri'),
				'id_jenis_perusahaan' => $this->input->post('id_jenis_perusahaan'),
				'foto' => $upload['file']['file_name']
			);
		} else {
			$data = array(
				'nama_perusahaan' => $this->input->post('nama_perusahaan'),
				'alamat' => $this->input->post('alamat'),
				'no_telp' => $this->input->post('no_telp'),
				'email' => $this->input->post('email'),
				'website' => $this->input->post('website'),
				'fax' => $this->input->post('fax'),
				'visi' => $this->input->post('visi'),
				'misi' => $this->input->post('misi'),
				'tahun_berdiri' => $this->input->post('tahun_berdiri'),
				'id_jenis_perusahaan' => $this->input->post('id_jenis_perusahaan')
			);
		}
		$this->db->where('id_perusahaan', $id);
		$this->db->update('perusahaan', $data);
	}

	public function update_foto($id)
	{
		$data = array(
			'foto'	=> 'no_image.jpg'
		);
		$this->db->where('fk_user', $id);
		$this->db->update('perusahaan', $data);
	}

	public function count_pendaftarlolos($id_perusahaan)
	{
		$query = $this->db->query('select count(*) as jumlah from pendaftar inner join lowongan on lowongan.id_lowongan = pendaftar.id_lowongan inner join perusahaan on perusahaan.id_perusahaan = lowongan.id_perusahaan where pendaftar.status_daftar = "lolos" AND perusahaan.id_perusahaan ='.$id_perusahaan);
		return $query->result();
	}

	public function count_pendaftartidaklolos($id_perusahaan)
	{
		$query = $this->db->query('select count(*) as jumlah from pendaftar inner join lowongan on lowongan.id_lowongan = pendaftar.id_lowongan inner join perusahaan on perusahaan.id_perusahaan = lowongan.id_perusahaan where pendaftar.status_daftar = "tidak lolos" AND perusahaan.id_perusahaan ='.$id_perusahaan);
		return $query->result();
	}

	public function count_pendaftarbaru($id_perusahaan)
	{
		$query = $this->db->query('select count(*) as jumlah from pendaftar inner join lowongan on lowongan.id_lowongan = pendaftar.id_lowongan inner join perusahaan on perusahaan.id_perusahaan = lowongan.id_perusahaan where pendaftar.status_daftar = "baru" AND perusahaan.id_perusahaan ='.$id_perusahaan);
		return $query->result();
	}

}

/* End of file DataPerusahaan.php */
/* Location: ./application/models/DataPerusahaan.php */