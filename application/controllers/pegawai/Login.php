<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
	}

	public function index()
	{
		$this->load->view('pegawai/login');
	}

	public function checking()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$cek = $this->m_login->cek_login('pegawai',$email, $password);

		if ($cek->num_rows() == 1) {
			foreach($cek->result() as $data){
				$user_data = array(
					'email' => $data->email,
					'nama' => $data->nama,
					'id_pegawai' => $data->id_pegawai,
					'logged_in' => TRUE
				);
				$this->session->set_userdata($user_data);
			}
			redirect('pegawai/dashboard');
		}else{
			$this->session->set_flashdata('gagal_login', 'Kombinasi Email dan Password salah');
			redirect('pegawai/login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();

		redirect('pegawai/login',TRUE);
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */