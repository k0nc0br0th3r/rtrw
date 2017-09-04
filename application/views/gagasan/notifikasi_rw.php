<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
    <i class="icon-bulb"></i>
    <span class="badge badge-danger"> <?php echo $list->num_rows() ?> </span>
</a>
<ul class="dropdown-menu">
    <li class="external">
        <h3>Pesan yang belum dibaca</h3>
        <a class="ajaxify_mn" href="<?php echo site_url('page/gagasan') ?>">lihat</a>
    </li>
    <li>
        <ul class="dropdown-menu-list scroller" style="height: 250px; overflow: auto;" data-handle-color="#637283">
        <?php
        if($list->num_rows()>0) {
            foreach ($list->result() as $rows) {
                echo '<li>
                <a href="'.site_url('gagasan/detail/'.$rows->id).'" class="ajaxify_mn">
                    <span class="photo">
                        <img src="'.base_url('uploads/profile/avatar9.jpg').'" class="img-circle"> </span>
                    <span class="subject">
                        <span class="from"> '.$rows->nama_lgkp.' </span>
                        <span class="time">  </span>
                    </span>
                    <span class="message"> '.strip_tags($rows->balasan).'... </span>
                </a>
                </li>';
            }
        } else {
            echo '<li>
                <a href="javascript:;">
                    <span class="details">
                        <span class="label label-sm label-icon label-warning">
                            <i class="fa fa-bell"></i>
                        </span> Belum ada balasan terbaru. </span>
                </a>
            </li>';
        }   
        ?>
        </ul>
    </li>
</ul>

<script type="text/javascript">    
    $('.ajaxify_mn').click(function(e) {
        e.preventDefault();
        App.scrollTop();
        var url = $(this).attr("href");
        Layout.loadAjaxContent(url, $(this));
    });
</script>