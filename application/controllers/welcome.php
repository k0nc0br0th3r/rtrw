<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('supermodel');
		if($this->session->userdata('user_id')!='') {
			redirect('dashboard');
		}
	}

	function index()
	{
		$data['konten'] = "public/beranda";
		$this->load->view('template', $data);
		$this->load->view('footer/foot_beranda');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */