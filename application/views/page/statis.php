
    <!-- BEGIN CONTENT HEADER -->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light portlet-fit portlet-form bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-user-follow font-red"></i>
                        <span class="caption-subject font-red sbold uppercase">Form edit konten</span>
                    </div>
                    <div class="actions">
                        <a class="btn green-haze btn-outline btn-circle btn-sm ajaxify" href="<?php echo site_url('action/hapus_statis/'.$rowdat->statis_id) ?>"> 
                        <i class="fa fa-times"></i> Hapus Halaman </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <?php echo $this->session->flashdata('pesan') ?>
                    <!-- BEGIN FORM-->
                    <form id="form" method="post" enctype="multipart/form-data" action="<?php echo site_url('action/statis/'.$rowdat->statis_id) ?>" class="form-horizontal form-bordered">
                        <div class="form-body">
                            <div class="form-group form-md-line-input">
                                <label class="col-md-3 control-label" for="form_control_1">Judul
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-9">
                                    <input type="hidden" name="foto" value="<?php echo $rowdat->foto ?>">
                                    <input type="text" class="form-control" placeholder="judul" name="judul" value="<?php echo $rowdat->judul ?>">
                                    <div class="form-control-focus"> </div>
                                </div>
                            </div>

                            <div class="form-group form-md-line-input">
                                <label class="col-md-3 control-label" for="form_control_1">Deskripsi
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="6">
                                    <?php echo $rowdat->deskripsi ?>                                    
                                    </textarea>
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

                            <div class="form-group">
                                <label class="control-label col-md-3"></label>
                                <div class="col-md-3">
                                    <?php
                                    if($rowdat->foto!="") { 
                                        echo "<img src='".base_url('uploads/statis/'.$rowdat->foto)."' class='img-responsive img-thumbnail'>";
                                        echo '<a href="'.site_url('action/statis_gambar/'.$rowdat->statis_id).'" class="ajaxify">hapus gambar</a>';
                                    }
                                    ?>
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