<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Requirtment extends CI_Model {

	public function semua_data()
	{
		$this->db->select('requirtment.id, requirtment.vacancy, job_title.*, lokasi.*, pegawai.*');
		$this->db->from('requirtment');
		$this->db->join('pegawai', 'requirtment.id_pegawai = pegawai.id_pegawai', 'left');
		$this->db->join('lokasi', 'requirtment.id_lokasi = lokasi.id_lokasi', 'left');
		$this->db->join('job_title', 'requirtment.id_job = job_title.id_job', 'left');
		return $this->db->get()->result();
	}

	public function simpan($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	public function requirtment_by_id($table, $id)
	{
		return $this->db->get_where($table, array('id' => $id))->row_array();
	}

	public function update($table, $data, $id)
	{
		$this->db->where('id', $id);
		return $this->db->update($table, $data);
	}

	public function hapus($table, $id)
	{
		$this->db->where('id', $id);
		return $this->db->delete($table);
	}

}

/* End of file Requirtment.php */
/* Location: ./application/models/Requirtment.php */