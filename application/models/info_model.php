<?php
/**
 * Pengumuman model
 */
class Info_model extends CI_Model 
{
	var $table = 'pengumuman';
	var $table_id = 'pengumuman_id';
	
	var $user_id = 'user_id';
	var $judul = 'judul';
	var $status = 'status';
	
	/**
	 * Get data dinamis
	 */
	public function get_data_advance($id = '', $judul = '', $status = '', $user_id = '', $order = '', $limit = '', $offset = '')
	{
		$sql = $this->db;

		$sql->select('*');
		$sql->from($this->table);

		if($id != '')
		{
			$sql->where($this->table_id, $id);
		}

		if($judul != '')
		{
			$sql->like($this->judul, $judul);
		}

		if($status != '')
		{
			$sql->where($this->status, $status);
		}
		
		if($user_id != '')
		{
			$sql->where($this->user_id, $user_id);
		}
		
		if($order != '')
		{
			$sql->order_by($order);
		}

		if($limit != '')
		{
			$sql->limit($limit, $offset);
		}

		$get = $sql->get();
		return $get;
	}
	
	/**
	 * Save data
	 */
	public function save($data)
	{
		return $this->db->insert($this->table, $data);
	}
	
	/**
	 * Update data
	 */
	public function update($data, $id)
	{
		$this->db->where($this->table_id, $id);
		return $this->db->update($this->table, $data);
	}
	
	/**
	 * Delete data
	 */
	public function delete($id)
	{
		$this->db->where($this->table_id, $id);
		return $this->db->delete($this->table);
	}
	
}
?>