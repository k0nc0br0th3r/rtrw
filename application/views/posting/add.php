
    <!-- BEGIN CONTENT HEADER -->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light portlet-fit portlet-form bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-user-follow font-red"></i>
                        <span class="caption-subject font-red sbold uppercase">Form add <?php echo $ktg[$this->uri->segment(4)] ?></span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-default ajaxify" href="<?php echo site_url('posting/index/list/'.$this->uri->segment(4)) ?>">
                            <i class="icon-reload"></i> Kembali
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <?php echo $this->session->flashdata('pesan') ?>
                    <!-- BEGIN FORM-->
                    <form id="form" method="post" action="<?php echo site_url('posting/add/'.$this->uri->segment(4)) ?>" class="form-horizontal form-bordered">
                        <div class="form-body">
                            <div class="form-group form-md-line-input">
                                <label class="col-md-3 control-label" for="form_control_1">Judul
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="judul" name="judul">
                                    <div class="form-control-focus"> </div>
                                </div>
                            </div>

                            <div class="form-group form-md-line-input">
                                <label class="col-md-3 control-label" for="form_control_1">Deskripsi
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="6"></textarea>
                                    <textarea class="form-control" name="des" id="des" style="display:none"></textarea>
                                </div>
                            </div>
                            
                            <div class="form-group form-md-line-input">
                                <label class="col-md-3 control-label" for="form_control_1">Tipe
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-9">
                                    <select class="form-control" name="tipe">
                                    <option value="">-- pilih tipe --</option>
                                    <?php
                                    foreach ($tp as $k => $l) {
                                        # code...
                                        echo '<option value="'.$k.'">'.$l.'</option>';
                                    }
                                    ?>
                                    </select>
                                    <div class="form-control-focus"> </div>
                                </div>
                            </div>

                            <div class="form-group form-md-line-input">
                                <label class="col-md-3 control-label" for="form_control_1">Status
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-9">
                                    <select class="form-control" name="status">
                                    <option value="">-- pilih status --</option>
                                    <?php
                                    foreach ($st as $s => $sl) {
                                        # code...
                                        echo '<option value="'.$s.'">'.$sl.'</option>';
                                    }
                                    ?>
                                    </select>
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


<script src="<?php echo base_url() ?>assets/global/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
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

    $(function() {
        CKEDITOR.replace( 'deskripsi' );
        setInterval(loadText, 100);
    });

    function loadText() {
        var editorText = CKEDITOR.instances.deskripsi.getData();
        $("#des").val(editorText);
    }
</script>