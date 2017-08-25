    <!-- BEGIN CONTENT HEADER -->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light portlet-fit portlet-form bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-user-follow font-red"></i>
                        <span class="caption-subject font-red sbold uppercase">Form add member</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-default ajaxify" href="<?php echo site_url('page/member') ?>">
                            <i class="icon-reload"></i> Kembali
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <?php echo $this->session->flashdata('pesan') ?>
                    <!-- BEGIN FORM-->
                    <form method="post" action="<?php echo site_url('member/add') ?>" id="form">
                        <div class="form-body">
                            <div class="form-group form-md-line-input">
                                <label class="col-md-3 control-label" for="form_control_1">NIK
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="nik" name="nik">
                                    <div class="form-control-focus"> </div>
                                </div>
                            </div>
                            <div class="form-group form-md-line-input">
                                <label class="col-md-3 control-label" for="form_control_1">Nama Lengkap
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Nama lengkap" name="nama_lgkp">
                                    <div class="form-control-focus"> </div>
                                </div>
                            </div>
                            <div class="form-group form-md-line-input">
                                <label class="col-md-3 control-label" for="form_control_1">Username
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="username" name="username">
                                    <div class="form-control-focus"> </div>
                                </div>
                            </div>
                            <div class="form-group form-md-line-input">
                                <label class="col-md-3 control-label" for="form_control_1">Email</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" class="form-control" name="email" placeholder="email">
                                        <div class="form-control-focus"> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-md-line-input">
                                <label class="col-md-3 control-label" for="form_control_1"> Telepon </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="No. Telp" name="telp">
                                    <div class="form-control-focus"> </div>
                                </div>
                            </div>
                            
                            <div class="form-group form-md-line-input">
                                <label class="col-md-3 control-label" for="form_control_1">Level
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-9">
                                    <select class="form-control" name="level">
                                    <option value="">-- pilih level user --</option>
                                    <?php
                                    foreach ($level as $k => $l) {
                                        # code...
                                        echo '<option value="'.$k.'">'.$l.'</option>';
                                    }
                                    ?>
                                    </select>
                                    <div class="form-control-focus"> </div>
                                </div>
                            </div>

                            <div class="form-group form-md-line-input">
                                <label class="col-md-3 control-label" for="form_control_1">Jabatan
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-9">
                                    <select class="form-control" name="jabatan">
                                    <option value="">-- pilih jabatan --</option>
                                    <?php
                                    foreach ($jb->result() as $j) {
                                        # code...
                                        echo '<option value="'.$j->jabatan_id.'">'.$j->nm_jabatan.'</option>';
                                    }
                                    ?>
                                    </select>
                                    <div class="form-control-focus"> </div>
                                </div>
                            </div>
                            <div class="form-group form-md-line-input">
                                <label class="col-md-3 control-label" for="form_control_1">Password
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" placeholder="password" name="password">
                                    <div class="form-control-focus"> </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green">Save</button>
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
<script>
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