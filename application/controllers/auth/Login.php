<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
	}

	public function index()
	{
		$this->load->view('auth/login');
	}

	public function checking()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$cek = $this->m_login->cek_login('users',$email, $password);

		if ($cek->num_rows() == 1) {
			foreach($cek->result() as $data){
				$user_data = array(
					'email' => $data->email,
					'nama' => $data->nama,
					'level' => $data->level,
					'logged_in' => TRUE
				);
				$this->session->set_userdata($user_data);
			}
			redirect('auth/dashboard');
		}else{
			$this->session->set_flashdata('gagal_login', 'Kombinasi Email dan Password salah');
			redirect('auth/login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();

		redirect('auth/login',TRUE);
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */