<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gagasan extends CI_Controller {

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
		$this->form_validation->set_rules('subjek','subjek','required');
		$this->form_validation->set_rules('des','pesan','required');
		if($this->form_validation->run()===TRUE) {
			$is['subjek'] = $this->input->post('subjek');
			$is['pesan'] = $this->input->post('des');
			$is['tgl_entri'] = date('Y-m-d H:i:s');
			$is['read'] = 0;
			$is['reply'] = 0;
			$is['user_id'] = $this->session->userdata('user_id');

			$this->supermodel->insertData('gagasan', $is);

			$pesan = "<div class='alert alert-success fade in'>";
				$pesan .= "<button type='button' class='close' data-dismiss='alert'></button>";
				$pesan .= "<h4 class='alert-heading'>Success!</h4>";
				$pesan .= "<p>Penambahan gagasan berhasil, data tersimpan.</p>"; // body pesan
				$pesan .= "</div>";
				$this->session->set_flashdata('pesan', $pesan);
			redirect('gagasan/add/');
		}
		// $data['konten'] = "gagasan/add";
		$this->load->view("gagasan/add");
	}

	function detail($id)
	{
		$this->load->model('supermodel');
		$data['rowdat'] = $this->supermodel->getData('gagasan', array('gagasan_id'=>$id))->row();
		if($data['rowdat']->reply==1) {
			$up['read'] = 1;
			$this->supermodel->updateData('r_gagasan',$up,'gagasan_id',$id);
		}
		$data['rowbls'] = $this->supermodel->getData('r_gagasan', array('gagasan_id'=>$id));
		$data['st'] = array('belum dibaca', 'dibaca');
		// $data['konten'] = "gagasan/detail";
		$this->load->view('gagasan/detail', $data);
	}

	function reply($id)
	{
		$this->load->model('supermodel');
		$this->load->model('m_gagasan');
		$this->form_validation->set_rules('des','pesan','required');
		if($this->form_validation->run()===TRUE) {
			$is['pesan'] = $this->input->post('des');
			$is['tgl_entri'] = date('Y-m-d H:i:s');
			$is['read'] = 0;
			$is['user_id'] = $this->session->userdata('user_id');
			$id = $this->input->post('id');

			$this->supermodel->updateData('r_gagasan', $is, 'gagasan_id', $id);

			$up['reply'] = 1;
			$this->supermodel->updateData('gagasan',$up,'gagasan_id',$id);

			$pesan = "<div class='alert alert-success fade in'>";
				$pesan .= "<button type='button' class='close' data-dismiss='alert'></button>";
				$pesan .= "<h4 class='alert-heading'>Success!</h4>";
				$pesan .= "<p>Pesan berhasil dikirim, data tersimpan.</p>"; // body pesan
				$pesan .= "</div>";
				$this->session->set_flashdata('pesan', $pesan);
			redirect('page/gagasan');
		}
		$up['read'] = 1;
		$this->supermodel->updateData('gagasan',$up,'gagasan_id',$id);
		$data['rowdat'] = $this->m_gagasan->getDataReply(array('g.gagasan_id'=>$id))->row();
		// $data['konten'] = "gagasan/reply";
		$this->load->view('gagasan/reply', $data);
	}

	function hapus($id)
	{
		$this->load->model('supermodel');

		$del = $this->supermodel->deleteData('gagasan','gagasan_id', $id);
		if($del) {
			$pesan = "<div class='alert alert-success fade in'>";
				$pesan .= "<button type='button' class='close' data-dismiss='alert'></button>";
				$pesan .= "<h4 class='alert-heading'>Success!</h4>";
				$pesan .= "<p>Hapus gagasan ide berhasil.</p>"; // body pesan
				$pesan .= "</div>";
				$this->session->set_flashdata('pesan', $pesan);
			redirect('page/gagasan/');
		}
		else {
			$pesan = "<div class='alert alert-danger fade in'>";
				$pesan .= "<button type='button' class='close' data-dismiss='alert'></button>";
				$pesan .= "<h4 class='alert-heading'>Error!</h4>";
				$pesan .= "<p>Hapus gagasan ide gagal.</p>"; // body pesan
				$pesan .= "</div>";
				$this->session->set_flashdata('pesan', $pesan);
			redirect('page/gagasan/');
		}
	}


	function list_notif() {
		$this->load->model('m_gagasan');
		$sts = $this->input->post('read');
		$user = $this->session->userdata('user_id');
		$html = "";
		
		if($this->session->userdata('level')==0) {
			$getlist = $this->m_gagasan->getData('gagasan', array('g.read'=>$sts), 'g.tgl_entri');
			$data['list'] = $getlist;
			$this->load->view('gagasan/notifikasi', $data);
		} else {
			$getlist = $this->m_gagasan->getDataReply(array('g.read'=>$sts,'k.user_id'=>$user), 'g.tgl_entri');
			$data['list'] = $getlist;
			$this->load->view('gagasan/notifikasi_rw', $data);
		}

		

		
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */