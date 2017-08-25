<!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?php echo base_url() ?>assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL STYLES -->

    <!-- BEGIN CONTENT HEADER -->
    <?php echo $this->session->flashdata('pesan') ?>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PROFILE SIDEBAR -->
            <div class="profile-sidebar">
                <!-- PORTLET MAIN -->
                <div class="portlet light profile-sidebar-portlet bordered">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic">
                        <img src="<?php echo base_url('uploads/profile/'.$this->session->userdata('foto')) ?>" class="img-responsive" alt=""> 
                    </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name"> <?php echo $this->session->userdata('nama_lgkp') ?> </div>
                        <div class="profile-usertitle-job"> <?php echo $jabatan ?> </div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">
                        <ul class="nav">
                            <li class="active">
                                <a class="ajaxify" href="<?php echo site_url('page/profile') ?>">
                                    <i class="icon-settings"></i> Account Settings </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-info"></i> Help </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END MENU -->
                </div>
                <!-- END PORTLET MAIN -->
            </div>
            <!-- END BEGIN PROFILE SIDEBAR -->
            <!-- BEGIN PROFILE CONTENT -->
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light bordered">
                            <div class="portlet-title tabbable-line">
                                <div class="caption caption-md">
                                    <i class="icon-globe theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_2" data-toggle="tab">Change Avatar</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_3" data-toggle="tab">Change Password</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane active" id="tab_1_1">
                                        <form role="form" action="<?php echo site_url('profile/update_acount') ?>" method="post">
                                            <div class="form-group">
                                                <label class="control-label">Username</label>
                                                <input type="text" value="<?php echo $row['username'] ?>" placeholder="Username" name="username" class="form-control" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">NIK</label>
                                                <input type="text" value="<?php echo $row['nik'] ?>" placeholder="NIK" name="nik" class="form-control" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">Nama Lengkap</label>
                                                <input type="text" value="<?php echo $row['nama_lgkp'] ?>" placeholder="Nama Lengkap" name="nama_lgkp" class="form-control" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">No Telepon</label>
                                                <input type="text" value="<?php echo $row['telp'] ?>" placeholder="No. Telp" name="telp" class="form-control" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">Email</label>
                                                <input type="text" value="<?php echo $row['email'] ?>" placeholder="Email" name="email" class="form-control" /> </div>
                                            <div class="margiv-top-10">
                                                <button type="submit" class="btn green"> Save Changes </button>
                                                <a href="javascript:;" class="btn default"> Cancel </a>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- END PERSONAL INFO TAB -->
                                    <!-- CHANGE AVATAR TAB -->
                                    <div class="tab-pane" id="tab_1_2">
                                        <p>Ukuran Foto harus 200x200 pixel agar mendapatkan gambar yang bagus.</p>
                                        <form action="<?php echo site_url('profile/update_avatar') ?>" role="form" enctype="multipart/form-data" method="post">
                                            <div class="form-group">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> 
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                    <div>
                                                        <span class="btn default btn-file">
                                                            <span class="fileinput-new"> Select image </span>
                                                            <span class="fileinput-exists"> Change </span>
                                                            <input type="file" name="avatar"> </span>
                                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                    </div>
                                                </div>
                                                <div class="clearfix margin-top-10">
                                                    <span class="label label-danger">NOTE! </span>
                                                    <span>&nbsp;Attached image thumbnail is supported in Latest Firefox and Chrome</span>
                                                </div>
                                            </div>
                                            <div class="margin-top-10">
                                                <button type="submit" class="btn green"> Submit </button>
                                                <a href="javascript:;" class="btn default"> Cancel </a>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- END CHANGE AVATAR TAB -->
                                    <!-- CHANGE PASSWORD TAB -->
                                    <div class="tab-pane" id="tab_1_3">
                                        <form action="<?php echo site_url('profile/update_password')?>" method="post" role="form">
                                            <div class="form-group">
                                                <label class="control-label">Current Password</label>
                                                <input type="password" name="pass_lama" class="form-control" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">New Password</label>
                                                <input type="password" name="pass_baru" class="form-control" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">Re-type New Password</label>
                                                <input type="password" name="pass_re" class="form-control" /> </div>
                                            <div class="margin-top-10">
                                                <button type="submit" class="btn green"> Change Password </button>
                                                <a href="javascript:;" class="btn default"> Cancel </a>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- END CHANGE PASSWORD TAB -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PROFILE CONTENT -->
        </div>
    </div>
    <!-- END CONTENT HEADER -->
