    
    <!-- BEGIN CONTENT HEADER -->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light portlet-fit portlet-form bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-user-follow font-red"></i>
                        <span class="caption-subject font-red sbold uppercase">Form Halaman Baru</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <?php echo $this->session->flashdata('pesan') ?>
                    <!-- BEGIN FORM-->
                    <form id="form" method="post" enctype="multipart/form-data" action="<?php echo site_url('action/new_page/') ?>" class="form-horizontal form-bordered">
                        <div class="form-body">
                            <div class="form-group form-md-line-input">
                                <label class="col-md-3 control-label" for="form_control_1">Judul
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="judul" name="judul" value="">
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

                            <div class="form-group">
                                <label class="control-label col-md-3">Foto</label>
                                <div class="col-md-3">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="input-group input-large">
                                            <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                                <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                <span class="fileinput-filename"> </span>
                                            </div>
                                            <span class="input-group-addon btn default btn-file">
                                                <span class="fileinput-new"> Select file </span>
                                                <span class="fileinput-exists"> Change </span>
                                                <input type="file" name="upload"> </span>
                                            <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                        </div>
                                    </div>
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
        CKEDITOR.replace( 'deskripsi' );
        setInterval(loadText, 100);
    });

    function loadText() {
        var editorText = CKEDITOR.instances.deskripsi.getData();
        $("#des").val(editorText);
    }
</script>