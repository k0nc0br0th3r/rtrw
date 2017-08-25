/**
Custom module for you to write your own javascript functions
**/
var CustomAdmin = function () {

    var outsess = function (link) {
        var $countdown;
        var h = $(location).attr('host');
        $('body').append('');
                
        // start the idle timer plugin
        $.idleTimeout('#idle-timeout-dialog', '.modal-content button:last', {
            idleAfter: 60, // 5 seconds
            timeout: 10000, //10 seconds to timeout
            pollingInterval: 10, // 5 seconds
            keepAliveURL: link + 'dashboard/offsess',
            serverResponseEquals: 'OK',
            onTimeout: function(){
                window.location = link + 'action/logout';
            },
            onIdle: function(){
                // window.location = 'http://' + h + '/ci_rtrw/welcome';
                $('#idle-timeout-dialog').modal('show');
                $countdown = $('#idle-timeout-counter');

                $('#idle-timeout-dialog-keepalive').on('click', function () { 
                    $('#idle-timeout-dialog').modal('hide');
                });

                $('#idle-timeout-dialog-logout').on('click', function () { 
                    $('#idle-timeout-dialog').modal('hide');
                    $.idleTimeout.options.onTimeout.call(this);
                });
            },
            onCountdown: function(counter){
                $countdown.html(counter); // update the counter
            }
        });
    }

    var initTable2 = function () {

        var table = $('#sample_2');

        table.dataTable({

            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ records",
                "infoEmpty": "No records found",
                "infoFiltered": "(filtered1 from _MAX_ total records)",
                "lengthMenu": "Show _MENU_",
                "search": "Search:",
                "zeroRecords": "No matching records found",
                "paginate": {
                    "previous":"Prev",
                    "next": "Next",
                    "last": "Last",
                    "first": "First"
                }
            },

            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
            // So when dropdowns used the scrollable div should be removed. 
            //"dom": "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

            "bStateSave": false, // save datatable state(pagination, sort, etc) in cookie.
            "pagingType": "bootstrap_extended",

            "lengthMenu": [
                [10, 15, 20, -1],
                [10, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 10,
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [0]
            }, {
                "searchable": false,
                "targets": [0]
            }]
        });

    }

    var dropNotifGagasan = function (link) {
        var list = $('#header_gagasan_bar');
        var h = $(location).attr('host');
        var refresh_gagasan = setInterval(function () {
            $.ajax({
                url : link + "gagasan/list_notif",
                type : "POST",
                data : "read=0",
                success : function(data) {
                    list.html(data);
                }
            });
        }, 10000);
    }

    var dropNotifRubrik = function (link) {
        var list = $('#header_rubrik_bar');
        var h = $(location).attr('host');
        var refresh_rubrik = setInterval(function () {
            $.ajax({
                url : link + "rubrik/list_notif",
                type : "POST",
                data : "reply=0",
                success : function(data) {
                    list.html(data);
                }
            });
        }, 10000);
    }

    var MnAjaxContent = function () {
        // handle ajax link within main content
        $('.ajaxify_mn').on('click', function(e) {
            e.preventDefault();
            App.scrollTop();

            var url = $(this).attr("href");

            Layout.loadAjaxContent(url);
        });
    }

    var handleFormSend = function () {
        $('#formsend').on('submit', function(e) {
            e.preventDefault();
            var pageContent = $('.page-content .page-content-body');
            App.startPageLoading({animate: true});
            $.ajax({
                url : $(this).attr('action'),
                type : "POST",
                data : $(this).serialize(),
                cache : false,
                success : function(data) {
                    App.stopPageLoading();
                    pageContent.html(data);
                    Layout.fixContentHeight(); // fix content height
                    App.initAjax(); // initialize core stuff
                },
                error: function (data, ajaxOptions, thrownError) {
                    App.stopPageLoading();
                    pageContent.html('<h4>Could not load the requested content.</h4>');
                }
            });
        });
    }

    // public functions
    return {

        //main function
        init: function (link) {
            //initialize here something.
            // initTable2();   
            MnAjaxContent();
            // handleFormSend();
            dropNotifGagasan(link);   
            dropNotifRubrik(link);
            // outsess(link);
        }
    };

}();

// jQuery(document).ready(function() {    
//    CustomAdmin.init(); 
// });

/***
Usage
***/
//Custom.doSomeStuff();