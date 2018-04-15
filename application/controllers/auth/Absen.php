<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Absen extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_absen');

		date_default_timezone_set('Asia/Kolkata');
	}

	public function index()
	{

		$data = array(
			'title' => 'Absensi pegawai',
			'abs' => $this->m_absen->get_count_absen()
		);

		$tmp['konten'] = $this->load->view('auth/absen/index',$data, TRUE);
		$this->load->view('auth/layout',$tmp);
	}

	public function detail($id='')
	{
		$data = array(
			'title' => 'Laporan Absensi',
			'details' => $this->m_absen->get_detail($id),
			'nama' => $this->m_absen->get_name($id)
		);

		$tmp['konten'] = $this->load->view('auth/absen/view',$data, TRUE);
		$this->load->view('auth/layout',$tmp);
	}

}

/* End of file Absen.php */
/* Location: ./application/controllers/Absen.php */