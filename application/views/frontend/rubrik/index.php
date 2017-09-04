<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1> Rubrik Warga
            </h1>
        </div>
        <!-- END PAGE TITLE -->
    </div>
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="<?php echo base_url() ?>">Beranda</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">Rubrik Warga</span>
        </li>
    </ul>
    <!-- BEGIN CONTENT HEADER -->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light portlet-fit portlet-form bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-layers font-green"></i>
                        <span class="caption-subject font-green sbold uppercase">Rubrik Warga Desa Tani Mulya</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    <form class="rubrik-form" method="post" action="<?php echo site_url('page/rubrik_save') ?>">
                        
                        
                        <div class="form-body">
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="alert alert-info">
                                            Silahkan isi data dibawah ini,  untuk mengirim Rubrik ke Desa.
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    
                                    <div class="form-group form-md-line-input">
                                        <label>Nama Lengkap
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="name" id="name" required="required">
                                        <!-- <span class="help-block">Silahkan masukan username anda</span> -->
                                    </div>
                                    <div class="form-group form-md-line-input">
                                        <label>No. Telp
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="no_telp" id="no_telp" autocomplete="off" required="required" placeholder="0858xxxxxxxx">
                                        <!-- <span class="help-block">Silahkan masukan password anda</span> -->
                                    </div>
                                    
                                    <div class="form-group form-md-line-input">
                                        <img class="rubrik-captcha" src="<?php echo site_url('captcha'); ?>">
                                        
                                        <a class="btn btn-default rubrik-reload-captcha" href="<?php echo site_url('captcha'); ?>" title="reload captcha">
                                            <i class="icon-reload"></i>
                                        </a>
                                        <br />
                                        <label>Captcha
                                            <span class="required">*</span>
                                        </label>
                                        <input class="form-control" name="captcha" type="text" required="required" autocomplete="off" />
                                    </div>
                                </div>
                                
                                <div class="col-md-8">                                    
                                    
                                    <div class="form-group">
                                        <label>Pesan Anda</label>
                                        <textarea class="form-control" name="pesan" id="pesan" required="required"></textarea>
                                        <!-- <span class="help-block">Silahkan masukan username anda</span> -->
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn blue"> KIRIM</button>
                                    <button type="reset" class="btn default">BATAL</button>
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
</div>

<!-- custom css -->
<link href="<?php echo base_url('assets/apps/css/admin/style.css') ?>" rel="stylesheet" type="text/css" />

<!-- notify -->
<link href="<?php echo base_url('bower_components/notify/notify.css') ?>" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url('bower_components/notify/notify.js') ?>" type="text/javascript"></script>

<!-- Ajax Form -->
<script src="<?php echo base_url('bower_components/jquery-form/dist/jquery.form.min.js') ?>" type="text/javascript"></script>

<!-- validation -->
<script src="<?php echo base_url() ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>

<!-- ckeditor -->
<script src="<?php echo base_url() ?>bower_components/ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>bower_components/ckeditor/adapters/jquery.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/apps/scripts/frontend/ckeditor_custom.js" type="text/javascript"></script>

<!-- rubrik -->
<script src="<?php echo base_url() ?>assets/apps/scripts/frontend/rubrik.js" type="text/javascript"></script>
<script type="text/javascript">
    window.CKEDITOR_APP.init('textarea', 'standard');
    window.RUBRIK.handleForm();
</script>
