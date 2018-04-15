<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Login extends CI_Model {

	public function cek_login($table,$email, $password)
	{
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		return $this->db->get($table);
	}

}
