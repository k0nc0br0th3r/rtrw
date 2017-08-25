<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rubrik extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('user_id')=="") {
			redirect('welcome');
		}
	}

	function edit($id)
	{
		$this->load->model('supermodel');

		// begin simpan
		$this->form_validation->set_rules('pesan','pesan','required');
		$this->form_validation->set_rules('tanggapan','tanggapan','required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id');
			$is['komentar'] = $this->input->post('pesan');
			$is['status'] = $this->input->post('status');
			$is['tanggapan'] = $this->input->post('tanggapan');
			$is['reply'] = 1;
			$is['tgl_balas'] = date('Y-m-d');
			$is['user_id'] = $this->session->userdata('user_id');

			$this->supermodel->updateData('rubrik', $is, 'rubrik_id', $id);

			$pesan = "<div class='alert alert-success fade in'>";
				$pesan .= "<button type='button' class='close' data-dismiss='alert'></button>";
				$pesan .= "<h4 class='alert-heading'>Success!</h4>";
				$pesan .= "<p>Mengerim jawaban berhasil, data tersimpan.</p>"; // body pesan
				$pesan .= "</div>";
				$this->session->set_flashdata('pesan', $pesan);
			redirect('rubrik/edit/'.$id);
		}

		$data['rowdat'] = $this->supermodel->getData('rubrik', array('rubrik_id'=>$id))->row();
		// $data['konten'] = "rubrik/edit";
		$this->load->view('rubrik/edit', $data);
	}

	function hapus($id)
	{
		$this->load->model('supermodel');

		$del = $this->supermodel->deleteData('rubrik','rubrik_id', $id);
		if($del) {
			$pesan = "<div class='alert alert-success fade in'>";
				$pesan .= "<button type='button' class='close' data-dismiss='alert'></button>";
				$pesan .= "<h4 class='alert-heading'>Success!</h4>";
				$pesan .= "<p>Hapus rubrik ide berhasil.</p>"; // body pesan
				$pesan .= "</div>";
				$this->session->set_flashdata('pesan', $pesan);
			redirect('page/rubrik/');
		}
		else {
			$pesan = "<div class='alert alert-danger fade in'>";
				$pesan .= "<button type='button' class='close' data-dismiss='alert'></button>";
				$pesan .= "<h4 class='alert-heading'>Error!</h4>";
				$pesan .= "<p>Hapus rubrik ide gagal.</p>"; // body pesan
				$pesan .= "</div>";
				$this->session->set_flashdata('pesan', $pesan);
			redirect('page/rubrik/');
		}
	}


	function list_notif() {
		$this->load->model('supermodel');
		$reply = $this->input->post('reply');

		$getlist = $this->supermodel->getData('rubrik',array('reply'=>$reply), 'tgl_kirim', 'desc');
		$data['list'] = $getlist;

		$this->load->view('rubrik/notifikasi', $data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */