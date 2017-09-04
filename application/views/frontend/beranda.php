<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Beranda
                <small>Sistem Informasi RT/RW Desa Tanimulya</small>
            </h1>
        </div>
        <!-- END PAGE TITLE -->
    </div>
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="index.html">Beranda</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">Berita Terbaru</span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="blog-page blog-content-1">
        <div class="row">
            <div class="col-lg-6">
                
                <!-- data berita -->
                <?php if($data_news) : ?>
                    <?php foreach($data_news as $row_news) : ?>
                        <div class="blog-post-lg bordered blog-container" style="border: 1px solid #DDD;">
                            <div class="blog-img-thumb" style="max-height: 250px;">
                                <a href="<?php echo site_url('page/news/'.$row_news->berita_id); ?>">
                                    <?php
                                    $link = dir_upload(show_config('dir_upload_news'), 'link'); 
                                    $path = dir_upload(show_config('dir_upload_news'), 'path');
                                    
                                    ?>
                                    <?php if(check_file($path, $row_news->gambar)): ?>
                                        <img src="<?php echo $link.$row_news->gambar; ?>" />
                                    <?php else: ?>
                                        <img src="<?php echo base_url() ?>assets/pages/img/no_image.jpg" />
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="blog-post-content">
                                <h2 class="blog-title blog-post-title">
                                    <a href="<?php echo site_url('page/news/'.$row_news->berita_id); ?>">
                                        <?php echo $row_news->judul; ?>
                                    </a>
                                </h2>
                                <p class="blog-post-desc"> 
                                    <?php echo substr($row_news->deskripsi, 0, 150); ?>
                                </p>
                                <div class="blog-post-foot">
                                    <div class="blog-post-meta">
                                        <i class="icon-user font-blue"></i>
                                        <a href="javascript:;">
                                            <?php echo get_user($row_news->user_id,  'nama_lgkp'); ?>
                                        </a>

                                        &nbsp;&nbsp;
                                        <i class="icon-calendar font-blue"></i>
                                        <a href="javascript:;">
                                            <?php echo convert_tanggal($row_news->tgl_entri); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                
                
            </div>
            
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="blog-banner blog-container" style="background-image:url(<?php echo base_url() ?>assets/pages/img/background/7.jpg);">
                            <h2 class="blog-title blog-banner-title">
                                <a href="javascript:;">Sekilas Desa Tanimulya</a>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <?php if($data_info) : ?>
                        <?php foreach($data_info as $row_info) : ?>
                        
                    
                            <div class="col-sm-6">
                                <div class="blog-post-sm bordered blog-container">
                                    <div class="blog-img-thumb" style="max-height: 150px;">
                                        <a href="javascript:;">
                                            <?php
                                            $link = dir_upload(show_config('dir_upload_info'), 'link'); 
                                            $path = dir_upload(show_config('dir_upload_info'), 'path');
                                            
                                            ?>
                                            <?php if(check_file($path, $row_info->gambar)): ?>
                                                <img src="<?php echo $link.$row_info->gambar; ?>" />
                                            <?php else: ?>
                                                <img src="<?php echo base_url() ?>assets/pages/img/no_image.jpg" />
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                    <div class="blog-post-content">
                                        <h2 class="blog-title blog-post-title">
                                            <a href="javascript:;">
                                                <?php echo $row_info->judul; ?>
                                            </a>
                                        </h2>
                                        <p class="blog-post-desc"> 
                                            <?php echo substr($row_info->deskripsi, 0, 150); ?>
                                        </p>
                                        <div class="blog-post-foot">
                                            <div class="blog-post-meta">
                                                <i class="icon-user font-blue"></i>
                                                <a href="javascript:;">
                                                    <?php echo get_user($row_info->user_id,  'nama_lgkp'); ?>
                                                </a>
                                            </div>
                                            <div class="blog-post-meta">
                                                <i class="icon-calendar font-blue"></i>
                                                <a href="javascript:;">
                                                    <?php echo convert_tanggal($row_info->tgl_entri); ?>
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
    </div>
    <!-- END PAGE BASE CONTENT -->
</div>