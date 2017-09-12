<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Profil Desa
                <small></small>
            </h1>
        </div>
        <!-- END PAGE TITLE -->
    </div>
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="<?php echo base_url() ?>">Beranda</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="<?php echo base_url() ?>">Profil Desa</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active"><?php echo $row['judul'] ?></span>
        </li>
    </ul>


    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="blog-page blog-content-2">
        <div class="row">
            <div class="col-lg-9">
                <div class="blog-single-content bordered blog-container">
                    <div class="blog-single-head">
                        <h1 class="blog-single-head-title"><?php echo $row['judul'] ?></h1>
                    </div>
                    <?php
                    if($row['foto']!="") {
                        echo '<div class="blog-single-img">';
                        echo '<img src="'.base_url('uploads/statis/'.$row['foto']).'" /></div>';
                    }
                    ?>
                    <div class="blog-single-desc">
                        <?php echo $row['deskripsi'] ?>
                    </div>
                    <div class="blog-single-foot">                        
                        <div class="blog-post-meta">
                            <i class="icon-user font-blue"></i>
                            <a href="javascript:;">
                                <?php echo $row['nama_lgkp'] ?>
                            </a>

                            &nbsp;&nbsp;
                            <i class="icon-calendar font-blue"></i>
                            <a href="javascript:;">
                                <?php echo convert_tanggal($row['tgl_entri']) ?>
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="blog-single-sidebar bordered blog-container">
                    <div class="blog-single-sidebar-links">
                        <h3 class="blog-sidebar-title uppercase">Berita Desa</h3>
                        <ul>
                        <?php
                        if ($berita) {
                            foreach ($berita->result_array() as $rows) {
                        ?>
                            <li>
                                <a href="javascript:;"> <?php echo $rows['judul'] ?> </a>
                            </li>
                        <?php
                            }
                        }
                        ?>
                        </ul>
                    </div>
                    <p>
                        <a href="<?php echo site_url('page/news') ?>">Lebih banyak lagi</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE BASE CONTENT -->

</div>