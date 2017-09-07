<?php
/**
 * Pelayanan COntroller
 *
 * @author Hikmahtiar <hikmahtiar.cool@gmail.com>
 */
class Pelayanan extends CI_Controller 
{
    /**
     * Consturctor Codeigniter
     */
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('user_id') == "") {
			redirect('welcome');
		}
        
        // load model
        $this->load->model('pelayanan_model');
    }
    
    /**
     * Index Page
     *
     * @return HTML
     */
    public function index()
    {
        // data 
        $get_data = $this->pelayanan_model->get_data_advance()->result();
        
        // view
        $data['get_data'] = $get_data;
        $this->load->view('pelayanan_/index', $data);
    }
    
    /**
     * Edit Page
     */
    public function edit($id = '')
    {
        // get data
        $data_jenis = $this->pelayanan_model->get_jenis_advance('', '', '0')->result();
        $get_data = $this->pelayanan_model->get_data_advance($id)->row_array();
        
        // view
        $data['id'] = $id;
        $data['rowdat'] = $get_data;
        $data['data_jenis'] = $data_jenis;
        
        $this->load->view('pelayanan_/edit', $data);
    }
    
    /**
     * Get data nama pelayanan
     *
     * @return JSON
     */
    public function get_data_name()
    {
        // data
        $response = [];
        $id = $this->input->post('id');
        $data = $this->pelayanan_model->get_jenis_advance('', '', $id)->result();
        
        // ketika data ada maka di looping
        if($data)
        {
            foreach($data as $row)
            {
                $response[] = [
                    'jenis_pelayanan_id' => $row->jenis_pelayanan_id,
                    'nama_pelayanan'     => $row->nama_pelayanan,
                ];
            }
        }
        
        output_json($response);
    }
    
    /**
     * Save data
     */
    public function save()
    {
        $level = $this->session->userdata('level');
        $id = $this->input->post('id');
        $jenis_pelayanan = $this->input->post('jenis_pelayanan');
        $jenis_pelayanan_hide = $this->input->post('jenis_pelayanan_hide');
        $nik = $this->input->post('nik');
        $nama = $this->input->post('nama');
        $keperluan = $this->input->post('keperluan');
        $no_telp = $this->input->post('no_telp');
        $rw = $this->input->post('rw');
        $rt = $this->input->post('rt');
        $berkas = $this->input->post('berkas');
        $alamat = $this->input->post('alamat');
        $status = $this->input->post('status');

        $pelayanan = $jenis_pelayanan;

        // jika level admindes
        // maka update menggunakan jenis pelayanan id hide
        // jika bukan menggunakan jenis pelayanan yg selectbox
        if($level == '0')
        {
            $pelayanan = $jenis_pelayanan_hide;
        }
        
        // ketika id = new maka Save
        // jika bukan maka update
        
        $data_save = [
            'jenis_pelayanan_id' => $pelayanan,
            'nik'                => $nik,
            'nama'               => $nama,
            'keperluan'          => $keperluan,
            'no_telp'            => $no_telp,
            'rw'                 => $rw,
            'rt'                 => $rt,
            'alamat'             => $alamat,
        ];
        
        if($id == 'new')
        {
            $data_save['status'] = '0';
            $data_save['tgl_entri'] = date('Y-m-d H:i:s');
            $data_save['user_id'] = $this->session->userdata('user_id');
            $save = $this->pelayanan_model->save($data_save);
        }
        else
        {

            // jika level admindesa
            // maka update status
            if($level == '0')
            {
                $data_save['status'] = $status;
                $pelayanan = $jenis_pelayanan_hide;
            }

            $save = $this->pelayanan_model->update($data_save, $id);
        }
        
        // cek simpan data untuk response notify.js
        if($save)
        {
            $response = [
                'message' => 'Pelayanan berhasil disimpan',
                'status'  => 'success'
            ];
        }
        else
        {
            $response = [
                'message' => 'Pelayanan gagal disimpan',
                'status'  => 'error'
            ];
        }
        
        output_json($response);
         
        
    }

    /**
     * Delete Pelayanan
     */
    public function delete()
    {
        // post & data
        $id = $this->input->post('id');
        
        // delete
        $delete = $this->pelayanan_model->delete($id);
        
        // cek hapus data untuk response notify.js
        if($delete)
        {
            $response = [
                'message' => 'pelayanan berhasil dihapus',
                'status'  => 'success'
            ];
        }
        else
        {
            $response = [
                'message' => 'pelayanan gagal dihapus',
                'status'  => 'error'
            ];
        }
        
        output_json($response);
    }
}
?>