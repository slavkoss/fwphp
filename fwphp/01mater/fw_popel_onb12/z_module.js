// 
$(document).ready( function() 
{
    // super-simple JS  j q u e r y  demo
    var demoHeaderBox;

    if ($('#ajax_rcount_btn').length !== 0) 
    {
        // btn in read_ tbl.php :
        $('#ajax_rcount_btn').on('click', function()
        {
                      console.log('Call AJAX PHP method ajaxcountr: '+"\n"+MODULE_URL + '?i/ajaxcountr/');
                      //alert('Call AJAX PHP method ajaxcountr: '+"\n"+MODULE_URL + '?i/ajaxcountr/');
            // send ajax-request to this U R L: current-server.com/songs/ajax Get Stats
            // "MODULE_URL" is defined in views/_templates/ftr.php
                        //$.ajax(MODULE_URL + "?song/ajaxGetStats")
            $.ajax(MODULE_URL + "?i/ajaxcountr/")
                .done(function(result) {
                    // this will be executed if the ajax-call was successful
                    // here we get the feedback from the ajax-call (result) and show it in #ajax_rcount_box
                    $('#ajax_rcount_box').html(result);
                })
                .fail(function() {
                    // this will be executed if the ajax-call had failed
                })
                .always(function() {
                    // this will ALWAYS be executed, regardless if the ajax-call was success or not
                });
        });
    }


                  if ('') 
                  { // WORKS : demo how to create something via JS on the page
                    // added by public/js/module.js 
                    if ($('#ajax_pgtitle_box').length !== 0) {
                      demoHeaderBox = $('#ajax_pgtitle_box');
                      demoHeaderBox
                        //.hide()
                        .html('List of songs, songs count : ')
                        //.text('List of songs, songs count : ')
                        .css('color', 'green')
                        //.fadeIn('slow');
                    }
                  }

});
