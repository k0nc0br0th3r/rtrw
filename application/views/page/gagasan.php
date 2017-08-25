
    <!-- BEGIN CONTENT HEADER -->
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light portlet-fit portlet-datatable bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class=" icon-layers font-green"></i>
                        <span class="caption-subject font-green sbold uppercase">List Gagasan</span>
                    </div>
                    <div class="actions">
                    <?php
                    if($this->session->userdata('level')!=0) {
                    ?>
                        <a class="btn btn-default ajaxify" href="<?php echo site_url('gagasan/add/') ?>">
                            <i class="icon-user-follow"></i> Add Gagasan
                        </a>
                    <?php } ?>
                    </div>
                </div>
                <div class="portlet-body">
                    <?php echo $this->session->flashdata('pesan') ?>
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="tbl_gagasan">
                        <thead>
                            <tr>
                                <th> NO. </th>
                                <th> Subjek </th>
                                <th> Tgl kirim </th>
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
                                <td> <?php echo $rows['subjek'] ?> </td>
                                <td> <?php echo $rows['tgl_entri'] ?> </td>
                                <td> 
                                    <span class="label label-sm label-<?php echo ($rows['read']==0 ? "info" : "success" ); ?>"> 
                                    <?php echo $st[$rows['read']] ?> 
                                    </span> 
                                </td>
                                <td>
                                <span class="label label-sm label-<?php echo ($rows['reply']==0 ? "danger" : "primary" ); ?>"> 
                                    <?php echo $rp[$rows['reply']] ?> 
                                    </span> 
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                        <?php
                                        if($this->session->userdata('level')!=0) {
                                        ?>
                                            <li>
                                                <a href="<?php echo site_url('gagasan/detail/'.$rows['gagasan_id']) ?>" class="ajaxify">
                                                    <i class="icon-eye"></i> Lihat </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo site_url('gagasan/hapus/'.$rows['gagasan_id']) ?>" 
                                                onclick="return confirm('apakah anda yakin??')" class="ajaxify">
                                                    <i class="icon-trash"></i> Hapus </a>
                                            </li>
                                        <?php } else { ?>
                                            <li>
                                                <a href="<?php echo site_url('gagasan/reply/'.$rows['gagasan_id']) ?>" class="ajaxify">
                                                    <i class="icon-paper-plane"></i> Reply </a>
                                            </li>
                                        <?php } ?>
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
    $("#tbl_gagasan").dataTable({"bStateSave": true});
</script>