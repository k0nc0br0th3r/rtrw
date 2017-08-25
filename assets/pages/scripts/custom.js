/**
Custom module for you to write your own javascript functions
**/
var Custom = function () {

    // private functions & variables
    var loginAction = function() {
        // for more info visit the official plugin documentation: 
        // http://docs.jquery.com/Plugins/Validation
        var form1 = $('#loginform');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            rules: {
                username: {
                    minlength: 6,
                    required: true
                },
                password: {
                    required: true,
                    minlength: 6
                }
            },

            invalidHandler: function(event, validator) { //display error alert on form submit              
                // success1.hide();
                // error1.show();
                App.scrollTo(error1, -100);
            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function(element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },

            submitHandler: function(form) {
                // success1.show();
                // error1.hide();
                form.url();
            }
        });
    }

    // public functions
    return {

        //main function
        init: function () {
            //initialize here something.
            loginAction();
        }
    };

}();

jQuery(document).ready(function() {    
   Custom.init(); 
});

/***
Usage
***/
//Custom.doSomeStuff();