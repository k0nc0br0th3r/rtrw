<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Welcome Controller
 * 
 * @author Hikmahtiar <hikmahtiar.cool@gmail.com>
 * @author Imam Teguh
 */
class Welcome extends CI_Controller 
{
	/**
	 * Contructor Codeigniter
	 */
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('user_id')!='') {
			redirect('dashboard');
		}
		
		// load model
		$this->load->model('supermodel');
		$this->load->model('info_model');
		$this->load->model('news_model');
        $this->load->model('statis_model');
	}

	/**
	 * Index Page
	 * 
	 * @return HTML
	 */
	public function index()
	{
		// data
		$order = 'tgl_entri DESC';
		$judul_statis = 'Sekilas Desa';
		$get_data_news = $this->news_model->get_data_advance('', '', 1, '', $order, 2, 0)->result(); 
		$get_data_info = $this->info_model->get_data_advance('', '', 1, '', $order, 4, 0)->result(); 
		$get_data_statis = $this->statis_model->get_data_advance('', $judul_statis, '', $order)->row(); 
		
		
		// view
		$data['konten'] = "frontend/beranda";
		$data['data_news'] = $get_data_news;
		$data['data_info'] = $get_data_info;
		$data['data_statis'] = $get_data_statis;
		
		$this->load->view('template', $data);
		$this->load->view('footer/foot_beranda');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */