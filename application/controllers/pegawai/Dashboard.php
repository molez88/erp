<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in') == FALSE) {
			redirect('pegawai/login','refresh');
		}
	}

	public function index()
	{
		$data = array(
			'title' => 'Dashboard'
		);

		$tmp['konten'] = $this->load->view('pegawai/dashboard',$data, TRUE);
		$this->load->view('pegawai/layout',$tmp);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */