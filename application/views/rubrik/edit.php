
    <!-- BEGIN CONTENT HEADER -->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-user-follow font-red"></i>
                        <span class="caption-subject font-red sbold uppercase">Form Tanggapan Rubrik</span>
                    </div>
                    <div class="actions">
                        <a class="btn green-haze btn-outline btn-circle btn-sm ajaxify" href="<?php echo site_url('page/rubrik') ?>"> 
                        <i class="icon-action-undo"></i> Kembali </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <?php echo $this->session->flashdata('pesan') ?>
                    <!-- BEGIN FORM-->
                    <form id="form" method="post" action="<?php echo site_url('rubrik/edit/') ?>" class="form-horizontal form-bordered">
                    <input type="hidden" name="id" value="<?php echo $rowdat->rubrik_id ?>">
                        <div class="form-body">
                            <div class="form-group form-md-line-input">
                                <label class="col-md-3 control-label" for="form_control_1">Nama Pengirim
                                </label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" readonly value="<?php echo $rowdat->nama ?>">
                                    <div class="form-control-focus"> </div>
                                </div>
                            </div>
                            <div class="form-group form-md-line-input">
                                <label class="col-md-3 control-label" for="form_control_1">Telp
                                </label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" readonly value="<?php echo $rowdat->telp ?>">
                                    <div class="form-control-focus"> </div>
                                </div>
                            </div>
                            <div class="form-group form-md-line-input">
                                <label class="col-md-3 control-label" for="form_control_1">Tanggal Pesan Masuk
                                </label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" readonly value="<?php echo convert_tgl($rowdat->tgl_kirim) ?>">
                                    <div class="form-control-focus"> </div>
                                </div>
                            </div>

                            <div class="form-group form-md-line-input">
                                <label class="col-md-3 control-label" for="form_control_1">Komentar
                                </label>
                                <div class="col-md-9">
                                    <textarea class="form-control" readonly name="pesan" rows="4"><?php echo $rowdat->komentar ?></textarea>
                                </div>
                            </div>
                            <div class="form-group form-md-line-input">
                                <label class="col-md-3 control-label" for="form_control_1">Tanggapan
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="tanggapan" rows="6"><?php echo $rowdat->tanggapan ?></textarea>
                                </div>
                            </div>
                            <div class="form-group form-md-line-input">
                                <label class="col-md-3 control-label" for="form_control_1">Aaktifkan rubrik ini?
                                </label>
                                <div class="col-md-9">
                                    <label>
                                        <input type="checkbox" value="1" name="status" <?php echo ($rowdat->status==1 ? "checked" : " ");?>>
                                         YES
                                    </label>
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green">Kirim Tanggapan</button>
                                    <button type="reset" class="btn default">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <!-- END CONTENT HEADER -->
<script type="text/javascript">
    $('#form').on('submit', function(e) {
        e.preventDefault();
        var pageContent = $('.page-content .page-content-body');
        App.startPageLoading({animate: true});
        $.ajax({
            url : $(this).attr('action'),
            type : "POST",
            data : $(this).serialize(),
            cache : false,
            success : function(data) {
                App.stopPageLoading();
                pageContent.html(data);
                Layout.fixContentHeight(); // fix content height
                App.initAjax(); // initialize core stuff
            },
            error: function (data, ajaxOptions, thrownError) {
                App.stopPageLoading();
                pageContent.html('<h4>Could not load the requested content.</h4>');
            }
        });
    });
</script>
