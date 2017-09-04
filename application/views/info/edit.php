<!-- BEGIN CONTENT HEADER -->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-user-follow font-red"></i>
                    <span class="caption-subject font-red sbold uppercase">Sunting Pengumuman </span>
                </div>
                <div class="actions">
                    <a class="btn btn-default ajaxify info-back" href="<?php echo site_url('info'); ?>">
                        <i class="icon-reload"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form id="form" method="post" action="<?php echo site_url('info/save'); ?>" class="form-horizontal form-bordered info-form" enctype="multipart/form-data">
                    
                    <input name="id" type="hidden" value="<?php echo $id; ?>" />
                    
                    <div class="form-body">
                        <div class="form-group form-md-line-input">
                            <label class="col-md-3 control-label" for="form_control_1">Judul
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control form-control-focus" placeholder="judul" name="judul" value="<?php echo check_array_exists($rowdat, 'judul')?>" required="required">
                                <!-- <div class="form-control-focus"> </div>                                     -->
                            </div>
                        </div>
                        
                        <!-- jika gambar ada -->
                        <?php 
                            $link = dir_upload('uploads/info/', 'link'); 
                            $path = dir_upload('uploads/info/', 'path'); 
                            $gambar = check_array_exists($rowdat, 'gambar'); 
                        ?>
                        <?php if(file_exists($path.$gambar) && ($gambar != '') ): ?>
                            <div class="form-group form-md-line-input">
                                <label class="col-md-3 control-label" for="form_control_1"> Gambar Saat ini
                                 </label>
                                <div class="col-md-9">
                                    <img src="<?php echo $link.$gambar; ?>" style="width: 100px;">                                    
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <div class="form-group form-md-line-input">
                            <label class="col-md-3 control-label" for="form_control_1"> Gambar
                                <!-- <span class="required">*</span> -->
                            </label>
                            <div class="col-md-9">
                                <input type="file" class="form-control" placeholder="judul" name="gambar">
                                <div class="form-control-focus"> </div>                                    
                            </div>
                        </div>

                        <div class="form-group form-md-line-input">
                            <label class="col-md-3 control-label" for="form_control_1">Deskripsi
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="6" required="required"><?php echo check_array_exists($rowdat, 'deskripsi')?></textarea>
                                <textarea class="form-control" name="des" id="des" style="display:none"></textarea>
                            </div>
                        </div>

                        <div class="form-group form-md-line-input">
                            <label class="col-md-3 control-label" for="form_control_1">Status
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-9">
                                <select class="form-control" name="status" required="required">
                                <option value="">-- pilih status --</option>
                                <?php foreach(get_status() as $key_status => $row_status) : ?>
                                    <option value="<?php echo $key_status; ?>" <?php echo ($key_status == check_array_exists($rowdat, 'status')) ? 'selected="selected"' : '' ?>>
                                        <?php echo $row_status; ?>
                                    </option>
                                <?php endforeach; ?>
                                </select>
                                <!-- <div class="form-control-focus"> </div> -->
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


<script src="<?php echo base_url('assets/apps/scripts/admin/info.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/global/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<script type="text/javascript">

// handleForm
window.INFO.handleForm();

$('#forms').on('submit', function(e) {
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