<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Statis extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_content');
	}

	function page()
	{
		$id = $this->input->get('id');
		if ($id) {
			# code...
			$select = 's.*, u.nama_lgkp';
			$data['row'] = $this->m_content->getDataStatis($select, array('statis_id'=>$id))->row_array();
			$data['konten'] = "statis/page";
			$this->load->view('template', $data);
			$this->load->view('footer/foot_beranda');
		} else {
			redirect('welcome');
		}
		
	}
}

/* End of file statis.php */
/* Location: ./application/controllers/statis.php */