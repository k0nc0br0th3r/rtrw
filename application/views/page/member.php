
    <!-- BEGIN CONTENT HEADER -->
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light portlet-fit portlet-datatable bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class=" icon-layers font-green"></i>
                        <span class="caption-subject font-green sbold uppercase">Data Member</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-default ajaxify" href="<?php echo site_url('member/add') ?>">
                            <i class="icon-user-follow"></i> Add Member
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <?php echo $this->session->flashdata('pesan') ?>
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="tbl_member">
                        <thead>
                            <tr>
                                <th> NO. </th>
                                <th> Username </th>
                                <th> Email </th>
                                <th> Nama Lengkap </th>
                                <th> Jabatan </th>
                                <th> Tools </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if($listdata->num_rows()>0) {
                            $no = 1;
                            foreach ($listdata->result_array() as $rows) {
                                # code...
                        ?>
                            <tr class="odd gradeX">
                                <td> <?php echo $no ?> </td>
                                <td> <?php echo $rows['username'] ?> </td>
                                <td> <?php echo $rows['email'] ?> </td>
                                <td> <?php echo $rows['nama_lgkp'] ?> </td>
                                <td> <?php echo $rows['nm_jabatan'] ?> </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="<?php echo site_url('member/edit/'.$rows['user_id']) ?>" class="ajaxify">
                                                    <i class="icon-note"></i> Edit Acount </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo site_url('member/hapus/'.$rows['user_id']) ?>" 
                                                onclick="return confirm('apakah anda yakin??')" class="ajaxify">
                                                    <i class="icon-trash"></i> Hapus Acount </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php
                            $no++;
                            }
                        }
                        ?>                
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
    <!-- END CONTENT HEADER -->

<script type="text/javascript">
    $("#tbl_member").dataTable({"bStateSave": true});
</script>