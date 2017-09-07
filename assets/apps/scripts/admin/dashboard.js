window.DASHBOARD = (function($) {
    return {
        
        // variable
        
        // handle count
        handleCount : function(url, elbox) {            
            $.ajax({
                url : url,
                type : 'post',
                dataType : 'json',
                success : function(response) {
                    $(elbox).append('<span data-counter="counterup" data-value="'+ response.count +'">'+ response.count +'</span>');
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