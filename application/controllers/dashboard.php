<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('m_timeline','supermodel'));
		if($this->session->userdata('user_id')=="") {
			redirect('welcome');
		}
	}

	function index()
	{
		$user_id = $this->session->userdata('user_id');
		$konten = "page/timeline";
		if($this->session->userdata('level')==0) {
			$konten = "page/dashboard";
		}

		$where_timeline = [
			'parent' => NULL
		];

		$data['timeline'] = $this->m_timeline->getData($where_timeline, 'tgl_entri', 'desc');
		$data['lastpengumuman'] = $this->supermodel->getData('pengumuman', array('user_id <>'=>$user_id), '', 6, 0);
		$data['konten'] = $konten;
		$this->load->view('admin', $data);
	}

	function content()
	{
		$user_id = $this->session->userdata('user_id');
		$konten = "page/timeline";
		if($this->session->userdata('level')==0) {
			$konten = "page/dashboard";
		}
		$data['lastpengumuman'] = $this->supermodel->getData('pengumuman', array('user_id <>'=>$user_id), '', 6, 0);
		$data['timeline'] = $this->m_timeline->getData(null, 'tgl_entri', 'desc');
		$this->load->view($konten, $data);
	}

	function send_timeline()
	{
		$in['pesan'] = trim(mysql_real_escape_string($this->input->post('pesan')));
		$in['tgl_entri'] = date("Y-m-d H:i:s");
		$in['user_id'] = $this->session->userdata('user_id');
		if(isset($_POST['posting'])) {
			$this->supermodel->insertData('timeline', $in);
		}
		redirect('dashboard');
	}

	/**
	 * Komentar
	 * @author Hikmahtiar <hikmahtiar.cool@gmail.com>
	 */
	public function send_comment()
	{
		$timeline_id = $this->input->post('timeline_id');
		$user_id = $this->session->userdata('user_id');
		$komentar = $this->input->post('komentar');

		$data_save = [
			'pesan'     => $komentar,
			'user_id'   => $user_id,
			'tgl_entri' => date("Y-m-d H:i:s"),
			'parent'    => $timeline_id
		];

		$save = $this->supermodel->insertData('timeline', $data_save);

		if($save)
		{
			$response = [
				'status'   => 'success',
				'message'  => 'Komentar anda berhasil dikirim'
			];
		}
		else
		{
			$response = [
				'status'   => 'error',
				'message'  => 'Komentar anda gagal dikirim, silahkan coba kembali'
			];
		}

		output_json($response);
	}

	function del_timeline($id)
	{
		
		if(isset($id)) {
			$this->supermodel->deleteData('timeline', 'timeline_id', $id);
		}
		redirect('dashboard');
	}

	public function notif_rubrik()
	{
		$response = array();
		$data = $this->supermodel->getData('rubrik', array('reply'=>0));
		if ($data) {
			$response['count'] = $data->num_rows();
		}
		output_json($response);
	}

	public function notif_ide()
	{
		$response = array();
		$where = array();
		if ($this->session->userdata('level') != 0) {
			$where['reply'] = 1;
			$where['user_id'] = $this->session->userdata('user_id');
		} else {
			$where['reply'] = 0;
		}
		$data = $this->supermodel->getData('gagasan', $where);
		if ($data) {
			$response['count'] = $data->num_rows();
		}
		output_json($response);
	}

	public function count_rubrik()
	{
		$response = array();
		$data = $this->supermodel->getData('rubrik', array('tgl_kirim'=> date('Y-m-d')));
		if ($data) {
			$response['count'] = $data->num_rows();
		}
		output_json($response);
	}

	public function counter_box()
	{
		$this->load->model('pelayanan_model');
		$response = array();
		$date = date('Y-m-d');
		$id_jenis_layanan = $this->input->get('id');
		// where data jenis layanan surak keterangan
		$data = $this->pelayanan_model->counter($id_jenis_layanan);
		if ($data) {
			$response['count'] = $data->num_rows();
		}
		output_json($response);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */