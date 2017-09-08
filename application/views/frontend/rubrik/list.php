<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1> Rubrik Warga
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
            <span class="active">Data Rubrik Warga</span>
        </li>
    </ul>
    <!-- BEGIN CONTENT HEADER -->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-bubble font-red-sunglo"></i>
                        <span class="caption-subject font-red-sunglo bold uppercase">Rubrik Warga</span>
                    </div>
                    
                    <div class="actions">
                        <a class="btn btn-primary" href="<?php echo site_url('page/kirim_rubrik_warga'); ?>">
                            Kirim Rubrik Anda Disini
                            <i class="fa fa-send"></i>
                        </a>    
                    </div>
                </div>

                <div class="portlet-body" id="chats">
                    <!-- data rubrik yg aktif dan sudah dibalas -->
                    <?php if($data_rubrik): ?>
                        <?php foreach($data_rubrik as $row_rubrik) : ?>

                            <div class="well">
                                <ul class="chats">
                                    <li class="in">
                                        <img class="avatar" src="<?php echo base_url('assets/layouts/layout4/img/avatar.png'); ?>">
                                        <div class="message">
                                            <span class="arrow"> </span>
                                            <a href="javascript:;" class="name"> <?php echo $row_rubrik->nama; ?> </a>
                                            <span class="datetime"> 
                                                <?php echo convert_tgl($row_rubrik->tgl_kirim); ?>
                                            </span>
                                            <span class="body"> 
                                                <?php echo $row_rubrik->komentar; ?>
                                            </span>
                                        </div>
                                    </li>
                                    <li class="out">
                                        <img class="avatar" src="<?php echo base_url('assets/layouts/layout4/img/avatar.png'); ?>">
                                        <div class="message">
                                            <span class="arrow"> </span>
                                            <a href="javascript:;" class="name"> <?php echo get_user($row_rubrik->user_id, 'nama_lgkp'); ?> </a>
                                            <span class="datetime"> 
                                                <?php echo convert_tgl($row_rubrik->tgl_balas); ?>
                                            </span>
                                            <span class="body"> 
                                            <?php echo $row_rubrik->tanggapan; ?>
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>
            </div>
            <!-- END PORTLET-->
        </div>
    </div>
</div>