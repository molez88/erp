<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in') == FALSE) {
			redirect('auth/login','refresh');
		}
	}


	public function index()
	{
		$data = array(
			'title' => 'Dashboard'
		);

		$tmp['konten'] = $this->load->view('auth/dashboard',$data, TRUE);
		$this->load->view('auth/layout',$tmp);
	}

	
}
