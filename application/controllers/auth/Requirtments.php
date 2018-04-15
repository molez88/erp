<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Requirtments extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('requirtment');
		$this->load->model('master_data');
		$this->load->model('m_pegawai');

		if ($this->session->userdata('logged_in') == FALSE ) {
			echo "<script language=javascript>alert('Maaf. Anda tidak memiliki akses.');</script>";
			redirect('auth/login','refresh');
		}
	}

	public function index()
	{
		$data = array(
			'title' => 'Daftar Requirtmen Pegawai',
			'reqs' => $this->requirtment->semua_data('requirtment')
		);

		$tmp['konten'] = $this->load->view('auth/requirtment/index',$data, TRUE);
		$this->load->view('auth/layout',$tmp);
	}

	public function tambah_requirtment()
	{
		$status = 0;

		$data = array(
			'title' => 'Form Tambah Requirtment Pegawai',
			'loks' => $this->master_data->semua_data('lokasi'),
			'jobs' => $this->master_data->semua_data('job_title'),
			'pegawais' => $this->m_pegawai->get_pegawai('pegawai',$status)
		);

		$tmp['konten'] = $this->load->view('auth/requirtment/tambah_requirtment',$data, TRUE);
		$this->load->view('auth/layout',$tmp);
	}

	public function save()
	{

		$peg = $this->input->post('id_pegawai');

		$data = array(
			'vacancy' => $this->input->post('vacancy'),
			'id_job' => $this->input->post('id_job'),
			'id_lokasi' => $this->input->post('id_lokasi'),
			'id_pegawai' => $peg
		);

		$data_pegawai = array('status' => 1 );

		$this->m_pegawai->update('pegawai',$data_pegawai, $peg);

		$this->requirtment->simpan('requirtment',$data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Berhasil memasukkan data</strong></div>");
			redirect('auth/requirtments');
		
	}

	public function edit_requirtment($id='')
	{
		$status = 0;
		$data = array(
			'title' => 'Form Edit Requirtment Pegawai',
			'req' => $this->requirtment->requirtment_by_id('requirtment',$id),
			'loks' => $this->master_data->semua_data('lokasi'),
			'jobs' => $this->master_data->semua_data('job_title'),
			'pegawais' => $this->m_pegawai->get_pegawai('pegawai',$status)
		);

		$tmp['konten'] = $this->load->view('auth/requirtment/edit_requirtment',$data, TRUE);
		$this->load->view('auth/layout',$tmp);
	}

	public function update()
	{
		$id = $this->input->post('id');
		$data = array(
			'vacancy' => $this->input->post('vacancy'),
			'id_pegawai' => $this->input->post('id_pegawai'),
			'id_lokasi' => $this->input->post('id_lokasi'),
			'id_job' => $this->input->post('id_job'),
		);

		$result = $this->requirtment->update('requirtment',$data,$id);
		if ($result) {
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Berhasil update data</strong></div>");
			redirect('auth/requirtments');
		}
	}

	public function hapus_requirtment($id='')
	{
		$result = $this->requirtment->hapus('requirtment',$id);
		if ($result) {
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Berhasil hapus data</strong></div>");
			redirect('auth/requirtments');
		}
	}
	

}

/* End of file Requirtment.php */
/* Location: ./application/controllers/Requirtment.php */