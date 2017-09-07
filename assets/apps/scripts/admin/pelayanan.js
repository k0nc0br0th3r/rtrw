window.PELAYANAN = (function($) {
    return {
        
        // variable
        elForm : '.pelayanan-form',
        elBack : '.pelayanan-back',
        elDelete : '.pelayanan-delete',
        
        elPelayananId : '.pelayanan-id',
        elNamaPelayanan : '.pelayanan-name',
        elJenisPelayanan : '.pelayanan-jenis',
        elJenisPelayananHide : '#pelayanan-jenis-hide',
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
                            $(parentThis.elBack).click();
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
                        url : window.APP.siteUrl + 'pelayanan/delete',
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

            // jika id != new
            // maka menjalankan get nama pelayanan

            var pelayananId = $(parentThis.elPelayananId).val();
            if(pelayananId != 'new') {
                getNamaPelayanan();
            }
            
            $(parentThis.elJenisPelayanan).change(function() {
                getNamaPelayanan();
            });

            function getNamaPelayanan() {
                $.ajax({
                    url : parentThis.urlGetNamaPelayanan,
                    type : 'post',
                    dataType : 'json',
                    data : {
                        id : $(parentThis.elJenisPelayanan).val()
                    },
                    success : function(response) {
                        
                        var html = '';
                        var selected = '';
                        for(var row in response) {

                            // jika sama dengan nama jenis pelayanan hide
                            // maka selected
                            if(response[row]['jenis_pelayanan_id'] == $(parentThis.elJenisPelayananHide).val()) {
                                selected = 'selected="selected"';
                            } else {
                                selected = '';
                            }

                            html += '<option value="'+response[row]['jenis_pelayanan_id']+'" '+selected+'>'+response[row]['nama_pelayanan']+'</option>';
                        }
                        
                        $(parentThis.elNamaPelayanan).html(html);
                        
                        $(parentThis.elForm).valid();
                    }
                });
            }
        }
    }
})(jQuery);