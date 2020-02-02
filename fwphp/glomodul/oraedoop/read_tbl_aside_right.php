<?php

//         C U R S O R S
              //get_key_vals("SELECT table_name, 'table' FROM all_tables WHERE tablespace_name = " . q(DB) . "
              //UNION SELECT view_name, 'view' FROM user_views
              //ORDER BY 1"
/*
$c_tblnames = $this->rr('', $this, 'TABS' //c= cursor
    , 'SQLin_flds', '
SELECT TABLE_NAME FROM TABS 
UNION SELECT VIEW_NAME TABLE_NAME FROM USER_VIEWS
ORDER BY 1
' //, $binds, '', $this->pp1->dbi_obj
    //, "$qrywhere ORDER BY COUNTRY_NAME LIMIT :first_rinblock,5", '*' //mysql
  ) ;
*/

$qrywhere = "'1'='1' ORDER BY USERNAME" ;
      /*$binds = [
              ['placeh'=>':first_rinblock', 'valph'=>$first_rinblock, 'tip'=>'int']
            , ['placeh'=>':last_rinblock',  'valph'=>$last_rinblock, 'tip'=>'int']
      ] ; */
$c_shemas = $this->rr('', $this, 'ALL_USERS' //c= cursor
    , $qrywhere, '*' //, $binds , '', $this->pp1->dbi_obj
) ;



?><aside>


<?php /*
<div class="one-third">
    
<h2 class="blog-topics-title">Select table</h2>
</div>

<ol>
$ordno=0;
while ($r = $this->rrnext($c_tblnames)):
{ ++$ordno; ?>
   <li><a href="to do"><?=$r->TABLE_NAME?></a><br /><br /></li>
<?php
} endwhile ;
</ol>
*/ ?>




<div class="one-third">
    
<h2 class="blog-topics-title">Select schema (user)</h2>
</div>

<ol>
<?php
$ordno=0;
while ($r = $this->rrnext($c_shemas)):
{ ++$ordno; ?>
   <li><a href="to do"><?=$r->USERNAME .', '. $r->CREATED?></a><br /><br /></li>
<?php
} endwhile ;
?>
</ol>


</aside>
