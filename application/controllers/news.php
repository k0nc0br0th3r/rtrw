<?php 
/**
 * News Controller
 * 
 * @author Hikmahtiar <hikmahtiar.cool@gmail.com>
 */

class News extends CI_Controller
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
        $this->load->model('news_model');
    }
    
    /**
     * Direktory Upload
     *
     * @return array
     */
    private function dir_upload()
    {
        $folder = 'uploads/news/';
        return dir_upload($folder);
    }
    
    /**
     * Index Page
     */
    public function index()
    {
        // get data
        $user_id = $this->session->userdata('user_id');
        $order = 'tgl_entri DESC';
        
        // jika level 0 tampil semua 
        // jika bukan tampil sesuai user yg login
        if(get_user($user_id, 'level') == 0)
        {
            $user_id = '';
        }
        
        $get_data = $this->news_model->get_data_advance('' , '', '', $user_id, $order)->result_array();
        
        // view
        $data['user_id'] = $user_id;
        $data['listdata'] = $get_data;
        $data['dir_upload'] = $this->dir_upload();
        $this->load->view('news/index', $data);
    }
    
    /**
     * Edit Page
     */
    public function edit($id = '')
    {
        // get data
        $get_data = $this->news_model->get_data_advance($id)->row_array();
        
        // view
        $data['id'] = $id;
        $data['rowdat'] = $get_data;
        $this->load->view('news/edit', $data);
    }
    
    /**
     * Save data
     *
     * @return JSON
     */
    public function save()
    {
        // post & data
        $id = $this->input->post('id');
        $judul = $this->input->post('judul');
        $status = $this->input->post('status');
        $deskripsi = $this->input->post('des');
        $gambar = $this->input->post('gambar');
        $allowed = 'jpg|png|bmp|gif|jpeg';
        
        $dir_upload = $this->dir_upload();
        
        $data_save = [
            'judul'     => $judul,
            'status'    => $status,
            'deskripsi' => $deskripsi,
        ];
        
        // cek id jika id = new maka save,
        // jika bukan maka update
        if($id == 'new')
        {
            $data_save['user_id'] = $this->session->userdata('user_id');
            $data_save['tgl_entri'] = date('Y-m-d H:i:s');
            
            // jika upload gambar
            if(isset($_FILES['gambar']) && !empty($_FILES['gambar']))
            {
                $filename = time().strtolower(str_replace(' ', '', $_FILES['gambar']['name']));
                $upload = upload_file($dir_upload['path'], 'gambar', $filename, $allowed);
                
                // jika gagal upload maka notif error
                if(!$upload)
                {
                    $response = [
                        'message' => 'Upload gagal silahkan coba lagi',
                        'status'  => 'error'
                    ];
                    return output_json($response);
                }
                else
                {
                    $data_save['gambar'] = $filename;
                }
            }
            
            $save = $this->news_model->save($data_save);
        }
        else
        {
            // jika upload gambar
            if(isset($_FILES['gambar']) && !empty($_FILES['gambar']))
            {
                $filename = time().strtolower(str_replace(' ', '', $_FILES['gambar']['name']));
                $upload = upload_file($dir_upload['path'], 'gambar', $filename, $allowed);
                
                // jika gagal upload maka notif error
                if(!$upload)
                {
                    $response = [
                        'message' => 'Upload gagal silahkan coba lagi',
                        'status'  => 'error',
                        'pas' => $dir_upload['path']
                    ];
                    return output_json($response);
                }
                else
                {
                    
                     // get data
                     $get_data_one = $this->news_model->get_data_advance($id)->row();
                     $gambar_ = ($get_data_one) ? $get_data_one->gambar : '';
                     
                     // cek jika ada gambar maka hapus
                     if(check_file($dir_upload['path'], $gambar_))
                     {
                         @unlink($dir_upload['path'].$gambar_);
                     }
                     
                     $data_save['gambar'] = $filename;
                }
            }
            
            $save = $this->news_model->update($data_save, $id);
        }
        
        // cek simpan data untuk response notify.js
        if($save)
        {
            $response = [
                'message' => 'Berita berhasil disimpan',
                'status'  => 'success'
            ];
        }
        else
        {
            $response = [
                'message' => 'Berita gagal disimpan',
                'status'  => 'error'
            ];
        }
        
        output_json($response);
    }
    
    /**
     * Hapus 
     */
    public function delete()
    {
        // post & data
        $id = $this->input->post('id');
        $dir_upload = $this->dir_upload();

        $get_data_one = $this->news_model->get_data_advance($id)->row();
        $gambar_ = ($get_data_one) ? $get_data_one->gambar : '';
        
        // delete
        $delete = $this->news_model->delete($id);
        
        // cek hapus data untuk response notify.js
        if($delete)
        {
            // hapus file
            // cek jika ada gambar maka hapus
            if(check_file($dir_upload['path'], $gambar_))
            {
                @unlink($dir_upload['path'].$gambar_);
            }
            
            $response = [
                'message' => 'Berita berhasil dihapus',
                'status'  => 'success'
            ];
        }
        else
        {
            $response = [
                'message' => 'Berita gagal dihapus',
                'status'  => 'error'
            ];
        }
        
        output_json($response);        
    }
}

?>