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
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="pelayanan-table">
                    <thead>
                        <tr>
                            <th > NO. </th>
                            <?php if($this->session->userdata('level') == 0 ): ?>
                                <th> RW </th>
                            <?php endif ?>
                            <th> RT </th>
                            <th> NIK </th>
                            <th> Nama Lengkap </th>
                            <th> Keperluan </th>
                            <th> No. Telpon </th>
                            <th> Nama Layanan </th>
                            <th> Status </th>
                            <th> Tools </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; if($get_data) : ?>
                            <?php foreach($get_data as $row): ?>
                                <tr class="odd gradeX">
                                    <td align="right" style="width: 15px;"><?php echo $no;?></td>
                                    <?php if($this->session->userdata('level') == 0 ): ?>
                                        <td><?php echo $row->rw;?></td>
                                    <?php endif ?>
                                    <td><?php echo $row->rt;?></td>
                                    <td><?php echo $row->nik;?></td>
                                    <td><?php echo $row->nama;?></td>
                                    <td><?php echo $row->keperluan;?></td>
                                    <td><?php echo $row->no_telp;?></td>
                                    <td><?php echo $row->nama_pelayanan;?></td>
                                    <td style="font-size: 11px;"><?php echo get_status_pelayanan($row->status) ;?></td>
                                    <td>
                                        <a class="ajaxify btn btn-warning btn-sm" href="<?php echo site_url('pelayanan/edit/'.$row->pelayanan_id); ?>" title="Edit Data">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <?php if($this->session->userdata('level') > 0 ): ?>
                                            <a class="btn btn-danger btn-sm pelayanan-delete" title="Hapus Data" data-id="<?php echo $row->pelayanan_id; ?>">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            <?php $no++; endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>

<!-- END CONTENT HEADER -->
<script src="<?php echo base_url('assets/apps/scripts/admin/pelayanan.js?'.time_now()) ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.PELAYANAN.handleDelete();
    $("#pelayanan-table").dataTable({"bStateSave": true});
</script>