<?php
/**
 * Pelayanan model
 *
 * @author Hikmahtiar <hikmahtiar.cool@gmail.com>
 */
class Pelayanan_model extends CI_Model 
{
	var $table = 'pelayanan';
	var $table_id = 'pelayanan_id';
    
    var $jenis_table = 'jenis_pelayanan';
	var $jenis_table_id = 'jenis_pelayanan_id';
	
	/**
	 * Get data dinamis jenis pelayanan
	 */
	public function get_jenis_advance($id = '', $nama = '', $parent = '' ,  $order = '', $limit = '', $offset = '')
	{
		$sql = $this->db;

		$sql->select('*');
		$sql->from($this->jenis_table);

		if($id != '')
		{
			$sql->where($this->jenis_table_id, $id);
		}

		if($nama != '')
		{
			$sql->like('nama_pelayanan', $nama);
		}
		
		if($parent != '')
		{
			$sql->where('parent', $parent);
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
     * Get data dinamis pelayanan
     */
    public function get_data_advance($id = '', $nama = '', $parent = '' ,  $order = '', $limit = '', $offset = '')
	{
		$sql = $this->db;

		$sql->select('*');
		$sql->from($this->jenis_table);

		if($id != '')
		{
			$sql->where($this->jenis_table_id, $id);
		}

		if($nama != '')
		{
			$sql->like('nama_pelayanan', $nama);
		}
		
		if($parent != '')
		{
			$sql->where('parent', $parent);
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