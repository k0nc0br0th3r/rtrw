<!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?php echo base_url() ?>assets/pages/css/profile-2.min.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL STYLES -->    
    <?php echo $this->session->flashdata('pesan') ?>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat2 bordered">
                <div class="display">
                    <div class="number">
                        <h3 class="font-green-sharp">
                            <span data-counter="counterup" data-value="7800">0</span>
                        </h3>
                        <small>SURAT KETERANGAN</small>
                    </div>
                    <div class="icon">
                        <i class="icon-envelope"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span style="width: 100%;" class="progress-bar progress-bar-success green-sharp">
                            <span class="sr-only"></span>
                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title"> permohonan surat keterangan </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat2 bordered">
                <div class="display">
                    <div class="number">
                        <h3 class="font-red-haze">
                            <span data-counter="counterup" data-value="1349">0</span>
                        </h3>
                        <small>SURAT PENGANTAR</small>
                    </div>
                    <div class="icon">
                        <i class="icon-envelope-letter"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span style="width: 100%;" class="progress-bar progress-bar-success red-haze">
                            <span class="sr-only"></span>
                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title"> permohonan surat pengantar </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat2 bordered">
                <div class="display">
                    <div class="number">
                        <h3 class="font-blue-sharp">
                            <span data-counter="counterup" data-value="567">0</span>
                        </h3>
                        <small>SURAT PERNYATAAN</small>
                    </div>
                    <div class="icon">
                        <i class="icon-envelope-open"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span style="width: 100%;" class="progress-bar progress-bar-success blue-sharp">
                            <span class="sr-only"></span>
                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title"> permohonan surat pernyataan </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat2 bordered">
                <div class="display">
                    <div class="number">
                        <h3 class="font-purple-soft count-rubrik">
                            <!-- <span data-counter="counterup" data-value="276">0</span> -->
                        </h3>
                        <small>RUBRIK WARGA</small>
                    </div>
                    <div class="icon">
                        <i class="icon-speech"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span style="width: 100%;" class="progress-bar progress-bar-success purple-soft">
                            <span class="sr-only"></span>
                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title"> suara warga desa </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT HEADER -->

    <div class="portlet-body profile">
        <div class="row">
            <div class="col-md-3">
                <ul class="list-unstyled profile-nav">
                    <li>
                        <img src="<?php echo base_url('uploads/profile/'.$this->session->userdata('foto')) ?>" class="img-responsive pic-bordered" alt="" />
                    </li>
                    <li>
                        <a href="javascript:;" style="font-size:12px;"> Login Time : <?php echo $this->session->userdata('logtime') ?> </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12 profile-info">
                        <h1 class="font-green sbold uppercase"><?php echo $this->session->userdata('nama_lgkp') ?></h1>
                        <p> <span class="sbold">Selamat datang di sistem informasi rt rw Desa Tanimulya</span>. sistem dan website ini dibuat untuk mempermudah kepada
                            RT maupun RW untuk melakukan komunikasi dengan Kepala Desa. Dan juga warga dapat melakukan komunikasi atau memberikan
                            gagasan dan ide kepada Kepala Desa untuk membangun desa yang lebih baik lagi.
                            </p>
                        <ul class="list-inline">
                            <li>
                                <i class="fa fa-map-marker"></i> Desa Tanimulya </li>
                            <li>
                                <i class="fa fa-calendar"></i> <?php echo date("d-m-Y") ?> </li>
                            
                        </ul>
                    </div>
                    <!--end col-md-8-->
                </div>
                <!--end row-->
                <div class="tabbable-line tabbable-custom-profile">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab_1_11" data-toggle="tab"> Pengumuman RT & RW </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1_11">
                            <div class="portlet-body">
                                <table class="table table-striped table-bordered table-advance table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                <i class="fa fa-user"></i> Pengirim </th>
                                            <th class="hidden-xs">
                                                <i class="fa fa-question"></i> Judul Pengumuman </th>
                                            <th>
                                                <i class="fa fa-calendar"></i> Tanggal </th>
                                            <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if($lastpengumuman):
                                        foreach ($lastpengumuman->result() as $rows) {
                                            # code..
                                    ?>
                                        <tr>
                                            <td>
                                                <?php echo get_user($rows->user_id, 'nama_lgkp') ?> 
                                            </td>
                                            <td class="hidden-xs"> <?php echo $rows->judul ?> </td>
                                            <td>
                                                <?php echo $rows->tgl_entri ?>
                                            </td>
                                            <td>
                                            <?php
                                            $span = 'label label-info label-sm';
                                            if ($rows->status <> 0) {
                                                $span = 'label label-success label-sm';
                                            }
                                            ?>
                                                <span class="<?php echo $span ?>"> <?php echo get_status($rows->status) ?> </span>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    else:
                                    ?>
                                        <tr>
                                            <td colspan="4" align="center">
                                                 Tidak ada pengumuman masuk
                                            </td>
                                        </tr>
                                    <?php
                                    endif;
                                    ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--tab-pane-->
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="<?php echo base_url() ?>assets/apps/scripts/admin/dashboard.js" type="text/javascript"></script>
<script type="text/javascript">
    var elBoxRubrik = '.count-rubrik';
    var UrlCountRubrik = window.APP.siteUrl + 'dashboard/count_rubrik';
    window.DASHBOARD.handleCount(UrlCountRubrik, elBoxRubrik);
    window.DASHBOARD.handleCounterUp;
</script>