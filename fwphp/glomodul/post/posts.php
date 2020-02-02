<?php
//J:\awww\www\fwphp\glomodul4\blog\posts.php
namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5
                  //echo '<pre>$this->pp1='; print_r($this->pp1); echo '</pre><br />';
//$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];

$category_from_url = (isset($this->uriq->c) ? $this->uriq->c : '') ;

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
        if ($category_from_url) 
        {
          //3. SQL Query if FILTER BY  C ATEGORY_ FROM_ U R L  is active
          // *******************************************************************
               //$onerow, $db, $tbl,   $where='1', $flds='COUNT(*) COUNT_ROWS', $binds = []
          $c_r = $this->rr("SELECT * FROM posts WHERE category = :category_from_url ORDER BY datetime desc"
            ,[ ['placeh'=>':category_from_url', 'valph'=>$category_from_url, 'tip'=>'str'] ]
            , __FILE__ .'() '.', ln '. __LINE__  );
        }
        // default SQL query
        else{
          $c_r = $this->rr("SELECT * FROM posts ORDER BY datetime desc", [], __FILE__ .' '.', ln '. __LINE__) ;
        }

        $Sr = 0;
        //while ($r = $c_r->fetch(\PDO::FETCH_OBJ)) 
        while ($r = $this->rrnext($c_r)): 
        {
          $Sr++;
          //all row fld names lowercase
          switch ($db->getdbi())
          {
            case 'oracle' : $r = $db->rlows($r) ; break; 
            default: break;
          }
          ?>
          <tr>
          <td><?=$Sr?></td>

            <td>
              <?php
                if(strlen($r->title)>20) {$r->title= substr($r->title,0,18).'..';}
              ?><a href="<?=$this->pp1->read_post?>id/<?=$r->id?>" ><span"><?=$r->title?></span></a>

          </td>
          <td><?php if(strlen($r->category)>10){$r->category= substr($r->category,0,10).'..';}
               //echo $r->category ; ?>
              <span class="text-dark">
                 <a href="<?=$this->pp1->filter_postcateg?><?=self::escp($r->category)?>/p/posts">
                    <?=self::escp($r->category)?></a></span>
          </td>
          <td><?php if(strlen($r->datetime)>11){$r->datetime= substr($r->datetime,0,11).'..';} 
               echo $r->datetime ; ?></td>
          <td><?php if(strlen($r->author)>10){$r->author= substr($r->author,0,10).'..';}
               echo $r->author ;?></td>




          <td><img src="Uploads/<?=$r->image?>" width="170px;" height="50px"></td>
          <td>
            <?php


            //$c_ron=$this->r r('1',$this,'comments',"post_id='$r->id' AND status='ON'");
            $c_ron = $this->rr("SELECT count(*) COUNT_ROWS FROM comments WHERE post_id=$r->id AND status='ON'", [], __FILE__ .' '.', ln '. __LINE__ ) ;
            while ($row = $this->rrnext($c_ron)): {$rcnt = $row ;} endwhile; //c_, R_, U_, D_
            $Total = $rcnt->COUNT_ROWS ;
            if ($Total>0) { ?>
              <span class="badge badge-success"><?=$Total?></span>
               <?php
            } 


            //$c_rof = $this->r r('1', $this, 'comments', "post_id='$r->id' AND (status='OFF' or status < '0')") ;
            $c_rof = $this->rr("SELECT count(*) COUNT_ROWS FROM comments WHERE post_id=$r->id AND status='OFF' or status < '0'", [], __FILE__ .' '.', ln '. __LINE__ ) ;
            while ($row = $this->rrnext($c_rof)): {$rcnt = $row ;} endwhile; //c_, R_, U_, D_
            $Total = $rcnt->COUNT_ROWS ;
            if ($Total>0) { ?>
              <span class="badge badge-danger"><?=$Total?></span>
              <?php
            } ?>
          </td>


          <td>
            <a href="<?=$this->pp1->editpost?>id/<?=$r->id?>"><span class="btn btn-warning"> Edit</span></a>
            <!--   -->
           <a id="erase_row" class="btn btn-danger"
              onclick="if (jsmsgyn('Erase row ?',''))
              { location.href= '<?=$this->pp1->del_row?>t/posts/id/<?=$r->id?>/'; }"
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
