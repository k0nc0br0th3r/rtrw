<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
    <i class="icon-bulb"></i>
    <span class="badge badge-danger"> <?php echo $list->num_rows() ?> </span>
</a>
<ul class="dropdown-menu">
    <li class="external">
        <h3>Pesan yang belum dibaca</h3>
        <a href="<?php echo site_url('page/gagasan') ?>">lihat</a>
    </li>
    <li>
        <ul class="dropdown-menu-list scroller" style="height: 250px; overflow: auto;" data-handle-color="#637283">
        <?php
        if($list->num_rows()>0) {
            foreach ($list->result() as $rows) {
                echo '<li>
                <a href="'.site_url('gagasan/reply/'.$rows->gagasan_id).'" class="ajaxify_mn">
                    <span class="photo">
                        <img src="'.base_url('uploads/profile/'.$rows->foto).'" class="img-circle"> </span>
                    <span class="subject">
                        <span class="from"> '.$rows->nama_lgkp.' </span>
                        <span class="time">  </span>
                    </span>
                    <span class="message"> '.$rows->subjek.'... </span>
                </a>
                </li>';
            }
        } else {
            echo '<li>
                <a href="javascript:;">
                    <span class="details">
                        <span class="label label-sm label-icon label-warning">
                            <i class="fa fa-bell"></i>
                        </span> &nbsp;Belum ada gagasan terbaru. </span>
                </a>
            </li>';
        }   
        ?>
        </ul>
    </li>
</ul>