<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_data extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	function semua_data($table){
		return $this->db->get($table)->result();
	}

	public function simpan($table, $data)
	{
		return $this->db->insert($table, $data);
	}


	// job
	public function job_by_id($table,$id)
	{
		$data = $this->db->get_where($table, array('id_job' => $id));
		return $data->result_array();
	}

	public function updatejob($table,$data,$id)
	{
		$this->db->where('id_job', $id);
		return $this->db->update($table, $data);
	}

	public function deletejob($table,$id)
	{
		$this->db->where('id_job', $id);
		return $this->db->delete($table);
	}

	// lokasi
	public function lokasi_by_id($table,$id)
	{
		$data = $this->db->get_where($table, array('id_lokasi' => $id));
		return $data->result_array();
	}

	public function updatelokasi($table,$data,$id)
	{
		$this->db->where('id_lokasi', $id);
		return $this->db->update($table, $data);
	}

	public function deletelokasi($table,$id)
	{
		$this->db->where('id_lokasi', $id);
		return $this->db->delete($table);
	}

}

/* End of file Master_data.php */
/* Location: ./application/models/Master_data.php */