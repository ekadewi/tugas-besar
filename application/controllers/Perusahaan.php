<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perusahaan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dataPerusahaan');
		$this->load->model('dataPendaftar');
		$this->load->model('dataUser');
	}

	public function index()
	{
		$data['id'] = $this->dataPerusahaan->get_profile($this->session->userdata('id'));
		$data['pendaftarlolos'] = $this->dataPerusahaan->count_pendaftarlolos($data['id'][0]->id_perusahaan);
		$data['pendaftartidaklolos'] = $this->dataPerusahaan->count_pendaftartidaklolos($data['id'][0]->id_perusahaan);
		$data['pendaftarbaru'] = $this->dataPerusahaan->count_pendaftarbaru($data['id'][0]->id_perusahaan);
		$this->load->view('perusahaan/beranda', $data);	
	}

	public function profile($fk)
	{
		$data['profile'] = $this->dataPerusahaan->get_profile($fk);
		$this->load->view('perusahaan/home', $data);
	}

	public function lowongan($fk)
	{
		$data['lowongan'] = $this->dataPerusahaan->get_lowongan($fk);
		$data['perusahaan'] = $this->dataPerusahaan->get_profile($fk);
		$this->load->view('perusahaan/lowongan', $data);
	}

	public function pendaftar($fk)
	{
		$profile = $this->dataPerusahaan->get_profile($fk);
		$data['pendaftar'] = $this->dataPendaftar->get_pendaftar_by_perusahaan($profile[0]->id_perusahaan);

		if ($this->input->post('print')) {
			$this->load->library('pdf');
			$data['print'] = $this->dataPendaftar->get_pendaftar_by_perusahaan_dan_status($profile[0]->id_perusahaan, $this->input->post('pendaftar'));
			$this->pdf->load_view('perusahaan/print_pendaftar', $data);
			// $this->load->view('perusahaan/print_pendaftar', $data);
		} else {
			$this->load->view('perusahaan/pendaftar', $data);
		}

	}

	public function terima($id_pendaftar, $id_lowongan)
	{
		$lowongan = $this->dataPerusahaan->get_single_lowongan($id_lowongan);
		$jumlah_baru = $lowongan[0]->jumlah - 1;
		$status = 'buka';
		if ($jumlah_baru < 1) {
			$jumlah_baru = 0;
			$status = 'tutup';
		}
		$this->dataPerusahaan->update_jumlah($id_lowongan, $jumlah_baru, $status);
		$this->dataPendaftar->terima_pendaftar($id_pendaftar);
		redirect('perusahaan/pendaftar/'.$this->session->userdata('id'));
	}

	public function tolak($id_pendaftar)
	{
		$this->dataPendaftar->tolak_pendaftar($id_pendaftar);
		redirect('perusahaan/pendaftar/'.$this->session->userdata('id'));
	}

	public function tambah($id_perusahaan)
	{
		$data['id_perusahaan'] = $id_perusahaan;

		$this->form_validation->set_rules('lowongan','Lowongan', 'required',
			array(
				'required' 	=> 'kolom %s tidak boleh kosong!!!!!!!'
			));
		$this->form_validation->set_rules('deskripsi','Deskripsi', 'required|min_length[10]',
			array(
				'required' 	=> 'kolom %s tidak boleh kosong!!!!!!!',
				'min_length' => 'kolom %s diisi minimal 10 karakter'
			));
		$this->form_validation->set_rules('persyaratan','Persyaratan', 'required|min_length[15]',
			array(
				'required' 	=> 'kolom %s tidak boleh kosong!!!!!!!',
				'min_length' => 'kolom %s diisi minimal 15 karakter'
			));
		$this->form_validation->set_rules('jumlah','Jumlah', 'trim|required|numeric',
			array(
				'required' 	=> 'kolom %s tidak boleh kosong!!!!!!!',
				'numeric' 	=> 'kolom %s hanya boleh angka'
			));

		if($this->form_validation->run()==False){
			$this->load->view('perusahaan/tambah', $data);
		}else{
			$this->dataPerusahaan->insert_lowongan($id_perusahaan);
			redirect('perusahaan/lowongan/'.$this->session->userdata('id'));
		}
	}

	public function edit($id_lowongan)
	{
		$data['detail'] = $this->dataPerusahaan->get_single_lowongan($id_lowongan);

		$this->form_validation->set_rules('lowongan','Lowongan', 'required',
			array(
				'required' 	=> 'kolom %s tidak boleh kosong!!!!!!!'
			));
		$this->form_validation->set_rules('deskripsi','Deskripsi', 'required',
			array(
				'required' 	=> 'kolom %s tidak boleh kosong!!!!!!!'
			));
		$this->form_validation->set_rules('persyaratan','Persyaratan', 'required',
			array(
				'required' 	=> 'kolom %s tidak boleh kosong!!!!!!!'
			));
		$this->form_validation->set_rules('jumlah','Jumlah', 'trim|required|numeric',
			array(
				'required' 	=> 'kolom %s tidak boleh kosong!!!!!!!',
				'numeric' 	=> 'kolom %s hanya boleh angka'
			));

		if($this->form_validation->run()==False){
			$this->load->view('perusahaan/edit', $data);
		} else {
			$this->dataPerusahaan->update_lowongan($id_lowongan);
			redirect('perusahaan/lowongan/'.$this->session->userdata('id'));
		}
	}

	public function hapus($id_lowongan)
	{
		$this->dataPerusahaan->delete_lowongan($id_lowongan);
		redirect('perusahaan/lowongan/'.$this->session->userdata('id'));
	}

	public function update($id)
	{
		$data['profil'] = $this->dataPerusahaan->get_profile($id);
		$data['jenis_perusahaan'] = $this->dataUser->get_jenis_perusahaan();

		$this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'trim|required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required',
			array(
				'required' 		=> 'kolom %s tidak boleh kosong!!!!!!!'
			));
		$this->form_validation->set_rules('no_telp', 'NoTelp', 'required|numeric',
			array(
				'required' 		=> 'kolom %s tidak boleh kosong!!!!!!!',
				'numeric' 	=> 'kolom %s hanya boleh diisi angka'
			));
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email',
			array(
				'required' 		=> 'kolom %s tidak boleh kosong!!!!!!!',
				'valid_email' 	=> 'kolom %s harus diisi dengan format email'
			));
		$this->form_validation->set_rules('website', 'Website', 'required',
			array(
				'required' 		=> 'kolom %s tidak boleh kosong!!!!!!!'
			));
		$this->form_validation->set_rules('fax', 'Fax', 'required|numeric',
			array(
				'required' 		=> 'kolom %s tidak boleh kosong!!!!!!!',
				'numeric' 	=> 'kolom %s hanya boleh diisi angka'
			));
		$this->form_validation->set_rules('visi', 'Visi', 'required',
			array(
				'required' 		=> 'kolom %s tidak boleh kosong!!!!!!!'
			));
		$this->form_validation->set_rules('misi', 'Misi', 'required',
			array(
				'required' 		=> 'kolom %s tidak boleh kosong!!!!!!!'
			));
		$this->form_validation->set_rules('tahun_berdiri', 'Tahun Berdiri', 'required',
			array(
				'required' 		=> 'kolom %s tidak boleh kosong!!!!!!!'
			));

		if($this->form_validation->run()==False){
			$this->load->view('perusahaan/editProfile', $data);
		} else {
			if ($this->input->post('update')) {
				$upload=$this->dataPerusahaan->upload();
				$this->dataPerusahaan->update($upload, $data['profil'][0]->id_perusahaan, $this->session->userdata('id'));
				redirect('perusahaan/profile/'.$this->session->userdata('id'));
			}
			$this->load->view('perusahaan/editProfile', $data);
		}
		
	}

	public function update_foto($id)
	{
		$this->dataPerusahaan->update_foto($id);
		redirect('perusahaan');
	}

}

/* End of file Perusahaan.php */
/* Location: ./application/controllers/Perusahaan.php */