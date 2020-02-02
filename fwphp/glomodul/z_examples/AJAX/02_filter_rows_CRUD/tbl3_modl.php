<?php
// J:\awww\www\fwphp\glomodul4\help_sw\test\AJAX\01_cars_diaz\tbl3_modl.php
    /** <!-- ************************************************************
    *  CODE BEHIND :  C R U D  OF  D A T A  POSTED HERE ($_POST)  F R O M  J S 
    *  (ee from tbl2_js_ctrl.php IN WHICH THIS SCRIPT IS INCLUDED)
    *
    * A J A X  PHP SERVER CODE BEHIND HTML. Does CRUD, RETURNS HTML if needed 
    * (CAN NOT DISPLAY HTML!). 
    * (see goto endphp ; - which is instead many a j a x server scripts) 
    * json_encode($_REQUEST, JSON_PRETTY_PRINT)
    ************************************************************ -->*/

$connection = mysqli_connect('localhost', 'root', '','tema'); //include("db.php");
//see <tbody id="tblrows"></tbody> and $("#tblrows").html(tbody_data);


      /*<!-- ************************************************************
      1a. R E A D  -  A J A X  c r e  tbody_ data for T B L  B O D Y
          see <tbody id="tblrows"></tbody> and $("#tblrows").html(tbody_data);
      ************************************************************ -->*/

if(isset($_POST['dspltblbody']))
{
  $query = "SELECT * FROM events";
  $query_tbl = mysqli_query($connection, $query);
  if(!$query_tbl) { die("Query Failed" . mysqli_error($connection)); }
  while($row = mysqli_fetch_array($query_tbl)) 
  {
    ?><tr>
      <!-- //      i d  d i s p l a y e d -->
      <td><span class='row_id'><?=$row['event_id']?></span></td>

      <!-- // e n t e r a b l e  f l d  :  n a m e -->
      <td><input type='text' name='name' id='name' class='form-control name_input'
               value='<?=$row['event_title']?>' nameval_befupd='<?=$row['event_title']?>'
           > </td>
      <!-- // e n t e r a b l e  f l d  :  fk u s e r i d -->
      <td><input type='text' name='user_id' id='user_id' class='form-control user_id_input'
               value='<?=$row['user_id']?>' nameval_befupd='<?=$row['user_id']?>'
           > 

              <!--input class="target" type="text" value="Field 1"-->
              <select class="form-control user_id">
                <option value='<?=$row['user_id']?>' selected="selected">user_id from db
                               <?=$row['user_id']?></option>
                <option value="21">all other user_id from db (21)</option>
                <option value="25">all other user_id from db (25)</option>
              </select>

           </td>



      <!-- //     b u t t o n  u p d a t e  t b l r -->
      <td><input type='button' class='btn btn-success update_tblr' value='Upd'
                   title="idtoupd=<?=$row['event_id']?>"
                   idtoupd="<?=$row['event_id']?>"
            > </td>
      <!-- //     b u t t o n  u p d a t e  f o r m -->
      <td><input type='button' class='btn btn-success update_frm' value='Upd form'
                   title="idtoupd formular=<?=$row['event_id']?>"
                   idtoupd_frm="<?=$row['event_id']?>"
            > </td>
      <!-- //     b u t t o n  d e l e t e -->
      <td><input type='button' class='btn btn-danger delete' value='Del'
                   title="idtodel=<?=$row['event_id']?>"
                   idtodel='<?=$row['event_id']?>'
        ></td>
    </tr>
    <?php
  } //e n d  w h i l e
} //e n d  if(isset($_POST['dspltblbody']))




if( isset($_POST['search']) ) { 
     /*<!-- ************************************************************
           1b. code behind  R E A D  F I L T E R  F I E L D
    ************************************************************ -->*/
    if (!$_POST['search']) {goto endfn ;}

    $search = $_POST['search']; 
    $query = "SELECT * FROM events WHERE event_title LIKE '%$search%' ";
    $search_query = mysqli_query($connection,$query);
    if(!$search_query) { die('QUERY FAILED' . mysqli_error($connection)); }
    $count = mysqli_num_rows($search_query);    
    if($count <= 0) { echo $search ? "Not found \"'$search\"" : '' ; goto endfn ; } 

    while($row = mysqli_fetch_array($search_query)) {
      ?><ul class='list-unstyled'>
           <li><?="{$row['event_title']}"?></li>
       </ul><?php
    }
    endfn:
    goto endphp ; //exit(0) ; //behaves like separate s c r i p t search_M_V.php
} //e n d   isset($_POST['search'])



if(isset($_POST['name'])) 
{
     /*<!-- ************************************************************
           2. C R E A T E - code behind R O W  c r e  b u t t o n
    ************************************************************ -->*/
    $name = $_POST['name'];
    $query = "INSERT INTO events(event_title) VALUES('$name') ";
    $return = mysqli_query($connection, $query);
    if(!$return) {
       die("INSERT FAILED");
    }

    goto endphp ; //exit(0) ; //behaves like separate s c r i p t c reate.php
    //header("Location: index.php"); //see ob_start();
}




if(isset($_POST['id'])) 
{
  $idposted = mysqli_real_escape_string($connection, $_POST['id']);

   /*<!-- ************************************************************
         3. U P D A T E - code behind R O W  u p d  b u t t o n
   ************************************************************ -->*/
  if(isset($_POST['changerow'])) 
  {
    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $user_id =   mysqli_real_escape_string($connection, $_POST['user_id']);
    
    if ($title) $set = "event_title='".$title."'"; else $set = '';
    if ($user_id) {if ($title) $set = $set.','; $set = $set."user_id='".$user_id."'";}

    $query = "UPDATE events SET $set WHERE event_id = $idposted ";
                          //$query = "UPDATE events SET event_title='$title', user_id='$user_id' WHERE event_id = $idposted ";
     $result_set = mysqli_query($connection, $query);
     if(!$result_set) {
         die("U P D A T E  F A I L E D" . mysqli_error($connection));
     } 
  } //isset($_POST['c h a n g e r o w']
     //works: $query = "UPDATE events SET event_title = 'Kalendar original' WHERE event_id = 26 ";

   /*<!-- ************************************************************
         4. D E L E T E - code behind R O W  d e l  b u t t o n
   ************************************************************ -->*/
  if(isset($_POST['deleterow'])) {
      $query = "DELETE FROM events WHERE event_id = $idposted ";
      $result_set = mysqli_query($connection, $query);
      if(!$result_set) {
         die("D E L E T E FAILED" . mysqli_error($connection));
      } 
  } //e n d  isset($_POST['d e l e t e r o w'])



  goto endphp ;
} //e n d  if(is set($_ POST['i d']))






endphp:

