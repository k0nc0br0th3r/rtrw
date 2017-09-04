<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1> Pengumuman
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
            <span class="active">Pengumuman</span>
        </li>
    </ul>

    <div class="blog-page blog-content-1">
        <div class="row">

            <?php if($get_data): ?>
                <?php  foreach($get_data as $row_data): ?>
                

                    <div class="col-md-6">
                        <div class="blog-post-lg bordered blog-container" style="border: 1px solid #DDD;">
                            <div class="blog-img-thumb" style="max-height: 250px;">
                                <a href="<?php echo site_url('page/info/'.$row_data->pengumuman_id); ?>">
                                    <?php
                                    // cek file gambar
                                    $link = dir_upload(show_config('dir_upload_info'), 'link'); 
                                    $path = dir_upload(show_config('dir_upload_info'), 'path');
                                    
                                    ?>
                                    <div class="blog-single-img">
                                    <?php if(check_file($path, $row_data->gambar)): ?>
                                            <img class="img img-responsive" src="<?php echo $link.$row_data->gambar; ?>" />
                                    <?php else: ?>
                                        <img src="<?php echo base_url() ?>assets/pages/img/no_image.jpg" />
                                    <?php endif; ?>
                                    </div>
                                </a>
                            </div>
                            <div class="blog-post-content">
                                <h2 class="blog-title blog-post-title">
                                    <a href="<?php echo site_url('page/info/'.$row_data->pengumuman_id); ?>">
                                        <?php echo $row_data->judul; ?>
                                    </a>
                                </h2>
                                <p class="blog-post-desc"> 
                                    <?php echo substr($row_data->deskripsi, 0, 150); ?> 
                                </p>
                                <div class="blog-post-foot">
                                    <div class="blog-post-meta">
                                        <i class="icon-user font-blue"></i>
                                        <a href="javascript:;">
                                            <?php echo get_user($row_data->user_id,  'nama_lgkp'); ?>
                                        </a>

                                        &nbsp;&nbsp;
                                        <i class="icon-calendar font-blue"></i>
                                        <a href="javascript:;">
                                            <?php echo convert_tanggal($row_data->tgl_entri); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            <?php endif; ?>
        
        </div>
    </div>

</div>