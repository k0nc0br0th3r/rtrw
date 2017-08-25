
    <!-- BEGIN CONTENT HEADER -->
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="portlet blue-hoki box">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-envelope-o"></i>Gagasan masuk </div>
                </div>
                <div class="portlet-body">
                    <div class="row static-info">
                        <div class="col-md-5 name"> Nama pengirim </div>
                        <div class="col-md-7 value"> <?php echo $rowdat->nama_lgkp ?> </div>
                    </div>
                    <div class="row static-info">
                        <div class="col-md-5 name"> Tgl kirim </div>
                        <div class="col-md-7 value"> <?php echo convert_tgl($rowdat->tgl_entri) ?> </div>
                    </div>
                    <div class="row static-info">
                        <div class="col-md-5 name"> Subjek </div>
                        <div class="col-md-7 value"> <?php echo $rowdat->subjek ?> </div>
                    </div>
                    <div class="row static-info">
                        <div class="col-md-5 name"> Pesan </div>
                        <div class="col-md-7 value"> <div class="well"><?php echo $rowdat->pesan ?></div> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-user-follow font-red"></i>
                        <span class="caption-subject font-red sbold uppercase">Form reply gagasan</span>
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
                    <form id="form" method="post" action="<?php echo site_url('gagasan/reply/'.$rowdat->id) ?>" class="form-bordered">
                    <input type="hidden" value="<?php echo $rowdat->id ?>" name="id">
                        <div class="form-body">

                            <div class="form-group">
                                <label for="form_control_1">Balasan
                                    <span class="required">*</span>
                                </label>
                                <textarea class="form-control" name="pesan" id="pesan" rows="6">
                                    <?php echo $rowdat->balasan ?>
                                </textarea>
                                <textarea class="form-control" name="des" id="des" style="display:none"></textarea>
                            </div>
                            
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn green">Kirim</button>
                            <button type="reset" class="btn default">Reset</button>
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
        CKEDITOR.replace( 'pesan' );
        setInterval(loadText, 100);
    });

    function loadText() {
        var editorText = CKEDITOR.instances.pesan.getData();
        $("#des").val(editorText);
    }
</script>