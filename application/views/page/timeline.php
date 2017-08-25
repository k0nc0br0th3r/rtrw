
    <!-- BEGIN CONTENT HEADER -->
    <div class="row">
        <div class="col-md-8 col-sm-12">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-microphone font-red"></i>
                        <span class="caption-subject bold font-red uppercase"> Timeline</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form role="form" method="post" action="<?php echo site_url('dashboard/send_timeline') ?>">
                        <div class="form-body">
                            <div class="form-group">
                                <label for="form_control_1">Masukan pesan anda</label>
                                <textarea class="form-control" rows="3" placeholder="Enter pesan.." name="pesan" required></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="posting" class="btn blue">
                                    <i class="fa fa-send"></i> Posting
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="portlet-body">
                    <div class="timeline">
                        <!-- TIMELINE ITEM -->
                        <?php
                        foreach ($timeline->result() as $rows) {
                        ?>
                        <div class="timeline-item">
                            <div class="timeline-badge">
                                <img class="timeline-badge-userpic" src="<?php echo base_url('uploads/profile/'.$rows->foto) ?>"> </div>
                            <div class="timeline-body">
                                <div class="timeline-body-arrow"> </div>
                                <div class="timeline-body-head">
                                    <div class="timeline-body-head-caption">
                                        <a href="javascript:;" class="timeline-body-title font-blue-madison"><?php echo $rows->nama_lgkp ?></a>
                                        <span class="timeline-body-time font-grey-cascade">Posting <?php echo convert_tanggal($rows->tgl_entri) ?></span>
                                    </div>
                                    <div class="timeline-body-head-actions">
                                        <div class="btn-group">
                                            <button class="btn btn-circle green btn-outline btn-sm dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-right" role="menu">
                                            <?php
                                            if($rows->user_id==$this->session->userdata('user_id')):
                                            ?>
                                                <li>
                                                    <a href="<?php echo site_url('dashboard/del_timeline/'.$rows->timeline_id) ?>"><i class="fa fa-trash"></i> Hapus </a>
                                                </li>
                                            <?php 
                                            endif;
                                            ?>
                                                <li>
                                                    <a href="#comment<?php echo $rows->timeline_id ?>" data-toggle="collapse">
                                                    <i class="fa fa-comment"></i> Komentar 
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-body-content">
                                    <p class="font-grey-cascade"> <?php echo $rows->pesan ?> </p>
                                    <div class="form-comment collapse" id="comment<?php echo $rows->timeline_id ?>">
                                        <form method="post" action="<?php echo site_url() ?>">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <textarea placeholder="Komentar" class="form-control" name="komentar"></textarea>
                                                </div>
                                                <div class="form-group pull-right">
                                                    <button type="submit" class="btn btn-sm green">Kirim</button>
                                                </div>
                                            </div>
                                        </form>
                                        <script type="text/javascript">
                                        $("#comment<?php echo $rows->timeline_id ?> > form").on('submit', function (e) {
                                            e.preventDefault();
                                            var komentar = $(this).find("input[name='komentar']").val();
                                            alert(komentar);
                                        });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <!-- END TIMELINE ITEM -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT HEADER -->

