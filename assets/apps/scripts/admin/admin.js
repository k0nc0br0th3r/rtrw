window.ADMIN = (function($) {
    return {
        
        // variable
        
        
        // handle notif
        handleNotif : function(url, elmenu) {            
            $.ajax({
                url : url,
                type : 'post',
                dataType : 'json',
                success : function(response) {
                    if (response.count>=1) {
                        $(elmenu).append('<span class="badge badge-success">'+ response.count +'</span>');
                    }
                }
            });
        },


        handleClickNotif : function(elmenu) {
            $(elmenu).click(function () {
                $(this).find('span.badge').hide();
            });
        }


    }
})(jQuery);