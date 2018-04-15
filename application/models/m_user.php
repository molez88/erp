<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_user extends CI_Model {

	public function get_users($table)
	{
		$this->db->order_by('level', 'asc');
		return $this->db->get($table)->result();
	}

	public function simpan($table, $data)
	{
		return $this->db->insert($table, $data);
	}
	public function user_by_id($table, $id)
	{
		return $this->db->get_where($table, array('id' => $id ))->row_array();
	}

	public function update($table, $data, $id)
	{
		$this->db->where('id', $id);
		return $this->db->update($table, $data);
	}

	public function delete($table, $id)
	{
		$this->db->where('id', $id);
		return $this->db->delete($table);
	}

}

/* End of file m_user.php */
/* Location: ./application/models/m_user.php */