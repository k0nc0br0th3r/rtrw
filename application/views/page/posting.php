
    <!-- BEGIN CONTENT HEADER -->
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light portlet-fit portlet-datatable bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class=" icon-layers font-green"></i>
                        <span class="caption-subject font-green sbold uppercase">List <?php echo $ktg[$this->uri->segment(4)] ?></span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-default ajaxify" href="<?php echo site_url('posting/index/add/'.$this->uri->segment(4)) ?>">
                            <i class="icon-user-follow"></i> Add Posting
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <?php echo $this->session->flashdata('pesan') ?>
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="tbl_posting<?php echo $this->uri->segment(3)?>">
                        <thead>
                            <tr>
                                <th> NO. </th>
                                <th> Judul </th>
                                <!-- <th> Tipe </th> -->
                                <th> Status </th>
                                <th> Tgl entri </th>
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
                                <td> <?php echo $rows['judul'] ?> </td>
                                <!-- <td> <?php // echo $tp[$rows['tipe']] ?> </td> -->
                                <td> 
                                    <span class="label label-sm label-<?php echo ($rows['status']==0 ? "success" : "danger" ); ?>"> 
                                    <?php echo $st[$rows['status']] ?> 
                                    </span> 
                                </td>
                                <td> <?php echo $rows['tgl_entri'] ?> </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="<?php echo site_url('posting/index/edit/'.$this->uri->segment(4).'/'.$rows['berita_id']) ?>" class="ajaxify">
                                                    <i class="icon-note"></i> Edit Berita </a>
                                            </li>
                                            <li>
                                                <a href="" onclick="return confirm('apakah anda yakin??')" class="ajaxify">
                                                    <i class="icon-trash"></i> Hapus Berita </a>
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
    $("#tbl_posting<?php echo $this->uri->segment(3) ?>").dataTable({"bStateSave": true});
</script>