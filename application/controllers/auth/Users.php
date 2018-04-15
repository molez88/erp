<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
	}

	public function index()
	{
		$data = array(
			'title' => 'Semua User',
			'users' => $this->m_user->get_users('users')
		);

		$tmp['konten'] = $this->load->view('auth/users/index',$data, TRUE);
		$this->load->view('auth/layout',$tmp);
	}

	public function tambah_user()
	{
		$data = array(
			'title' => 'Form Tambah User'
		);

		$tmp['konten'] = $this->load->view('auth/users/tambah_user',$data, TRUE);
		$this->load->view('auth/layout',$tmp);
	}

	public function save()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
			'level' => $this->input->post('level'), 
		);

		$result = $this->m_user->simpan('users',$data);
		if ($result) {
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Berhasil memasukkan data</strong></div>");
				redirect('auth/users');
		}
	}

	public function edit_user($id='')
	{
		$data = array(
			'title' => 'Form Edit User',
			'user' => $this->m_user->user_by_id('users',$id)
		);

		$tmp['konten'] = $this->load->view('auth/users/edit_user',$data, TRUE);
		$this->load->view('auth/layout',$tmp);
	}
	public function update()
	{
		$id = $this->input->post('id');
		$data = array(
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
			'level' => $this->input->post('level'), 
		);

		$result = $this->m_user->update('users',$data, $id);
		if ($result) {
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Berhasil update data</strong></div>");
				redirect('auth/users');
		}
	}

	public function hapus_user($id='')
	{
		$this->m_user->delete('users',$id);
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Berhasil hapus data</strong></div>");
		redirect('auth/users');
	}

}
