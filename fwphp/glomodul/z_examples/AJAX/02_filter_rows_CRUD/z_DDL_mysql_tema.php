<?php
//see J:\awww\www\1_DDL_MySQL_db_tema_moj_exp.sql

//not working with jQuery :
                      ?><SCRIPT LANGUAGE="JavaScript">
                         alert('<?=json_encode($_REQUEST, JSON_PRETTY_PRINT)?>');
                      </script><?php

                if ('1') { echo '<tr><td colspan="2"><pre>'.__FILE__ .', lin='. __LINE__
                   .'<br />     <b>*** '.__METHOD__ .'  SAYS ***</b>';
                echo '<br /><h3>$ _POST=</h3>'; print_r($_POST) ;
                echo '</pre></td></tr>'; //print("testing, not eg deleted") ; goto endphp ; 
                } //see <tbody id="tbody_list"></tbody> and $("#tbody_list").html(tbody_data);

else {
            //die("ID $id : title updated to $title") ;
            ?><ul class='list-unstyled'>
               <li><?="ID $id : title updated to $title"?></li>
             </ul><?php
       }

