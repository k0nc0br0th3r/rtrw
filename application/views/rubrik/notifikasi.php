<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
    <i class="icon-social-dropbox"></i>
    <span class="badge badge-danger"> <?php echo $list->num_rows() ?> </span>
</a>
<ul class="dropdown-menu">
    <li class="external">
        <h3>Rubrik yang belum dibalas</h3>
        <a href="<?php echo site_url('page/rubrik') ?>">lihat</a>
    </li>
    <li>
        <ul class="dropdown-menu-list scroller list-rubrik" style="height: 250px; overflow: auto;" data-handle-color="#637283">
        <?php
        if($list->num_rows()>0) {
            foreach ($list->result() as $rows) {
                echo '<li>
                <a href="'.site_url('rubrik/edit/'.$rows->rubrik_id).'" class="list_ajaxify_mn">
                    <span class="photo">
                        <img src="'.base_url('uploads/profile/avatar9.jpg').'" class="img-circle"> </span>
                    <span class="subject">
                        <span class="from"> '.$rows->nama.' </span>
                    </span>
                    <span class="message"> '.substr($rows->komentar, 0, 80).'... </span>
                </a>
                </li>';
            }
        } else {
            echo '<li>
                <a href="javascript:;">
                    <span class="details">
                        <span class="label label-sm label-icon label-warning">
                            <i class="fa fa-bell"></i>
                        </span> &nbsp;Belum ada rubrik terbaru. </span>
                </a>
            </li>';
        }   
        ?>
        </ul>
    </li>
</ul>
<script type="text/javascript">
    $('.list-rubrik').on('click', '.list_ajaxify_mn', function(e) {
        e.preventDefault();
        App.scrollTop();
        var url = $(this).attr("href");
        Layout.loadAjaxContent(url, $(this));
    });
</script>