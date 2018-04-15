<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_title extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('master_data');

		if ($this->session->userdata('logged_in') == FALSE || $this->session->userdata('level') != 'admin') {
			echo "<script language=javascript>alert('Maaf. Anda tidak memiliki akses.');</script>";
			redirect('auth/login','refresh');
		}
	}

	public function index()
	{
		$data = array(
			'title' => 'Job Title',
			'status' => 'baru',
			'id_job' => '',
			'job' => '',
			'jobs' => $this->master_data->semua_data('job_title')
		);
		$tmp['konten'] = $this->load->view('auth/job_title/index', $data, TRUE);
		$this->load->view('auth/layout', $tmp);
	}

	public function edit_job($id = '')
	{
		$tampung = $this->master_data->job_by_id('job_title',$id);
		$data = array(
			'title' => "Job Title",
			'status' => 'lama',
			'job' => $tampung[0]['job'],
			'id_job' => $tampung[0]['id_job'],
			'jobs' => $this->master_data->semua_data('job_title')
		);
		$tmp['konten'] = $this->load->view('auth/job_title/index', $data, TRUE);
		$this->load->view('auth/layout',$tmp);
	}


	public function save()
	{
		if ($_POST) {
			$status = $this->input->post('status');
			if ($status == 'baru') {
				$data['job'] = $this->input->post('job');
				$result = $this->master_data->simpan('job_title',$data);
				if ($result == 1) {
					$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Berhasil Tambah Data</strong></div>");
					header('location:'.base_url().'auth/job_title');
				}
			}else{
				$id = $this->input->post('id_job');
				$data = array('job' => $this->input->post('job'));
				$result = $this->master_data->updatejob('job_title', $data, $id);
				if ($result) {
					$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Berhasil Update Data</strong></div>");
					header('location:'.base_url().'auth/job_title');
				}
			}
		}
	}

	public function hapus_job($id = '')
	{
		$this->master_data->deletejob('job_title',$id);
		
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Berhasil Hapus Data</strong></div>");
		header('location:'.base_url().'auth/job_title');
		
	}

}

/* End of file Job_title.php */
/* Location: ./application/controllers/Job_title.php */