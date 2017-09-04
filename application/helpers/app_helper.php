<?php
function color()
{
	$warna = array(
		'bg-red'=>'Merah',
		'bg-yellow'=>'Kuning',
		'bg-green'=>'Hijau',
		'bg-aqua'=>'Aqua',
		'bg-blue'=>'Biru',
		'bg-light-blue'=>'Biru muda',
		'bg-navy'=>'Biru Tua',
		'bg-teal'=>'Teal',
		'bg-olive'=>'Olive',
		'bg-lime'=>'Lime',
		'bg-orange'=>'Orange',
		'bg-purple'=>'Ungu',
		'bg-marron'=>'Maroon',
		'bg-black'=>'Black');
	return $warna;
}

function posisi_banner($id=null)
{
	$posisi = array(
		'atasportal'=>'Bagian Atas Portal',
		'sisikiriportal'=>'Bagian Kiri Portal',
		'sisikananportal'=>'Bagian Kanan Portal',
		'bawahportal'=>'Bagian Bawah Portal',
		'kanankonten'=>'Sisi Kanan Konten',
		'kirikonten'=>'Sisi Kiri Konten');
	if($id==null)
		return $posisi;
	else
		return $posisi[$id];
	// Edit sesuai kebutuhan
}

function category_parent($id)
{
	$ci =& get_instance();

	$cek = $ci->db->get_where('category',array('category_id'=>$id));
	if($cek->num_rows()==1) {
		$cek = $cek->row();
		return $cek->category_name;
	} else {
		return $m = "- Parent Category -";
	}
}

function album_parent($id)
{
	$ci =& get_instance();

	$cek = $ci->db->get_where('album',array('album_id'=>$id));
	if($cek->num_rows()==1) {
		$cek = $cek->row();
		return $cek->album_title;
	} else {
		return $m = "- Parent Album -";
	}
}

function level($id)
{
	$level = array('Superadmin','Operator');
	echo $level[$id];
}

function linked($id, $title) {
	$link = str_replace(" ", "-", htmlspecialchars($title));
	$linked = site_url('kategori/addview?id='.$id.'&title='.$link);
	return $linked;
}

function get_image($data, $default_url = null) {
    if($default_url!="") {
    	$img = base_url()."uploads/post/".$default_url;
    	return $img;
    } else {
    	if(preg_match_all('/\!\[.*?\]\((.*?)\)/', $data, $matches)) {
        	return $matches[1][0];
	    }
	    
	    if(preg_match_all('/<img (.*?)?src=(\'|\")(.*?)(\'|\")(.*?)? ?\/?>/i', $data, $matches)) {
	        return $matches[3][0];
	    }

    	return $foto = base_url()."uploads/post/default.jpg";
    }
}

function convert_tanggal($tgl)
{
	$exp = explode(" ", $tgl);
	$tgl = $exp[0];
	$wkt = $exp[1];
	$bln = array(
		'01'=>'Januari',
		'02'=>'Februari',
		'03'=>'Maret',
		'04'=>'April',
		'05'=>'Mei',
		'06'=>'Juni',
		'07'=>'Juli',
		'08'=>'Agustus',
		'09'=>'September',
		'10'=>'Oktober',
		'11'=>'November',
		'12'=>'Desember'
		);
	$p = explode("-", $tgl);
	$tgl_jadi = $p[2]." ".$bln[$p[1]]." ".$p[0]." - ".$wkt;
	return $tgl_jadi;
}

function convert_tgl($tgl)
{
	$bln = array(
		'01'=>'Januari',
		'02'=>'Februari',
		'03'=>'Maret',
		'04'=>'April',
		'05'=>'Mei',
		'06'=>'Juni',
		'07'=>'Juli',
		'08'=>'Agustus',
		'09'=>'September',
		'10'=>'Oktober',
		'11'=>'November',
		'12'=>'Desember'
		);
	$p = explode("-", $tgl);
	$tgl_jadi = $p[2]." ".$bln[$p[1]]." ".$p[0];
	return $tgl_jadi;
}


// ======================================== helper tambahan ===================================== //
function menu_statis_depan() {
	$ci=&get_instance();
	$ci->load->model('supermodel');
	$mn = $ci->supermodel->getData('statis','','statis_id','asc');
	foreach ($mn->result() as $rowmn) {
        # code...
    ?>
        <li class="nav-item  ">
            <a href="<?php echo site_url('statis/page?id='.$rowmn->statis_id) ?>" class="nav-link ">
                <span class="title"><?php echo $rowmn->judul ?></span>
            </a>
        </li>
    <?php
    }
}

