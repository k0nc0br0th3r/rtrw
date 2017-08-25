<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
* Author Imam Teguh
*/
class M_user extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function getData($field='', $order='', $dasc='DESC', $limit='', $offset='')
	{
		$this->db->select('*');
		$this->db->from('user u');
		$this->db->join('jabatan j', 'u.jabatan=j.jabatan_id');

		if(!empty($field)) {
			$this->db->where($field);
		}
		
		if(!empty($order)):
			$this->db->order_by($order, $dasc);
		endif;
		
		if(!empty($limit)):
			$this->db->limit($limit,$offset);
		endif;
		
		$get = $this->db->get();
		
		return $get;
	}

}

?>