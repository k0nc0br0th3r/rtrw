window.PELAYANAN = (function($) {
    return {
        
        // variable
        elForm : '.pelayanan-form',
        elBack : '.pelayanan-back',
        elDelete : '.pelayanan-delete',
        
        elJenisPelayanan : '.pelayanan-jenis',
        elNamaPelayanan : '.pelayanan-name',
        urlGetNamaPelayanan : window.APP.siteUrl + 'pelayanan/get_data_name',
        
        // handle penyimpanan data
        handleForm : function() {
            var parentThis = this;
            
            // validate
            $(parentThis.elForm).validate({
                errorElement : 'div',
                rules : {
                    nik : {
                        minlength : 16,
                        number : true
                    },
                    rw : {
                        minlength : 2,
                        number : true
                    },
                    rt : {
                        minlength : 2,
                        number : true
                    },
                }
            });
            
            // ajaxform
            $(parentThis.elForm).ajaxForm({
                dataType : 'json',
                beforeSend : function() {
                    // block UI
                    $(parentThis.elForm).block({
						message: '<h4>Harap tunggu..</h4>'
		            });
                },
                success : function(response) {
                    $.notify(response.message, response.status);
                    
                    $(parentThis.elForm).unblock();
                    
                    // redirect to list berita jika success
                    if(response.status == 'success') {    
                        setTimeout(function() {
                            // $(parentThis.elBack).click();
                        }, 1000);
                    }
                }
            });
        },
        
        // hapus data
        handleDelete : function() {
            var parentThis = this;
            
            $(parentThis.elDelete).click(function() {
                if(confirm('Apakah anda akan menghapus ini ?')) {
                    $.ajax({
                        url : window.APP.siteUrl + 'news/delete',
                        type : 'post',
                        dataType : 'json',
                        data : {
                            id : $(this).attr('data-id')
                        },
                        success : function(response) {
                            $.notify(response.message, response.status);
                            
                            // redirect to list berita jika success
                            if(response.status == 'success') {    
                                setTimeout(function() {
                                    $(parentThis.elBack).click();
                                }, 1000);
                            }
                        }
                    });
                }
                
            });
        },
        
        // get data nama pelayanan ketika memilih jenis
        handleNamaPelayanan : function() {
            var parentThis = this;
            
            $(parentThis.elJenisPelayanan).change(function() {
                $.ajax({
                    url : parentThis.urlGetNamaPelayanan,
                    type : 'post',
                    dataType : 'json',
                    data : {
                        id : $(this).val()
                    },
                    success : function(response) {
                        
                        var html = '';
                        for(var row in response) {
                            html += '<option value="'+response[row]['jenis_pelayanan_id']+'">'+response[row]['nama_pelayanan']+'</option>';
                        }
                        
                        $(parentThis.elNamaPelayanan).html(html);
                        
                        $(parentThis.elForm).valid();
                    }
                })
            });
        }
    }
})(jQuery);