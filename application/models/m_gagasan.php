<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
* Author Imam Teguh
*/
class M_gagasan extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function getData($tbl, $field='', $order='', $dasc='DESC', $limit='', $offset='')
	{
		$this->db->select('*');
		$this->db->from($tbl.' g');
		$this->db->join('user j', 'g.user_id=j.user_id');
		$this->db->join('jabatan k', 'j.jabatan=k.jabatan_id');


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

	function getDataReply($field='', $order='', $dasc='DESC', $limit='', $offset='')
	{
		$this->db->select('g.gagasan_id as id, g.pesan as balasan, g.tgl_entri as tgl_bls, g.user_id as user_bls, g.read as read_bls, j.nama_lgkp, k.*');
		$this->db->from('r_gagasan g');
		$this->db->join('gagasan k', 'g.gagasan_id=k.gagasan_id');
		$this->db->join('user j', 'k.user_id=j.user_id');


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