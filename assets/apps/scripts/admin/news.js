window.NEWS = (function($) {
    return {
        
        // variable
        elForm : '.news-form',
        elBack : '.news-back',
        elDelete : '.news-delete',
        elBox : '.box-news',
        elBtnMore : '.btn-news-more',

        // handle penyimpanan data
        handleForm : function() {
            var parentThis = this;
            
            // validate
            $(parentThis.elForm).validate({
                errorElement : 'div'
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

        // handle load more
        handleLoadmore : function() {
            var parentThis = this;

            $(parentThis.elBox).slice(0, 4).show();
            $(parentThis.elBtnMore).on('click', function (e) {
                e.preventDefault();
                $(parentThis.elBox + ":hidden").slice(0, 4).slideDown();

                if ( $(parentThis.elBox + ":hidden").length == 0) {
                    $(parentThis.elBtnMore).fadeOut('slow');
                }

                $('html,body').animate({
                    scrollTop: $(this).offset().top
                }, 1500);
            });
        }
    }
})(jQuery);