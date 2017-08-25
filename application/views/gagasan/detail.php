
    <!-- BEGIN CONTENT HEADER -->
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-envelope-open font-blue"></i>
                        <span class="caption-subject font-blue sbold uppercase">Detail gagasan</span>
                    </div>
                    <div class="actions">
                        <a class="btn green-haze btn-outline btn-circle btn-sm ajaxify" href="<?php echo site_url('page/gagasan') ?>"> 
                        <i class="icon-action-undo"></i> Kembali </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="general-item-list">
                        <div class="item">
                            <div class="item-head">
                                <div class="item-details">
                                    <span class="item-label"><?php echo convert_tgl($rowdat->tgl_entri) ?></span>
                                </div>
                                <span class="item-status">
                                    <span class="badge badge-empty badge-success"></span> <?php echo $st[$rowdat->read] ?> </span>
                            </div>
                            <div class="item-body"> 
                                <h4 class="font-blue">Subjek : <?php echo $rowdat->subjek ?></h4>
                                <?php echo $rowdat->pesan ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-user-follow font-blue"></i>
                        <span class="caption-subject font-blue sbold uppercase">Balasan Desa</span>
                    </div>
                    <div class="actions">
                        <a class="btn green-haze btn-outline btn-circle btn-sm" href="javascript:;"> 
                        <i class="fa fa-refresh"></i> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <?php
                    foreach ($rowbls->result() as $rows) {
                    if ($rows->user_id<>NULL) {
                    ?>
                    <div class="general-item-list">
                        <div class="item">
                            <div class="item-head">
                                <div class="item-details">
                                    <span class="item-label"><?php echo convert_tgl($rows->tgl_entri) ?></span>
                                </div>
                                <span class="item-status">
                                    <span class="badge badge-empty badge-success"></span> <?php echo $st[$rows->read] ?> </span>
                            </div>
                            <div class="item-body">
                                <?php echo $rows->pesan ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    } else {
                        ?>
                        <div class="alert alert-warning">
                            Belum ada balasan dari admin desa
                        </div>
                        <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <!-- END CONTENT HEADER -->
