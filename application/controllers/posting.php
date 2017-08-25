<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posting extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('user_id')=="") {
			redirect('welcome');
		}
	}

	function index($vie = 'list', $kode = 0, $id = null)
	{
		$this->load->model('supermodel');
		$user = $this->session->userdata('user_id');
		
		$data['ktg'] = array('berita','pengumuman');
		$data['tp'] = array('Broadcast','Private');
		$data['st'] = array('Aktif', 'Non Aktif');
		// $data['konten'] = "page/posting";
		if($vie == "add") {
			$this->load->view('posting/add', $data);
		} elseif ($vie == "edit") {
			$data['rowdat'] = $this->supermodel->getData('berita', array('berita_id'=>$id))->row();
			$this->load->view('posting/edit', $data);
		} else {
			$data['listdata'] = $this->supermodel->getData('berita', array('kategori'=>$kode,'user_id'=>$user),'tgl_entri');
			$this->load->view('page/posting', $data);
		}
		
	}

	function add($kode)
	{
		$this->load->model('supermodel');

		// begin simpan
		$this->form_validation->set_rules('judul','judul','required');
		$this->form_validation->set_rules('des','deskripsi','required');
		$this->form_validation->set_rules('tipe','tipe','required');
		$this->form_validation->set_rules('status','status','required');
		if($this->form_validation->run()===TRUE) {
			$is['judul'] = $this->input->post('judul');
			$is['deskripsi'] = $this->input->post('des');
			$is['tipe'] = $this->input->post('tipe');
			$is['status'] = $this->input->post('status');
			$is['tgl_entri'] = date('Y-m-d H:i:s');
			$is['kategori'] = $kode;
			$is['user_id'] = $this->session->userdata('user_id');

			$this->supermodel->insertData('berita', $is);

			$pesan = "<div class='alert alert-success fade in'>";
				$pesan .= "<button type='button' class='close' data-dismiss='alert'></button>";
				$pesan .= "<h4 class='alert-heading'>Success!</h4>";
				$pesan .= "<p>Penambahan posting berhasil, data tersimpan.</p>"; // body pesan
				$pesan .= "</div>";
				$this->session->set_flashdata('pesan', $pesan);
			redirect('posting/index/list/'.$kode);
		} else {
			$pesan = "<div class='alert alert-danger fade in'>";
				$pesan .= "<button type='button' class='close' data-dismiss='alert'></button>";
				$pesan .= "<h4 class='alert-heading'>Error!</h4>";
				$pesan .= "<p>Penambahan posting gagal, data tidak tersimpan.</p>"; // body pesan
				$pesan .= "</div>";
				$this->session->set_flashdata('pesan', $pesan);
			redirect('posting/index/list/'.$kode);
		}
		
	}

	function edit($kode, $id)
	{
		$this->load->model('supermodel');

		// begin simpan
		$this->form_validation->set_rules('judul','judul','required');
		$this->form_validation->set_rules('des','deskripsi','required');
		$this->form_validation->set_rules('tipe','tipe','required');
		$this->form_validation->set_rules('status','status','required');
		if($this->form_validation->run()===TRUE) {
			$is['judul'] = $this->input->post('judul');
			$is['deskripsi'] = $this->input->post('des');
			$is['tipe'] = $this->input->post('tipe');
			$is['status'] = $this->input->post('status');
			$is['user_id'] = $this->session->userdata('user_id');

			$this->supermodel->updateData('berita', $is, 'berita_id', $id);

			$pesan = "<div class='alert alert-success fade in'>";
				$pesan .= "<button type='button' class='close' data-dismiss='alert'></button>";
				$pesan .= "<h4 class='alert-heading'>Success!</h4>";
				$pesan .= "<p>Perubahan posting berhasil, data tersimpan.</p>"; // body pesan
				$pesan .= "</div>";
				$this->session->set_flashdata('pesan', $pesan);
			redirect('posting/index/list/'.$kode);
		} else {
			$pesan = "<div class='alert alert-danger fade in'>";
				$pesan .= "<button type='button' class='close' data-dismiss='alert'></button>";
				$pesan .= "<h4 class='alert-heading'>Error!</h4>";
				$pesan .= "<p>Perubahan posting gagal, data tidak tersimpan.</p>"; // body pesan
				$pesan .= "</div>";
				$this->session->set_flashdata('pesan', $pesan);
			redirect('posting/index/list/'.$kode);
		}
		
	}

	function hapus($kode, $id)
	{
		$this->load->model('supermodel');

		$del = $this->supermodel->deleteData('berita','berita_id', $id);
		if($del) {
			$pesan = "<div class='alert alert-success fade in'>";
				$pesan .= "<button type='button' class='close' data-dismiss='alert'></button>";
				$pesan .= "<h4 class='alert-heading'>Success!</h4>";
				$pesan .= "<p>Hapus posting berhasil.</p>"; // body pesan
				$pesan .= "</div>";
				$this->session->set_flashdata('pesan', $pesan);
			redirect('posting/index/list/'.$kode);
		}
		else {
			$pesan = "<div class='alert alert-danger fade in'>";
				$pesan .= "<button type='button' class='close' data-dismiss='alert'></button>";
				$pesan .= "<h4 class='alert-heading'>Error!</h4>";
				$pesan .= "<p>Hapus posting gagal.</p>"; // body pesan
				$pesan .= "</div>";
				$this->session->set_flashdata('pesan', $pesan);
			redirect('posting/index/list/'.$kode);
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */