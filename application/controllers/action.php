<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Action extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function login()
	{
		$this->load->model('supermodel');
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('password','password','required');
		if ($this->form_validation->run()===TRUE) {
			# code...
			$u = $this->input->post('username');
			$p = md5($this->input->post('password'));
			$lg = $this->supermodel->getData('user',array('username'=>$u,'password'=>$p));
			if($lg->num_rows()==1) {
				$row = $lg->row_array();
				$this->session->set_userdata($row);
				redirect('dashboard');
			} else {
				$pesan = "<div class='alert alert-block alert-danger fade in'>";
				$pesan .= "<button type='button' class='close' data-dismiss='alert'></button>";
				$pesan .= "<h4 class='alert-heading'>Error!</h4>";
				$pesan .= "<p>Maaf kombinasi username dan password tidak terdaftar.</p>"; // body pesan
				$pesan .= "</div>";
				$this->session->set_flashdata('pesan', $pesan);
				redirect('page/login');
			}
		} else {
			$pesan = "<div class='alert alert-block alert-danger fade in'>";
				$pesan .= "<button type='button' class='close' data-dismiss='alert'></button>";
				$pesan .= "<h4 class='alert-heading'>Error!</h4>";
				$pesan .= "<p>Username dan password harus diisi.</p>"; // body pesan
				$pesan .= "</div>";
				$this->session->set_flashdata('pesan', $pesan);
			redirect('page/login');
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('welcome');
	}

	function statis($id)
	{
		$this->load->model('supermodel');

		// begin simpan
		$this->form_validation->set_rules('judul','judul','required');
		$this->form_validation->set_rules('deskripsi','deskripsi','required');
		if($this->form_validation->run()===TRUE) {
			$is['judul'] = $this->input->post('judul');
			$is['deskripsi'] = $this->input->post('des');
			$is['tgl_entri'] = date('Y-m-d H:i:s');
			if(!empty($_FILES['upload']['name'])) {
				if($this->input->post('foto')!="") {
					@unlink('./uploads/statis/'.$this->input->post('foto'));
				}
				$ext = end(explode(".", $_FILES['upload']['name']));
				$rand = rand(00000000,99999999);
				$name = $rand.'.'.$ext;
				$upl = $this->supermodel->unggah_gambar('statis/','upload',$name);
				if($upl===FALSE) {
					$pesan = "<div class='alert alert-danger fade in'>";
					$pesan .= "<button type='button' class='close' data-dismiss='alert'></button>";
					$pesan .= "<h4 class='alert-heading'>Error!</h4>";
					$pesan .= "<p>Upload foto gagal.</p>"; // body pesan
					$pesan .= "</div>";
					$this->session->set_flashdata('pesan', $pesan);
					redirect('page/statis/'.$id);
				}
				$is['foto'] = $name;
			}
			
			$this->supermodel->updateData('statis', $is, 'statis_id', $id);

			$pesan = "<div class='alert alert-success fade in'>";
			$pesan .= "<button type='button' class='close' data-dismiss='alert'></button>";
			$pesan .= "<h4 class='alert-heading'>Success!</h4>";
			$pesan .= "<p>Perubahan ".$this->input->post('judul')." berhasil, data tersimpan.</p>"; // body pesan
			$pesan .= "</div>";
			$this->session->set_flashdata('pesan', $pesan);
			
			redirect('page/statis/'.$id);
		} else {
			redirect('dashboard');
		}
	}

	function statis_gambar($id)
	{
		$this->load->model('supermodel');
		$get = $this->supermodel->getData('statis', array('statis_id'=>$id))->row();
		if($get->foto!="") {
			@unlink('./uploads/statis/'.$get->foto);
			$up['foto'] = '';
			$this->supermodel->updateData('statis', $up, 'statis_id', $id);
			redirect('page/statis/'.$id);
		}
		return false;
	}

	function new_page()
	{
		$this->load->model('supermodel');

		// begin simpan
		$this->form_validation->set_rules('judul','judul','required');
		$this->form_validation->set_rules('des','deskripsi','required');
		if($this->form_validation->run()===TRUE) {
			$is['judul'] = $this->input->post('judul');
			$is['deskripsi'] = $this->input->post('des');
			$is['tgl_entri'] = date('Y-m-d H:i:s');
			if(!empty($_FILES['upload']['name'])) {
				if($this->input->post('foto')!="") {
					@unlink('./uploads/statis/'.$this->input->post('foto'));
				}
				$ext = end(explode(".", $_FILES['upload']['name']));
				$rand = rand(00000000,99999999);
				$name = $rand.'.'.$ext;
				$upl = $this->supermodel->unggah_gambar('statis/','upload',$name);
				if($upl===FALSE) {
					$pesan = "<div class='alert alert-danger fade in'>";
					$pesan .= "<button type='button' class='close' data-dismiss='alert'></button>";
					$pesan .= "<h4 class='alert-heading'>Error!</h4>";
					$pesan .= "<p>Upload foto gagal.</p>"; // body pesan
					$pesan .= "</div>";
					$this->session->set_flashdata('pesan', $pesan);
					redirect('page/statis/'.$id);
				}
				$is['foto'] = $name;
			}
			
			$this->supermodel->insertData('statis', $is);

			$pesan = "<div class='alert alert-success fade in'>";
			$pesan .= "<button type='button' class='close' data-dismiss='alert'></button>";
			$pesan .= "<h4 class='alert-heading'>Success!</h4>";
			$pesan .= "<p>Halaman ".$this->input->post('judul')." berhasil tersimpan.</p>"; // body pesan
			$pesan .= "</div>";
			$this->session->set_flashdata('pesan', $pesan);
			
			redirect('dashboard');
		} else {
			// $data['konten'] = "page/new_page";
			$this->load->view('page/new_page');
		}
	}

	function hapus_statis($id)
	{
		$this->load->model('supermodel');
		$cek = $this->supermodel->getData('statis', array('statis_id'=>$id))->row();
		$judul = $cek->judul;
			if($cek->foto!='') {
				@unlink('./uploads/statis/'.$cek->foto);
			}
		$del = $this->supermodel->deleteData('statis','statis_id', $id);
		if($del) {
			$pesan = "<div class='alert alert-success fade in'>";
				$pesan .= "<button type='button' class='close' data-dismiss='alert'></button>";
				$pesan .= "<h4 class='alert-heading'>Success!</h4>";
				$pesan .= "<p>Hapus halaman $judul berhasil.</p>"; // body pesan
				$pesan .= "</div>";
				$this->session->set_flashdata('pesan', $pesan);
		}
		else {
			$pesan = "<div class='alert alert-danger fade in'>";
				$pesan .= "<button type='button' class='close' data-dismiss='alert'></button>";
				$pesan .= "<h4 class='alert-heading'>Error!</h4>";
				$pesan .= "<p>Hapus halaman $judul gagal.</p>"; // body pesan
				$pesan .= "</div>";
				$this->session->set_flashdata('pesan', $pesan);
			
		}
		redirect('dashboard');
	}

	
}

/* End of file action.php */
/* Location: ./application/controllers/action.php */