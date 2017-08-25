
    <!-- BEGIN CONTENT HEADER -->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light portlet-fit portlet-form bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-user-follow font-red"></i>
                        <span class="caption-subject font-red sbold uppercase">Form entri gagasan</span>
                    </div>
                    <div class="actions">
                        <a class="btn green-haze btn-outline btn-circle btn-sm ajaxify" href="<?php echo site_url('page/gagasan') ?>"> 
                        <i class="icon-action-undo"></i> Kembali </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <?php echo $this->session->flashdata('pesan') ?>
                    <?php echo validation_errors('<p class="alert alert-danger">', '</p>'); ?>
                    <!-- BEGIN FORM-->
                    <form id="form" method="post" action="<?php echo site_url('gagasan/add/') ?>" class="form-horizontal form-bordered">
                        <div class="form-body">

                            <div class="form-group form-md-line-input">
                                <label class="col-md-3 control-label" for="form_control_1">Subjek
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Subjek" name="subjek" value="">
                                    <div class="form-control-focus"> </div>
                                </div>
                            </div>

                            <div class="form-group form-md-line-input">
                                <label class="col-md-3 control-label" for="form_control_1">Pesan
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="pesan" id="pesan" rows="6"></textarea>
                                    <textarea class="form-control hidden" name="des" id="des"></textarea>
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green">Kirim</button>
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
            data : new FormData(this),
            cache : false,
            contentType: false,
            processData: false,
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
        CKEDITOR.replace( 'pesan' );
        setInterval(loadText, 100);
    });

    function loadText() {
        var editorText = CKEDITOR.instances.pesan.getData();
        $("#des").val(editorText);
    }
</script>