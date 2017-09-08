<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Page Controller
 *
 */

class Page extends CI_Controller {

	/**
	 * Contructor Code
	 */
	function __construct()
	{
		parent::__construct();

		// load model
		$this->load->model('news_model');
		$this->load->model('info_model');
		$this->load->model('rubrik_model');
	}

	// BEGIN PAGE LOGIN
	function login()
	{
		if($this->session->userdata('user_id')=="") {
			$data['konten'] = "page/login";
			$this->load->view('template', $data);
			$this->load->view('footer/foot_login');
		} else {
			redirect('dashboard');
		}		
	}
	// END PAGE LOGIN

	// BEGIN PAGE PROFILE
	function profile()
	{
		if($this->session->userdata('user_id')!="") {
			$this->load->model('supermodel');
			$getuser = $this->supermodel->getData('user',array('user_id'=>$this->session->userdata('user_id')));
			$data['row'] = $getuser->row_array();

			$getjabatan = $this->supermodel->getData('jabatan', array('jabatan_id'=>$data['row']['jabatan']))->row();
			$data['jabatan'] = $getjabatan->nm_jabatan;
			// $data['konten'] = "page/profile";
			$this->load->view('page/profile', $data);
		} else {
			redirect('welcome');
		}		
	}
	// END PAGE PROFILE

	// BEGIN PAGE MEMBER
	function member()
	{
		if($this->session->userdata('user_id')!="") {
			$this->load->model('m_user');
			$data['listdata'] = $this->m_user->getData(null,'user_id','desc');
			// $data['konten'] = "page/member";
			$this->load->view('page/member', $data);
		} else {
			redirect('welcome');
		}		
	}
	// END PAGE MEMBER

	// BEGIN PAGE BERITA
	function posting($kode = 0)
	{
		if($this->session->userdata('user_id')!="") {
			$this->load->model('supermodel');
			$user = $this->session->userdata('user_id');
			$data['listdata'] = $this->supermodel->getData('berita', array('kategori'=>$kode,'user_id'=>$user),'tgl_entri');
			$data['ktg'] = array('berita','pengumuman');
			$data['tp'] = array('Broadcast','Private');
			$data['st'] = array('Aktif', 'Non Aktif');
			// $data['konten'] = "page/posting";
			$this->load->view('page/posting', $data);
		} else {
			redirect('welcome');
		}		
	}
	// END PAGE BERITA

	// BEGIN PAGE STATIS
	function statis($kode = 0)
	{
		if($this->session->userdata('user_id')!="" && $this->session->userdata('level')==0) {
			$this->load->model('supermodel');
			$data['rowdat'] = $this->supermodel->getData('statis', array('statis_id'=>$kode))->row();
			// $data['konten'] = "page/statis";
			$this->load->view('page/statis', $data);
		} else {
			redirect('welcome');
		}		
	}
	// END PAGE STATIS

	function gagasan()
	{
		if($this->session->userdata('user_id')!="") {
			$this->load->model('m_gagasan');
			$data['listdata'] = $this->m_gagasan->getData('gagasan', array('g.user_id'=>$this->session->userdata('user_id')),'g.gagasan_id','desc');
			if($this->session->userdata('level')==0) {
				$data['listdata'] = $this->m_gagasan->getData('gagasan', null,'g.gagasan_id','desc');
			}
			// $data['konten'] = "page/gagasan";
			$data['st'] = array('belum dibaca','dibaca');
			$data['rp'] = array('belum dibalas', 'dibalas');
			$this->load->view('page/gagasan', $data);
		} else {
			redirect('welcome');
		}
	}

	function rubrik()
	{
		if($this->session->userdata('user_id')!="") {
			$this->load->model('supermodel');
			$data['listdata'] = $this->supermodel->getData('rubrik','','rubrik_id','desc');
			// $data['konten'] = "page/rubrik";
			$data['st'] = array('Non Aktif', 'Aktif');
			$data['rp'] = array('Tidak', 'Ya');
			$this->load->view('page/rubrik', $data);
		} else {
			redirect('welcome');
		}
	}
	
