<?php
declare(strict_types=1);
// J:\awww\www\fwphp\glomodul\post\posts.php
//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\dbadapter\post ;

use B12phpfw\core\zinc\Config_allsites ;
use B12phpfw\core\zinc\Db_allsites ;
use B12phpfw\dbadapter\post\Tbl_crud as Tbl_crud_post;
use B12phpfw\dbadapter\post_comment\Tbl_crud as Tbl_crud_post_comment;
                  //echo '<pre>$ p p 1='; print_r($pp1); echo '</pre><br />';
//$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];

//           1. S U B M I T E D  A C T I O N S

//               2. R E A D  D B T B L R O W S
//no sense to put this in controller (Home_ctr) because details cursor can not be there ! :
$cursor_post = Tbl_crud_post::rr_all( $sellst='*', $qrywhere="'1'='1'", $binds=[]
  , $other=[ 'caller' => __FILE__ .' '.', ln '. __LINE__ 
           , 'category_from_url'=>$category_from_url
    ]
) ;


?>
<!-- HEADER & n avbar_ ad min2 -->
<header class="bg-dark text-white py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
      <h1>
         <i class="fas fa-blog" style="color:#27aae1;"></i> Posts (msgs) table 
         <?php if ($category_from_url) { echo ' - all ' . $category_from_url . ' articles' ;
         } else {echo ' - all articles';} ?>
      </h1>
      </div>
      <?php require('navbar_admin2.php'); ?>
    </div>
  </div>
</header>
<!-- HEADER END -->



<!-- Main Area -->
<section class="container py-2 mb-4">
  <div class="row">
    <div class="col-lg-12">
      <?php
       echo $this->ErrorMessage();
       echo $this->SuccessMessage();
       ?>
      <table class="table table-striped table-hover">

        <thead class="thead-dark">
        <tr>
          <th>#</th><th>Title</th><th>Category</th><th>Date&Time</th><th>Author</th><th>Banner</th><th>Comments</th><th>Edit</th><th>Delete</th><!--th>L ive P review</th-->
        </tr>
        </thead>

      <tbody>
        <?php


        $Sr = 0;
        while ($r = Tbl_crud_post::rrnext($cursor_post) and isset($r->id)): 
        {
          $Sr++;
          //all row fld names lowercase
          switch (Db_allsites::getdbi()) { case 'oracle' : $r = Config_allsites::rlows($r) ; break; default: break; }
          ?>
          <tr>
          <td><?=$Sr?></td>

            <td>
              <?php
                $tmp = self::escp($r->title) ;
                if(strlen($tmp)>20) {$tmp= substr($tmp,0,18).'..';}
              ?><a href="<?=$pp1->read_post?>id/<?=$r->id?>"
                   title="Show post <?=$tmp?>"
                ><span"><?=$tmp?></span
                ></a>

          </td>

          <td><?php
                $tmp = self::escp($r->category) ;
                //if(strlen($tmp)>10){ $tmp= substr($tmp,0,10).'..'; }
               ?>
              <span class="text-dark">
                 <a href="<?=$pp1->filter_postcateg?><?=$tmp?>/p/posts"
                    title="Show all posts in category <?=$tmp?>"
                 ><?=substr($tmp,0,10)?></a>
              </span>
          </td>

          <td><?php
               $tmp = self::escp($r->datetime) ;
               //if(strlen($tmp)>11){$tmp = substr($tmp,0,11).'..';} 
               ?><span title="<?=$tmp?>"><?=substr($tmp,0,10)?></span>
               </td>

          <td><?php
               $tmp = self::escp($r->author) ;
               if(strlen($tmp)>10){$tmp= substr($tmp,0,10).'..';}
               echo $tmp ;
               ?></td>




          <td><img src="Uploads/<?=$r->image?>" width="170px;" height="50px"></td>
          <td>
            <?php
            // A p p r o v e d  c o m m e n t s  c o u n t  count_post_comment_aproved
            $rows_on = Tbl_crud_post_comment::rr_count_aproved($r->id, 'ON');
            if ($rows_on>0) { ?> <span class="badge badge-success"><?=$rows_on?></span> <?php } 
            // D i s a p p r o v e d  c o m m e n t s  c o u n t
            $rows_off = Tbl_crud_post_comment::rr_count_aproved($r->id, 'OFF');
            if ($rows_off>0) { ?> <span class="badge badge-danger"><?=$rows_off?></span> <?php } ?>
          </td>


          <td>
            <a href="<?=$pp1->editpost?>id/<?=$r->id?>"><span class="btn btn-warning"> Ed</span></a>
            <!--   -->
          </td>
          <td>
            <!--   -->
           <a id="erase_row" class="btn btn-danger"
              onclick="var yes ; yes = jsmsgyn('Erase row <?=$r->id?>?','') ;
              if (yes == '1') { location.href= '<?=$pp1->del_row?>t/posts/id/<?=$r->id?>/'; }"
           ><?=$r->id?></a>
          </td>
          <!--td>

          </td-->
          </tr>
          <?php 
        } endwhile; //c_, R_, U_, D_
        ?>  <!--  Ending of  W h i l e  l o o p -->
        </tbody>

      </table>

    </div>
  </div>
</section>
<!-- Main Area End -->
