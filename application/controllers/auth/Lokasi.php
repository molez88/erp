<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lokasi extends CI_Controller {

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
			'title' => 'Lokasi',
			'status' => 'baru',
			'id_lokasi' => '',
			'lokasi' => '',
			'loks' => $this->master_data->semua_data('lokasi')
		);
		$tmp['konten'] = $this->load->view('auth/lokasi/index', $data, TRUE);
		$this->load->view('auth/layout', $tmp);
	}

	public function edit_lokasi($id = '')
	{
		$tampung = $this->master_data->lokasi_by_id('lokasi',$id);
		$data = array(
			'title' => "Job Title",
			'status' => 'lama',
			'lokasi' => $tampung[0]['lokasi'],
			'id_lokasi' => $tampung[0]['id_lokasi'],
			'loks' => $this->master_data->semua_data('lokasi')
		);
		$tmp['konten'] = $this->load->view('auth/lokasi/index', $data, TRUE);
		$this->load->view('auth/layout',$tmp);
	}


	public function save()
	{
		if ($_POST) {
			$status = $this->input->post('status');
			if ($status == 'baru') {
				$data['lokasi'] = $this->input->post('lokasi');
				$result = $this->master_data->simpan('lokasi',$data);
				if ($result == 1) {
					$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Berhasil Tambah Data</strong></div>");
					header('location:'.base_url().'auth/lokasi');
				}
			}else{
				$id = $this->input->post('id_lokasi');
				$data = array('lokasi' => $this->input->post('lokasi'));
				$result = $this->master_data->updatelokasi('lokasi', $data, $id);
				if ($result) {
					$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Berhasil Update Data</strong></div>");
					header('location:'.base_url().'auth/lokasi');
				}
			}
		}
	}

	public function hapus_lokasi($id = '')
	{
		$this->master_data->deletelokasi('lokasi',$id);
		
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Berhasil Hapus Data</strong></div>");
		header('location:'.base_url().'auth/lokasi');
		
	}

}

/* End of file Lokasi.php */
/* Location: ./application/controllers/Lokasi.php */