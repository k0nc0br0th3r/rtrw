<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Statis extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_content');
		$this->load->model('news_model');
	}

	function page()
	{
		$id = $this->input->get('id');
		if ($id) {
			# code...
			$order = 'tgl_entri desc';
			$select = 's.*, u.nama_lgkp';
			$data['berita'] = $this->news_model->get_data_advance('','', 1,'', $order, 6, 0);
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