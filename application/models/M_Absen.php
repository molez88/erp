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


	public function get_count_absen()
	{
		return $this->db->query("SELECT pegawai.id_pegawai, pegawai.nama, pegawai.email, COUNT(absen.tanggal)AS jumlah 
						FROM pegawai
						LEFT JOIN absen
						ON pegawai.id_pegawai = absen.id_pegawai
						WHERE pegawai.status=1
						GROUP BY (absen.id_pegawai)"
					)->result();
	}

	public function get_detail($id)
	{
		$this->db->select('absen.tanggal, absen.jam_masuk, absen.jam_keluar, absen.note');
		$this->db->from('absen');
		$this->db->join('pegawai', 'pegawai.id_pegawai = absen.id_pegawai', 'left');
		$this->db->where('absen.id_pegawai', $id);
		return $this->db->get()->result_array();
	}

	public function get_name($id)
	{
		$this->db->where('id_pegawai', $id);
		return $this->db->get('pegawai')->row_array();
	}

}

/* End of file M_Absen.php */
/* Location: ./application/models/M_Absen.php */