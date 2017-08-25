<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('supermodel');
		if($this->session->userdata('session_id')=="") {
			redirect('welcome');
		}
	}

	function update_acount()
	{
		$this->form_validation->set_rules('username','username','required');
		if($this->form_validation->run()===TRUE) {
			$vr['username'] = $this->input->post('username');
			$vr['nama_lgkp'] = $this->input->post('nama_lgkp');
			$vr['nik'] = $this->input->post('nik');
			$vr['telp'] = $this->input->post('telp');
			$vr['email'] = $this->input->post('email');

			$id = $this->session->userdata('user_id');
			$this->supermodel->updateData('user',$vr,'user_id',$id);
			// refresh session
			$this->change_sess();

			$pesan = "<div class='alert alert-success fade in'>";
				$pesan .= "<button type='button' class='close' data-dismiss='alert'></button>";
				$pesan .= "<h4 class='alert-heading'>Success!</h4>";
				$pesan .= "<p>Update acount profile berhasil</p>"; // body pesan
				$pesan .= "</div>";
				$this->session->set_flashdata('pesan', $pesan);
			redirect('dashboard');
		} else {
			redirect('dashboard');
		}
	}

	function update_avatar()
	{

		if(!empty($_FILES['avatar']['name'])) {
			if($this->session->userdata('foto')!="avatar9.jpg") {
				@unlink('./uploads/profile/'.$this->session->userdata('foto'));
			}
			$ext = end(explode(".", $_FILES['avatar']['name']));
			$rand = rand(000,999);
			$name = $rand.'.'.$ext;
			
			$upl = $this->supermodel->unggah_gambar('profile/','avatar',$name);
			if($upl===FALSE) {
				$pesan = "<div class='alert alert-danger fade in'>";
				$pesan .= "<button type='button' class='close' data-dismiss='alert'></button>";
				$pesan .= "<h4 class='alert-heading'>Error!</h4>";
				$pesan .= "<p>Upload foto gagal.</p>"; // body pesan
				$pesan .= "</div>";
				$this->session->set_flashdata('pesan', $pesan);
			} else {
				$vr['foto'] = $name;
				$id = $this->session->userdata('user_id');
				$this->supermodel->updateData('user',$vr,'user_id',$id);

				// refresh session
				$this->change_sess();

				$pesan = "<div class='alert alert-success fade in'>";
				$pesan .= "<button type='button' class='close' data-dismiss='alert'></button>";
				$pesan .= "<h4 class='alert-heading'>Success!</h4>";
				$pesan .= "<p>Update avatar profile berhasil</p>"; // body pesan
				$pesan .= "</div>";
				$this->session->set_flashdata('pesan', $pesan);
			}
			

			redirect('dashboard');
						
		} else {
			redirect('dashboard');
		}
	}

	function update_password()
	{
		$this->form_validation->set_rules('pass_lama','password','required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->session->userdata('user_id');
			$pass = md5($this->input->post('pass_lama'));
			$getpass = $this->supermodel->getData('user',array('user_id'=>$id,'password'=>$pass));
			if($getpass->num_rows()==1) {
				$vr['password'] = md5($this->input->post('pass_baru'));
				$this->supermodel->updateData('user',$vr,'user_id',$id);

				// refresh session
				$this->change_sess();

				$pesan = "<div class='alert alert-success fade in'>";
				$pesan .= "<button type='button' class='close' data-dismiss='alert'></button>";
				$pesan .= "<h4 class='alert-heading'>Success!</h4>";
				$pesan .= "<p>Update acount password berhasil</p>"; // body pesan
				$pesan .= "</div>";
				$this->session->set_flashdata('pesan', $pesan);
				redirect('dashboard');
			} else {
				$pesan = "<div class='alert alert-danger fade in'>";
				$pesan .= "<button type='button' class='close' data-dismiss='alert'></button>";
				$pesan .= "<h4 class='alert-heading'>Error!</h4>";
				$pesan .= "<p>Password lama tidak sama.</p>"; // body pesan
				$pesan .= "</div>";
				$this->session->set_flashdata('pesan', $pesan);
				redirect('dashboard');
			}
			
		} else {
			redirect('dashboard');
		}
	}

	private function change_sess()
	{
		// $direct = $this->input->get('to');
		$sv['user_id'] = $this->session->userdata('user_id');

		$user_data = $this->session->all_userdata();

	    foreach ($user_data as $key => $value) {
	        if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
	            $this->session->unset_userdata($key);
	        }
	        // echo $key.'=>'.$value.'<br>';
	    }
		// $this->session->sess_destroy();
		// echo $sv['user_id'];
		if($this->session->userdata('user_id')=="") {
			$this->load->model('supermodel');
			$getuser = $this->supermodel->getData('user', array('user_id'=>$sv['user_id']));
			$row = $getuser->row_array();
			$this->session->set_userdata($row);
			// redirect($direct);
			return TRUE;
		} else {
			return FALSE;
			// echo "<script>alert('Session gagal!!'); document.location = '".site_url($direct)."'; </script>";
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */