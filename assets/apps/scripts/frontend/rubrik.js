/**
 * Javascript Rubrik
 * 
 * @author Hikmahtiar <hikmahtiar.cool@gmail.com>
 */

window.RUBRIK = (function($) {
    return {
        // variable
        elForm : '.rubrik-form',
        elImgCaptcha : '.rubrik-captcha',
        elReloadImgCaptcha : '.rubrik-reload-captcha',
        elBox : '.box-rubrik',
        elBtnMore : '.btn-rubrik-more',
        
        handleForm : function() {
            var parentThis = this;
            
            // validate
            $(parentThis.elForm).validate({
                errorElement : 'div',
                ignore: [],
                rules : {
                    no_telp : {
                        minlength : 10,
                        number : true
                    },
                    pesan :{
                         required: function() {
                             CKEDITOR.instances.pesan.updateElement();
                         },
                    }
                },
                messages: {
                    pesan : {
                        required:"Please enter Text",
                    }
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
                    
                    if(response.status == 'success') {
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                    }
                }
            });
            
            parentThis.handleCaptcha();
        },
        
        handleCaptcha : function() {
            var parentThis = this;
            
            // ketika reload di klik
            $(parentThis.elReloadImgCaptcha).click(function(e) {
                e.preventDefault();
                var _this = this;
                
                // merubah img captcha
                d = new Date();
                $(parentThis.elImgCaptcha).attr('src', $(_this).attr('href') + '?' + d.getTime());
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