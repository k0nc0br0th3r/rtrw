
    <!-- BEGIN CONTENT HEADER -->
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light portlet-fit portlet-datatable bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class=" icon-layers font-green"></i>
                        <span class="caption-subject font-green sbold uppercase">List Rubrik Warga</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <?php echo $this->session->flashdata('pesan') ?>
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="tbl_rubrik">
                        <thead>
                            <tr>
                                <th> NO. </th>
                                <th> Nama </th>
                                <th> Tgl kirim </th>
                                <th> Pesan </th>
                                <th> Status </th>
                                <th> Balasan </th>
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
                                <td> <?php echo $rows['nama'] ?> </td>
                                <td> <?php echo $rows['tgl_kirim'] ?> </td>
                                <td> <?php echo substr($rows['komentar'], 0, 100) ?>.. </td>
                                <td> 
                                    <span class="label label-sm label-<?php echo ($rows['status']==1 ? "success" : "danger" ); ?>"> 
                                    <?php echo $st[$rows['status']] ?> 
                                    </span> 
                                </td>
                                <td> <span class="label label-sm label-<?php echo ($rows['reply']==1 ? "primary" : "warning" ); ?>"> 
                                    <?php echo $rp[$rows['reply']] ?> 
                                    </span> 
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="<?php echo site_url('rubrik/edit/'.$rows['rubrik_id']) ?>" class="ajaxify">
                                                    <i class="icon-note"></i> Detail </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo site_url('rubrik/hapus/'.$rows['rubrik_id']) ?>" 
                                                onclick="return confirm('apakah anda yakin??')" class="ajaxify">
                                                    <i class="icon-trash"></i> Hapus </a>
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
    $("#tbl_rubrik").dataTable({"bStateSave": true});
</script>