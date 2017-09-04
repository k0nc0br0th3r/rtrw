<!-- BEGIN CONTENT HEADER -->
<div class="row">
    <div class="col-md-12 col-sm-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light portlet-fit portlet-datatable bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class=" icon-layers font-green"></i>
                    <span class="caption-subject font-green sbold uppercase">List Pengumuman</span>
                </div>
                <div class="actions">
                    <a class="btn btn-default ajaxify" href="<?php echo site_url('news/edit/new') ?>">
                        <i class="icon-user-follow"></i> Tambah Pengumuman
                    </a>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="news-table">
                    <thead>
                        <tr>
                            <th> NO. </th>
                            <th> Judul </th>
                            <th> Gambar </th>
                            <!-- <th> Tipe </th> -->
                            <th> Status </th>
                            <th> Tgl entri </th>
                            <th> Tools </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if($listdata) {
                        $no = 1;
                        foreach ($listdata as $rows) {
                            # code...
                    ?>
                        <tr class="odd gradeX">
                            <td> <?php echo $no ?> </td>
                            <td> <?php echo $rows['judul'] ?> </td>
                            <td>
                                <?php 
                                // jika gambar tidak kosong
                                if(file_exists($dir_upload['path'].$rows['gambar']) && ($rows['gambar'] != '') ) :
                                ?>
                                    <img src="<?php echo $dir_upload['link'].$rows['gambar']; ?>" style="width: 100px;"/>
                                <?php endif; ?>
                            </td>
                            <!-- <td> <?php echo $tp[$rows['tipe']] ?> </td> -->
                            <td> 
                                <span class="label label-sm label-<?php echo ($rows['status']==0 ? "danger" : "success" ); ?>"> 
                                <?php echo get_status($rows['status']); ?> 
                                </span> 
                            </td>
                            <td> <?php echo $rows['tgl_entri'] ?> </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="<?php echo site_url('news/edit/'.$rows['pengumuman_id']) ?>" class="ajaxify">
                                                <i class="icon-note"></i> Edit Pengumuman </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" class="news-delete" data-id="<?php echo $rows['pengumuman_id']; ?>">
                                                <i class="icon-trash"></i> Hapus Pengumuman 
                                            </a>
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
<script src="<?php echo base_url('assets/apps/scripts/admin/news.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.NEWS.handleDelete();
    $("#news-table").dataTable({"bStateSave": true});
</script>