function menu_statis_belakang() {
	$ci=&get_instance();
	$ci->load->model('supermodel');
	$mn = $ci->supermodel->getData('statis','','statis_id','asc');
	foreach ($mn->result() as $rowmn) {
        # code...
    ?>
        <li class="nav-item  ">
            <a href="<?php echo site_url('page/statis/'.$rowmn->statis_id) ?>" class="ajaxify nav-link ">
            	<i class="icon-note"></i>
                <span class="title"><?php echo $rowmn->judul ?></span>
            </a>
        </li>
    <?php
    }
}

function tbl_alt_admin() {
	?>
	<div class="page-actions">
        <div class="btn-group">
            <button type="button" class="btn red-haze btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                <span class="hidden-sm hidden-xs">Tambah&nbsp;</span>
                <i class="fa fa-angle-down"></i>
            </button>
            <ul class="dropdown-menu" role="menu">
            <?php
            $ci=& get_instance();
            if($ci->session->userdata('level')==0):
            ?>
                <li>
                    <a href="<?php echo site_url('action/new_page') ?>" class="ajaxify_mn">
                        <i class="icon-docs"></i> Halaman baru </a>
                </li>
                <li class="divider"></li>
            <?php
            endif;
            ?>
                <li>
                    <a href="<?php echo site_url('news/edit/new') ?>" class="ajaxify_mn">
                        <i class="icon-tag"></i> Berita baru </a>
                </li>
                <li>
                    <a href="<?php echo site_url('info/edit/new') ?>" class="ajaxify_mn">
                        <i class="icon-note"></i> Pengumuman baru </a>
                </li>
            </ul>
        </div>
    </div>
	<?php
}

/**
 * Get User by Id
 *
 * @author Hikmahtiar <hikmahtiar.cool@gmail.com>
 */
function get_user($id, $show)
{
	$ci =& get_instance();

	$ci->load->model('m_user');

	$where = [
		'u.user_id' => $id
	];

	$get_user = $ci->m_user->getData($where)->row_array();

	if($get_user)
	{
		if(array_key_exists($show, $get_user))
		{
			return $get_user[$show];
		}
	}

	return '';

}

/**
 * Get Copyright
 *
 * @author Hikmahtiar <hikmahtiar.cool@gmail.com>
 */
function set_copyright($year = '')
{
	$y = date('Y');

	// bila tahun di isi 
	if($year != '')
	{
		// bila tahun yg di isi = tahun skrg
		// maka muncul tahun skrg
		// sebaliknya memunculkan tahun dibuat s/d tahun skrg
		if($year == $y)
		{
			return $y;
		}
		else
		{
			return $year.' - '. $y;
		}
	}
	return $y;
}

/**
 * Status
 */
function get_status($id = '')
{
	$data = [
		0 => 'Tidak Aktif',
		1 => 'Aktif'
	];
	
	if($id != '')
	{
		return $data[$id];
	}
	return $data;
}

/**
 * Check array key exist
 */
function check_array_exists($array, $key)
{
	if(array_key_exists($key, $array))
	{
		return $array[$key];
	}
	return '';
}

/**
 * Output JSON
 */
function output_json($array)
{
	$ci =& get_instance();
	return $ci->output->set_output(json_encode($array));
}

/**
 * Helper untuk upload via Codeigniter
 */
function upload_file($path=null, $name=null, $rename=null, $allowed_types = '')
{
	$ci =& get_instance();
	
    ini_set('memory_limit','960M');
    ini_set('post_max_size','2084M');
    ini_set('upload_max_filesize', '2084M');
    $config['upload_path'] = $path;

    $allow = '*';

    if($allowed_types != '')
    {
        $allow = $allowed_types;
    }
    $config['allowed_types'] = $allow;
    //$config['max_size'] = '6400000';

    if($rename!=null) {
        $config['file_name'] = $rename;
    }
    $ci->load->library('upload',$config);
    if(!$ci->upload->do_upload($name)) {
        return false;
    } else {
        return true;
    }
}

 /**
  * Direktory Upload
  *
  * @return array
  */
 function dir_upload($dir, $show = '')
 {
 	$folder = $dir;
 	$link = base_url().$folder;
 	$path = FCPATH.$folder;
	
	$data = [
 		'path' => $path,
 		'link' => $link
 	];
	
	if($show != '')
	{
		if(array_key_exists($show, $data))
		{
			return $data[$show];
		}
		
		return '';
	}
 	
 	return $data;
 }
 
 /**
  * cek file exist and not null
  */
 function check_file($path, $file) 
 {
	if(file_exists($path.$file) && ($file != ''))
	{
		return true;
	} 
	
	return false;
 }
 
 /**
  * Menampilkan Config COdeigniter
  */
 function show_config($key = '')
 {
     $ci =& get_instance();
 
     $config = $ci->config->config;
 
     if(array_key_exists($key, $config))
     {
         return $config[$key];
     }
 
     return '-';
 }

?>