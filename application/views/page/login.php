<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Login
                <small>sistem informasi rtrw</small>
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
            <span class="active">Login</span>
        </li>
    </ul>
    <!-- BEGIN CONTENT HEADER -->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light portlet-fit portlet-form bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-layers font-red"></i>
                        <span class="caption-subject font-red sbold uppercase">Login Sistem Informasi rtrw</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                            <i class="icon-reload"></i>
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <?php echo $this->session->flashdata('pesan') ?>
                    <!-- BEGIN FORM-->
                    <form method="post" action="<?php echo site_url('action/login') ?>" id="loginform">
                        <div class="form-body">
                            <div class="form-group form-md-line-input form-md-floating-label">
                                <input type="text" class="form-control" name="username" autocomplete="off">
                                <label>Username</label>
                                <!-- <span class="help-block">Silahkan masukan username anda</span> -->
                            </div>
                            <div class="form-group form-md-line-input form-md-floating-label">
                                <input type="password" class="form-control" name="password" autocomplete="off">
                                <label>Password</label>
                                <!-- <span class="help-block">Silahkan masukan password anda</span> -->
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn dark">LOGIN</button>
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
