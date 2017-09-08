<?php
/**
 * Rubrik model
 *
 * @author Hikmahtiar <hikmahtiar.cool@gmail.com>
 */
class Rubrik_model extends CI_Model 
{
	var $table = 'rubrik';
	var $table_id = 'rubrik_id';
	
	var $nama = 'nama';
    var $user_id = 'user_id';
    var $status = 'status';
    var $reply = 'reply';
	var $tgl_kirim = 'tgl_kirim';
	
	/**
	 * Get data dinamis
	 */
	public function get_data_advance($where = '', $order = '', $limit = '', $offset = '')
	{
		$sql = $this->db;

		$sql->select('*');
		$sql->from($this->table);

		if($where != '')
		{
			$sql->where($where);
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