<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calon_pegawai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('m_pegawai');

		if ($this->session->userdata('logged_in') == FALSE) {
			echo "<script language=javascript>alert('Maaf. Anda tidak memiliki akses.');</script>";
			redirect('auth/login','refresh');
		}
	}

	public function index()
	{
		$status = 0;
		$data = array(
			'title' => 'Semua Calon Pegawai',
			'pegawais' => $this->m_pegawai->get_pegawai('pegawai', $status)
		);

		$tmp['konten'] = $this->load->view('auth/pegawai/view_calon_pegawai',$data, TRUE);
		$this->load->view('auth/layout',$tmp);
	}

	public function tambah_calon_pegawai()
	{
		$data = array(
			'title' => 'Form Tambah Calon Pegawai'
		);

		$tmp['konten'] = $this->load->view('auth/pegawai/tambah_calon_pegawai',$data, TRUE);
		$this->load->view('auth/layout',$tmp);
	}

	public function save()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'gender' => $this->input->post('gender'),
			'status' => 0
		);
		$result = $this->m_pegawai->simpan('pegawai',$data);
		if ($result) {
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Berhasil memasukkan data</strong></div>");
			redirect('auth/calon_pegawai');
		}
	}

	public function edit_calon_pegawai($id='')
	{
		$data = array(
			'title' => 'Form Edit Calon Pegawai',
			'pegawai' => $this->m_pegawai->pegawai_by_id('pegawai',$id), 
		);

		$tmp['konten'] = $this->load->view('auth/pegawai/edit_calon_pegawai',$data, TRUE);
		$this->load->view('auth/layout',$tmp);
	}

	public function update()
	{
		$id = $this->input->post('id');
		$data = array(
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'gender' => $this->input->post('gender'),
			'status' => 0
		);
		$result = $this->m_pegawai->update('pegawai',$data,$id);
		if ($result) {
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Berhasil update data</strong></div>");
			redirect('auth/calon_pegawai');
		}

	}

	public function hapus_calon_pegawai($id='')
	{
		$result = $this->m_pegawai->hapus_pegawai('pegawai',$id);
		if ($result) {
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Berhasil hapus data</strong></div>");
			redirect('auth/calon_pegawai');
		}
	}


}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */