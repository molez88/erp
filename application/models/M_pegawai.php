<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pegawai extends CI_Model {

	public function get_pegawai($table, $status)
	{
		$this->db->where('status', $status);
		return $this->db->get($table)->result();
	}

	public function simpan($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	public function pegawai_by_id($table,$id)
	{
		return $this->db->get_where($table, array('id_pegawai' => $id))->row_array();
	}

	public function update($table,$data,$id)
	{
		$this->db->where('id_pegawai', $id);
		return $this->db->update($table, $data);
	}

	public function hapus_pegawai($table,$id)
	{
		$this->db->where('id_pegawai', $id);
		return $this->db->delete($table);
	}

}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */