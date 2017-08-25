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
                    <a href="<?php echo site_url('posting/index/add/0') ?>" class="ajaxify_mn">
                        <i class="icon-tag"></i> Berita baru </a>
                </li>
                <li>
                    <a href="<?php echo site_url('posting/index/add/1') ?>" class="ajaxify_mn">
                        <i class="icon-note"></i> Pengumuman baru </a>
                </li>
            </ul>
        </div>
    </div>
	<?php
}

?>