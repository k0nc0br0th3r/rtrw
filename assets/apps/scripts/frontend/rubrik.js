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
                // $(parentThis.elImgCaptcha).attr('src', $(_this).attr('href'));
                $(parentThis.elImgCaptcha).remove();
                
                // create ulang captcha
                d = new Date();
                $(parentThis.elReloadImgCaptcha).before(' <img class="rubrik-captcha" src="'+ $(_this).attr('href') +'?'+d.getTime()+'"> ');
            });
        }
        
    }
})(jQuery);