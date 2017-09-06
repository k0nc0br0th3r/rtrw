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
                        
                        $(elbox).append('<span data-counter="counterup" data-value="'+ response.count +'">0</span>');
                    
                }
            });
        },


        handleClickNotif : function(elmenu) {
            $(elmenu).click(function () {
                $(this).find('span.badge').hide();
            });
        },

        handleCounterUp : function() {
            $("[data-counter='counterup']").counterUp({
                delay: 10,
                time: 1000
            });
        }

    }
})(jQuery);