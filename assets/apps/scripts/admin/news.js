window.NEWS = (function($) {
    return {
        
        // variable
        elForm : '.news-form',
        elBack : '.news-back',
        elDelete : '.news-delete',
        
        // handle penyimpanan data
        handleForm : function() {
            var parentThis = this;
            
            // validate
            $(parentThis.elForm).validate()
            
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
        }
    }
})(jQuery);