<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>Dashboard | Sistem Informasi RTRW</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Sistem Informasi RT RW Desa Tanimulya" name="description" />
    <meta content="Imam Teguh" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url() ?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="<?php echo base_url() ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="<?php echo base_url() ?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    
    <!-- notify -->
    <link href="<?php echo base_url('bower_components/notify/notify.css') ?>" rel="stylesheet" type="text/css" />
    
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="<?php echo base_url() ?>assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>assets/layouts/layout4/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="<?php echo base_url() ?>assets/layouts/layout4/css/custom.css" rel="stylesheet" type="text/css" />
    
    <!-- custom css -->
    <link href="<?php echo base_url('assets/apps/css/admin/style.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>assets/layouts/layout4/css/custom.css" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" />
    
    <script type="text/javascript">
        window.APP = {
            siteUrl :"<?php echo site_url(); ?>",
            baseUrl : "<?php echo base_url(); ?>"
        }
    </script>
</head>
<!-- END HEAD -->

<body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
    <!-- BEGIN HEADER -->
    <div class="page-header navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner ">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="<?php echo site_url('dashboard') ?>">
                    <img src="<?php echo base_url() ?>assets/layouts/layout4/img/si-2.png" alt="logo" class="logo-default" style="margin:20px 10px 0" /> </a>
                <div class="menu-toggler sidebar-toggler">
                    <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                </div>
            </div>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN PAGE ACTIONS -->
            <!-- DOC: Remove "hide" class to enable the page header actions -->
            <?php echo tbl_alt_admin() ?>
            <!-- END PAGE ACTIONS -->
            <!-- BEGIN PAGE TOP -->
            <div class="page-top">
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <li class="separator hide"> </li>
                        <!-- BEGIN NOTIFICATION DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <!-- DOC: Apply "dropdown-hoverable" class after "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                        <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->
                        <?php
                        if($this->session->userdata('level')==0):
                        ?>
                        <!-- <li class="dropdown dropdown-extended dropdown-inbox dropdown-dark" id="header_rubrik_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-social-dropbox"></i>
                                <span class="badge badge-danger"> 0 </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="external">
                                    <h3>Rubrik yang belum dibalas</h3>
                                    <a href="<?php // echo site_url('page/rubrik') ?>">lihat</a>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                        <li>
                                            <a href="javascript:;">
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-warning">
                                                        <i class="fa fa-bell"></i>
                                                    </span> &nbsp;Belum ada rubrik terbaru. </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li> -->
                        <?php 
                        endif; 
                        ?>
                        <!-- END NOTIFICATION DROPDOWN -->
                        <!-- <li class="separator hide"> </li> -->
                        <!-- BEGIN INBOX DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <!-- <li class="dropdown dropdown-extended dropdown-inbox dropdown-dark" id="header_gagasan_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-bulb"></i> -->
                                <!-- notif -->
                                <!-- <span class="badge badge-danger">0</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="external">
                                    <h3>Pesan yang belum dibaca</h3>
                                    <a href="<?php // echo site_url('page/gagasan') ?>">lihat</a>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                        <li>
                                            <a href="javascript:;">
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-warning">
                                                        <i class="fa fa-bell"></i>
                                                    </span> &nbsp;Belum ada pesan terbaru. </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li> -->
                        <!-- END INBOX DROPDOWN -->
                        <!-- <li class="separator hide"> </li> -->
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-user dropdown-dark">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <span class="username username-hide-on-mobile"> 
                                <?php echo $this->session->userdata('nama_lgkp') ?> </span>
                                <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                                <img alt="user" class="img-circle" src="<?php echo base_url('uploads/profile/'.$this->session->userdata('foto')) ?>" /> 
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="<?php echo site_url('page/profile') ?>" class="ajaxify_mn">
                                        <i class="icon-user"></i> Profil </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('action/logout') ?>">
                                        <i class="icon-key"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END PAGE TOP -->
        </div>
        <!-- END HEADER INNER -->
    </div>
    <!-- END HEADER -->
    <!-- BEGIN HEADER & CONTENT DIVIDER -->
    <div class="clearfix"> </div>
    <!-- END HEADER & CONTENT DIVIDER -->
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN SIDEBAR -->
        <div class="page-sidebar-wrapper">
            <!-- BEGIN SIDEBAR -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <div class="page-sidebar navbar-collapse collapse">
                <!-- BEGIN SIDEBAR MENU -->
                <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                    <li class="nav-item start active">
                        <a href="<?php echo site_url('dashboard/content') ?>" class="ajaxify nav-link">
                            <i class="icon-home"></i>
                            <span class="title">Beranda</span>
                        </a>
                    </li>
                    <?php
                    if($this->session->userdata('level')==0):
                    ?>
                    <li class="nav-item">
                        <a href="<?php echo site_url('page/rubrik') ?>" class="ajaxify nav-link">
                            <i class="icon-social-dropbox"></i>
                            <span class="title">Rubrik warga</span>
                        </a>
                    </li>
                    <li class="heading">
                        <h3 class="uppercase">Edit Konten</h3>
                    </li>
                    <?php
                    echo menu_statis_belakang();
                    endif;
                    ?>
                    <li class="heading">
                        <h3 class="uppercase">Posting</h3>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo site_url('news') ?>" class="ajaxify nav-link news-back">
                            <i class="icon-layers"></i>
                            <span class="title">Berita</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo site_url('info') ?>" class="ajaxify nav-link info-back">
                            <i class="icon-speech"></i>
                            <span class="title">Pengumuman</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo site_url('page/gagasan/') ?>" class="ajaxify nav-link">
                            <i class="icon-bulb"></i>
                            <span class="title">Gagasan / Ide</span>
                        </a>
                    </li>
                    <?php if($this->session->userdata('level')==0): ?>
                    <li class="heading">
                        <h3 class="uppercase">User</h3>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo site_url('page/member') ?>" class="ajaxify nav-link">
                            <i class="icon-users"></i>
                            <span class="title">Member</span>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
                <!-- END SIDEBAR MENU -->
            </div>
            <!-- END SIDEBAR -->
        </div>
        <!-- END SIDEBAR -->
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <!-- BEGIN PAGE TITLE -->
                    <div class="page-title">
                        <h1>Home
                            <small>dashboard</small>
                        </h1>
                    </div>
                    <!-- END PAGE TITLE -->
                </div>
                <!-- BEGIN PAGE BREADCRUMB -->
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <a href="<?php echo base_url() ?>">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span class="active">Dashboard</span>
                    </li>
                </ul>
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content-body">
                    <?php 
                    $knt = 'page/dashboard';
                    if($this->session->userdata('level')!=0) {
                        $knt = 'page/timeline';
                    }
                    $this->load->view($knt); 
                    ?>
                </div>
                <!-- END CONTENT BODY -->
            </div>
        </div>
        <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <div class="page-footer">
        <div class="page-footer-inner"> 2017 &copy; Desa Tanimulya. 
            <a target="_blank" title="Program by" href="#">IT</a>
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
    <!-- END FOOTER -->

    <!--[if lt IE 9]>
    <script src="<?php echo base_url() ?>assets/global/plugins/respond.min.js"></script>
    <script src="<?php echo base_url() ?>assets/global/plugins/excanvas.min.js"></script> 
    <script src="<?php echo base_url() ?>assets/global/plugins/ie8.fix.min.js"></script> 
    <![endif]-->
    <!-- BEGIN CORE PLUGINS -->
    <script src="<?php echo base_url() ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    
    <!-- notify -->
    <script src="<?php echo base_url('bower_components/notify/notify.js') ?>" type="text/javascript"></script>
    
    <!-- Ajax Form -->
    <script src="<?php echo base_url('bower_components/jquery-form/dist/jquery.form.min.js') ?>" type="text/javascript"></script>    
    
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="<?php echo base_url() ?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/global/plugins/jquery-idle-timeout/jquery.idletimeout.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/global/plugins/jquery-idle-timeout/jquery.idletimer.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/global/scripts/datatable.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="<?php echo base_url() ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="<?php echo base_url() ?>assets/pages/scripts/custom-admin.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {    
           CustomAdmin.init("<?php echo base_url() ?>"); 
        });
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="<?php echo base_url() ?>assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
    <!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>