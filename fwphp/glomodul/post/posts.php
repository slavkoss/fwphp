<?php
//J:\awww\www\fwphp\glomodul4\blog\posts.php
//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\dbadapter\post ;
use B12phpfw\module\dbadapter\post\Tbl_crud as Tbl_crud_post;
use B12phpfw\module\dbadapter\post_comment\Tbl_crud as Tbl_crud_post_comment;
                  //echo '<pre>$p p1='; print_r($pp1); echo '</pre><br />';
//$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];

//               2. R E A D  D B T B L R O W S
//no sense to put this in controller (Home_ctr) because details cursor can not be there ! :
$tbl_o_post = new Tbl_crud_post ;
$c_posts = $tbl_o_post->rr_all($dm, $category_from_url);


?>
<!-- HEADER & n avbar_ admin2 -->
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
          <th>#</th><th>Title</th><th>Category</th><th>Date&Time</th><th>Author</th><th>Banner</th><th>Comments</th><th>Action</th><!--th>L ive P review</th-->
        </tr>
        </thead>

      <tbody>
        <?php


        $Sr = 0;
        // $this is $dm=domain model = cls hierarchy in UML diagram
        while ($r = $this->rrnext($c_posts)): 
        {
          $Sr++;
          //all row fld names lowercase
          switch ($dm->getdbi())
          {
            case 'oracle' : $r = $dm->rlows($r) ; break; 
            default: break;
          }
          ?>
          <tr>
          <td><?=$Sr?></td>

            <td>
              <?php
                if(strlen($r->title)>20) {$r->title= substr($r->title,0,18).'..';}
              ?><a href="<?=$pp1->read_post?>id/<?=$r->id?>" ><span"><?=$r->title?></span></a>

          </td>
          <td><?php if(strlen($r->category)>10){$r->category= substr($r->category,0,10).'..';}
               //echo $r->category ; ?>
              <span class="text-dark">
                 <a href="<?=$pp1->filter_postcateg?><?=self::escp($r->category)?>/p/posts">
                    <?=self::escp($r->category)?></a></span>
          </td>
          <td><?php if(strlen($r->datetime)>11){$r->datetime= substr($r->datetime,0,11).'..';} 
               echo $r->datetime ; ?></td>
          <td><?php if(strlen($r->author)>10){$r->author= substr($r->author,0,10).'..';}
               echo $r->author ;?></td>




          <td><img src="Uploads/<?=$r->image?>" width="170px;" height="50px"></td>
          <td>
            <?php

            $tbl_o_post_comment = new Tbl_crud_post_comment ;
            // $dm = domain model = cls hierarchy in UML diagram ($this )
            // A p p r o v e d  c o m m e n t s  c o u n t  count_post_comment_aproved
            $rows_on = $tbl_o_post_comment->rr_count_aproved($dm, $r->id, 'ON');
            if ($rows_on>0) { ?> <span class="badge badge-success"><?=$rows_on?></span> <?php } 
            // D i s a p p r o v e d  c o m m e n t s  c o u n t
            $rows_off = $tbl_o_post_comment->rr_count_aproved($dm, $r->id, 'OFF');
            if ($rows_off>0) { ?> <span class="badge badge-danger"><?=$rows_off?></span> <?php } ?>
          </td>


          <td>
            <a href="<?=$pp1->editpost?>id/<?=$r->id?>"><span class="btn btn-warning"> Edit</span></a>
            <!--   -->
           <a id="erase_row" class="btn btn-danger"
              onclick="var yes ; yes = jsmsgyn('Erase row <?=$r->id?>?','') ;
              if (yes == '1') { location.href= '<?=$pp1->del_row?>t/posts/id/<?=$r->id?>/'; }"
           >Del <?=$r->id?></a>
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
