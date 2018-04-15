<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Absen extends CI_Model {

	public function getabsen($table, $id)
	{
		$this->db->where('id_pegawai', $id);
		return $this->db->get($table)->result();
	}

	public function cek_data($table, $id, $date)
	{
		$this->db->where('id_pegawai', $id);
		$this->db->where('tanggal', $date);
		return $this->db->get($table)->row_array();
	}

	public function simpan($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	public function update($table, $data, $id, $date)
	{
		$this->db->where('id_pegawai', $id);
		$this->db->where('tanggal', $date);
		return $this->db->update($table, $data);
	}

}

/* End of file M_Absen.php */
/* Location: ./application/models/M_Absen.php */