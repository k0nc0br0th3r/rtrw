<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('user_id')=="") {
			redirect('welcome');
		}
	}

	function add()
	{
		$this->load->model('supermodel');

		// begin simpan
		$this->form_validation->set_rules('nik','nik','required');
		$this->form_validation->set_rules('nama_lgkp','nama lengkap','required');
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('password','password','required');
		if($this->form_validation->run()===TRUE) {
			$is['nik'] = $this->input->post('nik');
			$is['nama_lgkp'] = $this->input->post('nama_lgkp');
			$is['username'] = $this->input->post('username');
			$is['password'] = md5($this->input->post('password'));
			$is['telp'] = $this->input->post('telp');
			$is['email'] = $this->input->post('email');
			$is['level'] = $this->input->post('level');
			$is['jabatan'] = $this->input->post('jabatan');

			$this->supermodel->insertData('user', $is);

			$pesan = "<div class='alert alert-success fade in'>";
				$pesan .= "<button type='button' class='close' data-dismiss='alert'></button>";
				$pesan .= "<h4 class='alert-heading'>Success!</h4>";
				$pesan .= "<p>Penambahan user berhasil, data tersimpan.</p>"; // body pesan
				$pesan .= "</div>";
				$this->session->set_flashdata('pesan', $pesan);
			redirect('member/add');
		}

		$data['level'] = array('Desa/Kelurahan','RW','RT');
		$data['jb'] = $this->supermodel->getData('jabatan');
		// $data['konten'] = "member/add";
		$this->load->view('member/add', $data);
	}

	function edit($id)
	{
		$this->load->model('supermodel');

		// begin simpan
		$this->form_validation->set_rules('nik','nik','required');
		$this->form_validation->set_rules('nama_lgkp','nama lengkap','required');
		$this->form_validation->set_rules('username','username','required');
		if($this->form_validation->run()===TRUE) {
			$is['nik'] = $this->input->post('nik');
			$is['nama_lgkp'] = $this->input->post('nama_lgkp');
			$is['username'] = $this->input->post('username');
			if($this->input->post('password')) {
				$is['password'] = md5($this->input->post('password'));
			}
			$is['telp'] = $this->input->post('telp');
			$is['email'] = $this->input->post('email');
			$is['level'] = $this->input->post('level');
			$is['jabatan'] = $this->input->post('jabatan');

			$this->supermodel->updateData('user', $is, 'user_id', $id);

			$pesan = "<div class='alert alert-success fade in'>";
				$pesan .= "<button type='button' class='close' data-dismiss='alert'></button>";
				$pesan .= "<h4 class='alert-heading'>Success!</h4>";
				$pesan .= "<p>Perubahan user berhasil, data tersimpan.</p>"; // body pesan
				$pesan .= "</div>";
				$this->session->set_flashdata('pesan', $pesan);
			redirect('member/edit/'.$id);
		}

		$data['level'] = array('Desa/Kelurahan','RW','RT');
		$data['jb'] = $this->supermodel->getData('jabatan');
		$data['rowdat'] = $this->supermodel->getData('user', array('user_id'=>$id))->row();
		// $data['konten'] = "member/edit";
		$this->load->view('member/edit', $data);
	}

	function hapus($id)
	{
		$this->load->model('supermodel');

		$del = $this->supermodel->deleteData('user','user_id', $id);
		if($del) {
			$pesan = "<div class='alert alert-success fade in'>";
				$pesan .= "<button type='button' class='close' data-dismiss='alert'></button>";
				$pesan .= "<h4 class='alert-heading'>Success!</h4>";
				$pesan .= "<p>Hapus user berhasil.</p>"; // body pesan
				$pesan .= "</div>";
				$this->session->set_flashdata('pesan', $pesan);
			redirect('page/member');
		}
		else {
			$pesan = "<div class='alert alert-danger fade in'>";
				$pesan .= "<button type='button' class='close' data-dismiss='alert'></button>";
				$pesan .= "<h4 class='alert-heading'>Error!</h4>";
				$pesan .= "<p>Hapus user gagal.</p>"; // body pesan
				$pesan .= "</div>";
				$this->session->set_flashdata('pesan', $pesan);
			redirect('page/member');
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */