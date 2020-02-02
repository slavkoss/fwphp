<?php
// J:\awww\www\fwphp\glomodul4\help_sw\test\AJAX\01_cars_diaz\tbl2_js_ctrl.php (display_cars.php)
  /** <!-- ************************************************************
    * called 
    *   from  T B L 1  
    *   and recursive from here (to execute code in T B L 3) (posting params)
  ************************************************************ --> */
require 'tbl3_modl.php'; //t b l 3  : php crud
?>

<script>
$(document).ready(
function()
{
  //https://www.w3schools.com/jquery/jquery_ref_events.asp
  var v_key_pressed = 0 ;

  var v_id      = '' ;
  var v_title   = '', v_title_name   = '';
  var v_user_id = '', v_user_id_name = '';

  var v_row = '';



          $( ".user_id" ).change(function() {
            alert( 'Handler for $( ".user_id" ).change() called.' );
          });

   /*<!-- ************************************************************
         1. code behind  R E A D  F I L T E R  F I E L D
  ************************************************************ -->*/
  //$("input").keydown(function(event){ $("div").html("Key: " + event.which); });
  $("#search").keydown(function(event){ //$("#search").html("Key: " + event.which);
     v_key_pressed = event.which ; //alert("Key pressed code: " + v_key_pressed) ; 
  });
  
  //listen if value is changed - char after char or after ENTER key
   $('#search').keyup(function(){
      if (v_key_pressed == 13) 
      {
        var search = $('#search').val();

        $.ajax({
          //see t b l 3 :  if( is set($_ POST['s earch']) ) { 
          url:'tbl2_js_ctrl.php', //was url:'index.php',
          data:{search:search},
          type: 'POST',
          success:function(data){
             if(!data.error) {
                $('#filtered_list').html(data);
             }
          }
        });

      }
  });


  /*<!-- ************************************************************
         2. code behind  C R E A T E  R O W  F O R M
  ************************************************************ -->*/
  $("#add_form").submit(function(evt){
      evt.preventDefault(); //disable button "Send"
      var postData = $(this).serialize(); //= all data from form add_form
      var url = $(this).attr('action'); //= form attribute "action", 
                                     //eg tbl2_js_ctrl.php or ad_cars.php
                   //alert(postData); //eg car_name=MERCEDES
      //see t b l 3 :  if(is set($_ POST['n ame'])) 
      $.post(url, postData, function(php_table_data)
      { //send postData to frm action
          $("#feedback").html('added postData='+postData
              +' php_table_data='+php_table_data); //php returned php_table_data=car-result
          $("#add_form")[0].reset(); //clear frm flds after crerec
      });
  });




     /*<!-- ************************************************************
       3. Extract user changed flds values for U p d a t e  Button  F n
          Thic code executes after each char typed !
    ************************************************************ -->*/
        $(".name_input").on('input', function(){
           v_title      = v_row['title']      = $(this).val();
           v_title_name = v_row['title_name'] = "name" ; 
                //WORKS : or $(this).prop("name"); //or attr("name")
                               if('') alert( 'CURRENT IN LOOP (not 1st) '
                                   +'v_title= '+ v_title
                                   +', v_title_name= '+ v_title_name
                               );
        });
        $(".user_id_input").on('input', function(){
           v_user_id      = v_row['user_id']      = $(this).val();
           v_user_id_name = v_row['user_id_name'] = "user_id" ; 
                //here is NOT WORKING $(this).prop("user_id"); //or attr("user_id")
                               if('') alert( 'CURRENT IN LOOP (not 1st) '
                                   +'v_user_id= '+ v_user_id
                                   +', v_user_id_name= '+ v_user_id_name
                               );
        });

     /*<!-- ************************************************************
       4. B u t t o n s  c r u d  j s  c a l l s
    ************************************************************ -->*/

       // *********** U p d a t e t b l  Button  F n *************
       $(".update_tblr").on('click', function(){
          // $(this).attr('idtoupd') (and class '.' ?) is in tbl3_modl.php php loop, 
          // id '#' is not!!
          var v_id = v_row['id'] = $(this).attr('idtoupd') ; //v_ row=v_ row.s erialize();
          
          var v_confirm = '';
          if (v_title_name || v_user_id_name) { 
            v_confirm = confirm('Update row id=' + v_id
              + (v_title_name ? ' fld '+v_title_name + ' to \'' + v_title+'\' ' : '' )
              + (v_user_id_name ? ' fld '+v_user_id_name + ' to \'' + v_user_id +'\' ' : '' )
          ) ; } else alert('Nothing changed - nothing to save !');

          if( v_confirm )
          {
              $.post(
                //see t b l 3 :  
                "tbl2_js_ctrl.php" //execute server script sending to it params :
                //, { row: v_row, id: v_id, title: v_title, changerow: 'changer' } 
                , {   row: v_row, id: v_id, title: v_title, user_id: v_user_id
                    , changerow: 'changer' 
                  } 
                , function(data){ //server script returned data to this JS
                     //alert("Record changed successfully");
                     $("#feedback").html('<i>id '+v_id+' changed, F5 to refresh page</i>'); //or $("#feedback").text(...
                     //$("#filtered_list").html("<i>Record changed successfully</i>"); 
                  }
              )
          } 
       });

       // *********** D e l e t e  Button  F n *************
       $(".delete").on('click', function(){ 
          var v_id = v_row['id'] = $(this).attr('idtodel') ;
          if(confirm('Are you sure you want to delete id=' + v_id)) {
              $.post( "tbl2_js_ctrl.php", {id: v_id, deleterow: 'deleter'}
                     , function(data){ //server script returned data to this JS
                     $("#feedback").html('<i>id '+v_id+' deleted, F5 to refresh page</i>'); 
                  }
                             //, function(data){$("#action-container").hide();}
              );
          }
       });
                    //      n a m e  (or  i d) l i n k
                    //is displayed dynamically, not available in DOM yet when we are clicking on it:
                    //echo "<a idtofrm='". $row['event_id']."'"." class='title-link' href='javascript:void(0)'>{$row['event_title']}</a></td>" ;
                           //var title = $("#name").val(); //alert(title); //not in php loop above but first in loop !!
                           //alert('New value='+$(".name_input").attr('value'));
                           //$(this).attr("nameval_befupd") ;
                              /* // $("#action-container").hide();
                              $(".title-link").on('click', function(){
                                  //$("#action-container").show();
                                  var v_id = $(this).attr('idtofrm');
                                  //$.post("process.php", {id: v_id}, function(data){
                                  $.post("tbl2_ ctr_js.php", {id: v_id}, function(data){
                                      //$("#action-container").html(data);
                                  });
                              }); */
}
); //e n d  $(document).ready(function() {
</script>
