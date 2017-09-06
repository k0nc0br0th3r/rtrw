<!-- BEGIN CONTENT HEADER -->
<div class="row">
    <div class="col-md-12 col-sm-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light portlet-fit portlet-datatable bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class=" icon-layers font-green"></i>
                    <span class="caption-subject font-green sbold uppercase">List Pelayanan</span>
                </div>
                <?php if($this->session->userdata('level') > 0 ): ?>
                <div class="actions">
                    <a class="btn btn-default ajaxify" href="<?php echo site_url('pelayanan/edit/new') ?>">
                        <i class="icon-user-follow"></i> Tambah Pelayanan
                    </a>
                </div>
                <?php endif ?>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="news-table">
                    <thead>
                        <tr>
                            <th> NO. </th>
                            <?php if($this->session->userdata('level') == 0 ): ?>
                                <th> RW </th>
                            <?php endif ?>
                            <th> RT </th>
                            <th> NIK </th>
                            <th> Nama Lengkap </th>
                            <th> Keperluan </th>
                            <th> No. Telpon </th>
                            <th> Jenis Layanan </th>
                            <th> Nama Layanan </th>
                            <th> Status </th>
                            <th> Tools </th>
                        </tr>
                    </thead>
                    <tbody>
                    
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>

<!-- END CONTENT HEADER -->
<!-- <script src="<?php echo base_url('assets/apps/scripts/admin/news.js') ?>" type="text/javascript"></script> -->
<script type="text/javascript">
    // window.NEWS.handleDelete();
    // $("#news-table").dataTable({"bStateSave": true});
</script>