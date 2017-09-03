<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Berita
                <small></small>
            </h1>
        </div>
        <!-- END PAGE TITLE -->
    </div>

    <?php if($get_data): ?>

        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="<?php echo base_url() ?>">Beranda</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="<?php echo site_url('page/news') ?>">Berita</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span class="active"><?php echo $get_data->judul; ?></span>
            </li>
        </ul>

        <div class="blog-page blog-content-2">
            <div class="row">

                <div class="col-lg-9">
                    <div class="blog-single-content bordered blog-container">
                        <div class="blog-single-head">
                            <h1 class="blog-single-head-title">
                            <?php echo $get_data->judul; ?>
                            </h1>
                            <div class="blog-single-head-date">
                                <i class="icon-calendar font-blue"></i>
                                <a href="javascript:;">
                                    <?php echo get_user($get_data->user_id, 'nama_lgkp'); ?>
                                </a>

                                &nbsp;
                                &nbsp;

                                <i class="icon-calendar font-blue"></i>
                                <a href="javascript:;">
                                <?php echo convert_tanggal($get_data->tgl_entri); ?>
                                </a>
                            </div>
                        </div>
                        <div class="blog-single-img">
                                <!-- cek gambar -->
                                <?php if($get_data->gambar != ''): ?>
                                    <img src="<?php echo dir_upload('uploads/news/', 'link').$get_data->gambar; ?>" />
                                <?php else: ?>
                                    <img src="<?php echo base_url() ?>assets/pages/img/no_image.jpg" />
                                <?php endif; ?> 
                        </div>
                        <div class="blog-single-desc">
                            <p> 
                            <?php echo $get_data->deskripsi; ?>
                            </p>
                        </div>
                        <!-- <div class="blog-single-foot">
                            <ul class="blog-post-tags">
                                <li class="uppercase">
                                    <a href="javascript:;">Bootstrap</a>
                                </li>
                                <li class="uppercase">
                                    <a href="javascript:;">Sass</a>
                                </li>
                                <li class="uppercase">
                                    <a href="javascript:;">HTML</a>
                                </li>
                            </ul>
                        </div> -->
                        
                    </div>
                </div>
                
            </div>
        </div>

    <?php endif; ?>


</div>