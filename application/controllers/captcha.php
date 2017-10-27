<?php 
class Captcha extends CI_Controller
{
    public function index()
    {
        header("Content-type: image/png");
        
        $sess = '';         
        // membuat gambar dengan menentukan ukuran
        $gbr = imagecreate(150, 40);

        //warna background captcha
        imagecolorallocate($gbr, rand(0, 255), rand(0, 255), rand(0, 255));

         
        // pengaturan font captcha
        $color = imagecolorallocate($gbr, rand(0, 255), rand(0, 255), rand(0, 255));
        $font = FCPATH."system/fonts/texb.ttf"; 
        $ukuran_font = 20;
        $posisi = 32;
        // membuat nomor acak dan ditampilkan pada gambar
        for($i=0;$i<=5;$i++) {
        	// jumlah karakter
        	$angka=rand(0, 9);
         
        	$sess .= $angka;
            $this->session->set_userdata('captcha', $sess);
         
        	$kemiringan= rand(20, 20);
         	
        	imagettftext($gbr, $ukuran_font, $kemiringan, 8+15*$i, $posisi, $color, $font, $angka);	
        }
        //untuk membuat gambar 
        imagepng($gbr); 
        imagedestroy($gbr);
    }
}
?>