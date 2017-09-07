<?php
// cek jika level admindesa 
// maka ada beberapa input yg readonly / disable
$readonly = '';
$disable = '';
if($this->session->userdata('level') == '0')
{
    $readonly = 'readonly="readonly"';
    $disable = 'disabled="disabled"';
}
?>

<!-- BEGIN CONTENT HEADER -->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-user-follow font-red"></i>
                    <span class="caption-subject font-red sbold uppercase">Sunting Pelayanan </span>
                </div>
                <div class="actions">
                    <a class="btn btn-default ajaxify pelayanan-back" href="<?php echo site_url('pelayanan'); ?>">
                        <i class="icon-reload"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form id="form" method="post" action="<?php echo site_url('pelayanan/save'); ?>" class="form-horizontal form-bordered pelayanan-form" enctype="multipart/form-data">
                    
                    <input class="pelayanan-id" name="id" type="hidden" value="<?php echo $id; ?>" />
                    
                    <div class="form-body">
                        
                        <div class="row">
                            
                            <div class="col-md-12">
                                
                                <div class="col-md-5">
                                    
                                    <div class="form-group form-md-line-input">
                                        <label class="control-label">Jenis Pelayanan
                                            <span class="required">*</span>
                                        </label>
                                        <select class="form-control pelayanan-jenis" required="required" <?php echo $disable; ?>>
                                            <option value="">
                                                - Pilih -
                                            </option>
                                            <?php if($data_jenis): ?>
                                                <?php foreach($data_jenis  as $jenis): ?>
                                                    <option value="<?php echo $jenis->jenis_pelayanan_id; ?>" <?php echo (check_array_exists($rowdat, 'parent_pelayanan') == $jenis->jenis_pelayanan_id) ? 'selected="selected"' : ''; ?>>
                                                        <?php echo $jenis->nama_pelayanan; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>

                                    <input id="pelayanan-jenis-hide" name="jenis_pelayanan_hide" type="hidden" value="<?php echo check_array_exists($rowdat, 'jenis_pelayanan_id'); ?>">
                                    
                                    <div class="form-group form-md-line-input">
                                        <label class="control-label">Nama Pelayanan
                                            <span class="required">*</span>
                                        </label>
                                        <select class="form-control pelayanan-name"  name="jenis_pelayanan" required="required" <?php echo $disable; ?>>
                                            <option value="">
                                                - Pilih -
                                            </option>
                                            
                                        </select>
                                    </div>
                                    
                                    <div class="form-group form-md-line-input">
                                        <label class="control-label">NIK
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" class="form-control form-control-focus" id="nik" placeholder="" name="nik" value="<?php echo check_array_exists($rowdat, 'nik')?>" required="required" <?php echo $readonly; ?>>
                                    </div>
                                    
                                    <div class="form-group form-md-line-input">
                                        <label class="control-label"> Nama
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" class="form-control form-control-focus" placeholder="" name="nama" value="<?php echo check_array_exists($rowdat, 'nama')?>" required="required" <?php echo $readonly; ?>>
                                    </div>
                                    
                                    <div class="form-group form-md-line-input">
                                        <label class="control-label">Keperluan
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" class="form-control form-control-focus" name="keperluan" value="<?php echo check_array_exists($rowdat, 'keperluan')?>" required="required" <?php echo $readonly; ?>>
                                    </div>
                                    
                                    <div class="form-group form-md-line-input">
                                        <label class="control-label">No. Telp
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" class="form-control form-control-focus" name="no_telp" placeholder="08xxxxxxxx" value="<?php echo check_array_exists($rowdat, 'no_telp')?>" required="required" <?php echo $readonly; ?>>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                </div>
                                
                                <div class="col-md-5">
                                    <div class="form-group form-md-line-input">
                                        <label class="control-label">RW
                                            <span class="required">*</span>
                                        </label>
                                        <?php
                                        $jabatan = get_user($this->session->userdata('user_id'), 'nm_jabatan');
                                        $no_rw = end( (explode(" ", $jabatan)) );
                                        
                                        // jika id = new maka no rw nya otomatis
                                        // jika bukan maka ambil dari check_array_exists
                                        if($id != 'new')
                                        {
                                            $no_rw = check_array_exists($rowdat, 'rw');
                                        }
                                        ?>
                                        
                                        <input type="text" class="form-control form-control-focus" id="rw" name="rw" value="<?php echo $no_rw; ?>" required="required" <?php echo $readonly; ?>>
                                    </div>
                                    
                                    <div class="form-group form-md-line-input">
                                        <label class="control-label">RT
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" class="form-control form-control-focus" id="rt" name="rt" value="<?php echo check_array_exists($rowdat, 'rt')?>" required="required" <?php echo $readonly; ?>>
                                    </div>
                                    
                                    <div class="form-group form-md-line-input">
                                        <label class="control-label">Berkas</label>
                                        <input type="file" class="form-control form-control-focus" name="berkas" value="<?php echo check_array_exists($rowdat, 'judul')?>">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label">Alamat
                                            <span class="required">*</span>
                                        </label>
                                        <textarea class="form-control" rows="6" name="alamat" required="required" <?php echo $readonly; ?>><?php echo check_array_exists($rowdat, 'alamat'); ?></textarea>
                                    </div>
                                    
                                    <?php if($this->session->userdata('level') == '0') :?>
                                    <div class="form-group form-md-line-input">
                                        <label class="control-label">Status Pelayanan
                                            <span class="required">*</span>
                                        </label>
                                        <select class="form-control" name="status" required="required">
                                            <option value="">
                                                - Pilih -
                                            </option>
                                            <?php if(get_status_pelayanan()): ?>
                                                <?php foreach(get_status_pelayanan()  as $key => $val): ?>
                                                    <option value="<?php echo $key; ?>" <?php echo (check_array_exists($rowdat, 'status') == $key) ? 'selected="selected"' : ''; ?>>
                                                        <?php echo $val; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>


                                    <?php endif; ?>
                                    
                                </div>
                                
                            </div>
                            
                            
                        </div>
                        
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-9">
                                <button type="submit" class="btn green">Save</button>
                                <button type="reset" class="btn default">Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
        <!-- END VALIDATION STATES-->
    </div>
</div>
<!-- END CONTENT HEADER -->


<script src="<?php echo base_url('assets/apps/scripts/admin/pelayanan.js?'.time_now()); ?>" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/global/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<script type="text/javascript">
// 
// handleForm
window.PELAYANAN.handleForm();

window.PELAYANAN.handleNamaPelayanan();
// 
// $('#forms').on('submit', function(e) {
//     e.preventDefault();
//     var pageContent = $('.page-content .page-content-body');
//     App.startPageLoading({animate: true});
//     $.ajax({
//         url : $(this).attr('action'),
//         type : "POST",
//         data : $(this).serialize(),
//         cache : false,
//         success : function(data) {
//             App.stopPageLoading();
//             pageContent.html(data);
//             Layout.fixContentHeight(); // fix content height
//             App.initAjax(); // initialize core stuff
//         },
//         error: function (data, ajaxOptions, thrownError) {
//             App.stopPageLoading();
//             pageContent.html('<h4>Could not load the requested content.</h4>');
//         }
//     });
// });
// 
// $(function() {
//     CKEDITOR.replace( 'deskripsi' );
//     setInterval(loadText, 100);
// });
// 
// function loadText() {
//     var editorText = CKEDITOR.instances.deskripsi.getData();
//     $("#des").val(editorText);
// }
</script>