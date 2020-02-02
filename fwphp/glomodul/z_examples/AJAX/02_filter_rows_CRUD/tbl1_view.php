<!--
  J:\awww\www\fwphp\glomodul4\help_sw\test\AJAX\01_cars_diaz\tbl1_view.php
  http://dev1:8083/fwphp/glomodul4/help_sw/test/AJAX/01_cars_diaz/test/ 
-->

<?php
  hdr_pge('AJAX filter & crud');
?>
  <!--div id="container" class="col-xs-6 col-xs-offset-3"-->
<div class="container">

    <div class="row">
    <!-- *****************************************************************
    1. F I L T E R  F I E L D  - AJAX filters r o w s
    ***************************************************************** -->
      <div class="col-12">
        <!--p>Filter rows (type string, key ENTER or chk box for each typed char)</p-->
        <input class='form-control' type="text" name='search' id='search' 
               placeholder='Filter rows (type string, then key ENTER)' autofocus>

        <h4 class="bg-success" id="filtered_list"></h4>
      </div>
    </div>

    <div class="row">
    <!-- *****************************************************************
           2. A D D  F O R M  - AJAX in tbl2_ js_ctrl.php adds record
    ***************************************************************** -->
    <div class="col-12">
      <form method="post" id="add_form" class="col-x-6" action="tbl2_js_ctrl.php">
          <div class="form-group">
            <label for="name"><b>Add msg</b> 
               (F5 to refresh page, possible is automatic r. eg each second)</label>
            <input type="text" name="name" class="form-control" required>
          </div>

          <div class="form-group">You can:&nbsp;
             <input type="submit" class="btn btn-primary" 
                    value="add row"> / del / upd or filter rows or
             <input type="submit" class="btn btn-primary" value="add row form">

             <br /><span id="feedback"><i></i></span>
          </div>
      </form>
    </div>
    
    </div>

    <div class="row">
    <!-- *****************************************************************
           3. O U T  T B L  C O N T A I N E R  - A J A X  FILLS IT
    ***************************************************************** -->
        <div class="col-12">
          <table class="table">
             <thead><tr><th>Id</th><th>Name</th><th>User</th></tr></thead>

             <tbody id="tblrows"></tbody>

          </table>
        </div>
                <!--div class="col-xs-6">
                    <div id="action-container"></div>
                </div-->  <!--action- container is toolbar at first row: buttons upd, del, close
                                    - bad for more rows -->
    </div><!-- SHOW  H D R  ROW -->

</div><!--e n d  div class="container"-->




<?php
   ftr_pge('zepto.min.js', '');


   //ob_start();
   //include($path);
   //$tblrows = ob_get_clean(); //echo $tblrows ;

?>

    <script LANGUAGE="JavaScript">
        /*<!-- *****************************************************************
               4. J S  C A L L S  P H P (P O S T I N G  P A R A M S)
                       ***** READ in tbody_ list *****
        ***************************************************************** -->*/
      $(document).ready(function()
      {
                      /*if ($('#tblrows').length !== 0) {
                        v_tblr = $('#tblrows');
                        v_tblr
                          //.hide()
                          .html(
                             //'WORKS : aaaaaaaaaaaaaaaaa '
                             "<?=substr($tblrows,0,100) //WORKS BUT AFTER 100 IS SOMETHING BAD ?>"
                           )
                          //.text('List of songs, songs count : ')
                          //.css('color', 'green')
                          //.fadeIn('slow');
                      } */
                      // or :
      
            //setInterval(function(){
            //   TblDispay();
            //}, 500);            // t b l D i s p l each half second
            //function TblDispay(){

                $.ajax({ // AJAX CHANGES ONLY TBODY PAGE PART !!
                  //see t b l 3 :  if(is set($_ POST['dspl tblbody']))
                  //crud php code (at script top) & js controller code :
                  url: 'tbl2_js_ctrl.php',  //was url:'index.php'
                  data:{dspltblbody:''},
                  type: 'POST',
                  success: function(tbody_data){ 
                    //tbody_data is from AJAX server script tbl3_modl.php
                    //included in tbl2_js_ctrl.php
                    if(!tbody_data.error) { // display tbody
                      $("#tblrows").html(tbody_data);
                    }
                  }
                });
            //}  


      
      }); // Document ready function end
    </script>

</html>






<?php
function hdr_pge($title)
{ ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <title><?=$title?></title>
  <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"-->
    <!--script src="//code.jquery.com/jquery-1.11.2.min.js"></script-->
      <!--153 kB, 31 kB, 2 kB-->
     <link rel="stylesheet" href="/zinc/themes/bootstrap/css/bootstrap.min.css">
     <!--for narrow devices !! -->
     <!--link rel="stylesheet" href="/zinc/themes/bootstrap/css/fontawesome.min.css"-->
     <link rel="stylesheet" href="/zinc/themes/bootstrap/css/raleway_300_400.css">
         <!--Custom CSS  FOR TOP TOOLBAR & color !! -->
     <!--link rel="stylesheet" href="<=$css>"-->
  </head>
  <body>
  <?php
}

function ftr_pge($jquery_lib, $custom_js)
{ ?>
    <!-- 85 kB, 20 kB, 57 kB -->  <!-- 26 kB, no menu for narrow devices zepto.min.js-->
    <!--script src="/zinc/themes/bootstrap/js/<=$jquery_lib>"></script-->
    <?php if ($jquery_lib) { ?> <script src="/zinc/themes/bootstrap/js/<?=$jquery_lib?>"></script> <?php } ?>
    <!--script src="/zinc/themes/bootstrap/js/jquery.min.js"></script-->
    <!--script src="/zinc/themes/bootstrap/js/popper.min.js"></script-->
    <script src="/zinc/themes/bootstrap/js/bootstrap.min.js"></script>
    <!--custom_js-->
    <?php if ($custom_js) { ?> <script src="<?=$custom_js?>"></script> <?php } ?>
    </body>
  <?php
}