	/**
	 * Frontend List Rubrik Page
	 *
	 * @author Hikmahtiar <hikmahtiar.cool@gmail.com>
	 * @return HTML
	 */
	public function rubrik_warga()
	{	
		// data
		$order = 'tgl_kirim DESC';
		$where = [
			'status' => 1,
			'reply'  => 1
		];
		$data_rubrik = $this->rubrik_model->get_data_advance($where, $order)->result();


		// view
		$data['data_rubrik'] = $data_rubrik;
		$data['konten'] = 'frontend/rubrik/list';
		$this->load->view('template', $data);
		$this->load->view('footer/foot_beranda');
	}

	/**
	 * Frontend Rubrik Page
	 *
	 * @author Hikmahtiar <hikmahtiar.cool@gmail.com>
	 * @return HTML
	 */
	public function kirim_rubrik_warga()
	{	
		$data['konten'] = 'frontend/rubrik/index';
		$this->load->view('template', $data);
		$this->load->view('footer/foot_beranda');
	}
	
	/**
	 * Frontend Rubrik Save
	 *
	 * @author Hikmahtiar <hikmahtiar.cool@gmail.com>
	 */
	public function rubrik_save()
	{
		// post & data
		$name = $this->input->post('name');
		$no_telp = $this->input->post('no_telp');
		$pesan = $this->input->post('pesan');
		$captcha = $this->input->post('captcha');
		$session_captcha = $this->session->userdata('captcha');
		
		$data_save = [
			'nama'      => $name,
			'telp'      => $no_telp,
			'komentar'  => $pesan,
			'status'    => 0,
			'reply'     => 0,
			'tgl_kirim' => date('Y-m-d H:i:s'),
		];
		
		// cek captcha terlebih dahulu
		if($session_captcha == $captcha)
		{
			// save data
			$save = $this->rubrik_model->save($data_save);
			$response = [
				'message' => 'Pesan Anda gagal dikirim',
				'status'  => 'error'
			];
			
			if($save)
			{
				$response = [
					'message' => 'Pesan Anda berhasil dikirim',
					'status'  => 'success'
				];
			}
		}
		else
		{
			$response = [
				'message' => 'Kode Captcha masih salah, silahkan coba lagi',
				'status'  => 'error'
			];
		}
		
		output_json($response);
	}

	/**
	 * Berita Page
	 *
	 * @author HIkmahtiar <hikmahtiar.cool@gmail.com>
	 * @return HTML
	 */
	public function news($id = '')
	{
		// cek id dari URL
		if($id == '')
		{
			// data
			$order = 'tgl_entri DESC';
			$get_data = $this->news_model->get_data_advance('', '', 1, '', $order, 6, 0)->result();
			$konten = 'frontend/page/index';

		}
		else
		{
			$get_data = $this->news_model->get_data_advance($id)->row();
			$konten = 'frontend/page/detail';
		}
		
		// data template
		$data['get_data'] = $get_data;
		$data['konten'] = $konten;
		$this->load->view('template', $data);
		$this->load->view('footer/foot_beranda');
	}

	/**
	 * Berita Page
	 *
	 * @author HIkmahtiar <hikmahtiar.cool@gmail.com>
	 * @return HTML
	 */
	public function info($id = '')
	{
		// cek id dari URL
		if($id == '')
		{
			// data
			$order = 'tgl_entri DESC';
			$get_data = $this->info_model->get_data_advance('', '', 1, '', $order, 6, 0)->result();
			$konten = 'frontend/info/index';

		}
		else
		{
			$get_data = $this->info_model->get_data_advance($id)->row();
			$konten = 'frontend/info/detail';
		}
		
		// view
		$data['get_data'] = $get_data;
		$data['konten'] = $konten;
		$this->load->view('template', $data);
		$this->load->view('footer/foot_beranda');

	}

	/**
	 * Help Page
	 *
	 * @author HIkmahtiar <hikmahtiar.cool@gmail.com>
	 * @return HTML
	 */
	public function help()
	{
		$data['konten'] = 'frontend/help/index';

		$this->load->view('template', $data);
		$this->load->view('footer/foot_beranda');
	}

}

/* End of file page.php */
/* Location: ./application/controllers/page.php */