<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pegawai extends CI_Controller {

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
		$status = 1;
		$data = array(
			'title' => 'Semua Pegawai',
			'pegawais' => $this->m_pegawai->get_pegawai('pegawai', $status)
		);

		$tmp['konten'] = $this->load->view('auth/pegawai/view_pegawai',$data, TRUE);
		$this->load->view('auth/layout',$tmp);
	}


	public function edit_pegawai($id='')
	{
		$data = array(
			'title' => 'Form Edit Pegawai',
			'pegawai' => $this->m_pegawai->pegawai_by_id('pegawai',$id), 
		);

		$tmp['konten'] = $this->load->view('auth/pegawai/edit_pegawai',$data, TRUE);
		$this->load->view('auth/layout',$tmp);
	}

	public function update()
	{
		$id = $this->input->post('id');
		$data = array(
			'password' => $this->input->post('password')
		);
		$result = $this->m_pegawai->update('pegawai',$data,$id);
		if ($result) {
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Berhasil update data</strong></div>");
			redirect('auth/pegawai');
		}

	}

	public function hapus_pegawai($id='')
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