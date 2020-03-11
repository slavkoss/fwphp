<?php

//$pp1  = $this->getp('pp1') ;

?>

<!-- Side Area Start -->
<div class="col-sm-4">
  <div class="card mt-4">
    <div class="card-body">
      <div>
        <img src="Uploads/twitter.jpg" class="d-block img-fluid mb-3" alt="">
        <!--div class="text-center">  </div-->
        <span style="display: inline;">
          Real life site code examples.
        </span>
      </div>
    </div>
  </div>




  <br>
  <div class="card">
    <div class="card-header bg-primary text-light">
      <h2 class="lead">Teme (Posts Categories)</h2>
    </div>
    <div class="card-body">
      <a href="<?=$pp1->filter_postcateg?>">ALL</a>&nbsp;&nbsp;&nbsp;
        <?php
        //$cursor = $this->r r('', $this, 'category', "'1'='1' ORDER BY title", '*') ;
        $cursor = $this->rr("SELECT * FROM category ORDER BY title", [], __FILE__ .' '.', ln '. __LINE__ ) ;
        while ($r = $this->rrnext($cursor))
          { //all row fld names lowercase
            switch (self::$dbi) { case 'oracle' : $r = self::rlows($r) ; break; default: break; }
            ?>
            <a href="<?=$pp1->filter_postcateg?><?=$r->title?>/p/1">
             <span class="heading"> <?=$r->title?></span> </a>&nbsp;&nbsp;&nbsp;
            <?php 
         } ?>
    </div>
  </div>




  <br>
  <div class="card">
    <div class="card-header bg-info text-white">
       <h2 class="lead"> Recent Posts</h2>
    </div>
    <div class="card-body">
      <?php
      switch (self::$dbi)
      {
        case 'oracle' :
          $binds[]=['placeh'=>':first_rinblock', 'valph'=>0, 'tip'=>'int'];
          $binds[]=['placeh'=>':last_rinblock',  'valph'=>4, 'tip'=>'int'];
          self::$do_pgntion = '1';
          $cursor = $this->rr("SELECT * FROM posts ORDER BY datetime desc"
              , $binds, __FILE__ .' '.', ln '. __LINE__ ) ;
        break;
        case 'mysql' :
          $binds[]=['placeh'=>':first_rinblock', 'valph'=>0, 'tip'=>'int'];
          $binds[]=['placeh'=>':rblk', 'valph'=>5, 'tip'=>'int'];
          self::$do_pgntion = '1';
          // Invalid parameter number: number of bound variables does not match number of tokens in J:\awww\www\zinc\Db_allsites.php:198 Stack trace: #0 J:\awww\www\zinc\Db_allsites.php(198): PDOStatement->execute() #1 J:\awww\www\fwphp\glomodul\blog\home_side_area.php(68): 
          $binds =[] ;
          $cursor = $this->rr(
          "SELECT * FROM posts ORDER BY datetime desc" // LIMIT :first_rinblock, :rblk
               , $binds, __FILE__ .' '.', ln '. __LINE__ ) ;
        break;
        default:
                echo '<h3>'.__FILE__ .', line '. __LINE__ .' SAYS: '
                    .'D B I '. self::$dbi .' does not exist' . '</h3>';
          //$this->Redirect_to($pp1->filter_page) ;
          break;
      }


      $ii=0 ; while ($r = $this->rrnext($cursor))
      {
        if ($ii>9) break ;
        //all row fld names lowercase
        switch (self::$dbi) { case 'oracle' : $r = self::rlows($r) ; break; default: break; }
        ?>
        <a href="<?=$pp1->filter_postcateg?><?=$r->category?>">
         <span class="heading"> <?=$r->category?></span> </a>&nbsp;&nbsp;&nbsp;

        <div class="media">
          <?php
          $tmp_imgpath = str_replace('/',DS, __DIR__ .DS.'Uploads'.DS.self::escp($r->image));
          $tmp_imgurlrel = 'Uploads/'.self::escp($r->image) ;
          if (file_exists($tmp_imgpath)) { ?>
            <img src="<?=$tmp_imgurlrel?>" class="d-block img-fluid
                 align-self-start" width="90" height="94" alt="">
            <?php
          } ?>


          <div class="media-body ml-2">
            <a style="text-decoration:none;" 
               href="<?=$pp1->read_post?>id/<?php echo self::escp($r->id) ; ?>" 
               target="_blank">
                 <span class="lead"><?php echo self::escp($r->title); ?></span> </a>
            <p class="small"><?php echo self::escp($r->datetime); ?></p>
          </div>

        </div>

        <hr>
        <?php
        $ii++ ;
      } ?>
    </div> <!--e n d <div class="card-body"-->
  </div> <!--e n d <div class="card"-->

  <br>
  <div class="card">
    <!--div class="card-header bg-dark text-light">
      <h2 class="lead">Sign Up !</h2>
    </div-->
    <div class="card-body">
      <button type="button" class="btn btn-success btn-block text-center text-white mb-4" 
              name="button">Join the Forum</button>
      <!--button type="button" class="btn btn-danger btn-block text-center text-white mb-4" 
              name="button">Log in</button-->
      <div class="input-group mb-3">
        <input type="text" class="form-control" name="" placeholder="Enter your email" value="">
        <div class="input-group-append">
          <button type="button" class="btn btn-primary btn-sm text-center text-white" name="button">Subscribe Now</button>
        </div>
      </div>
    </div>
  </div>


    <?php echo "<pre>
      _.-'''''-._
    .'  _     _  '.
   /   (o)   (o)   \
  |        &copy;        |
  | Slavko Srakočić |
   \  '. Zagreb.'  /
    '.  ''---''  .'
      '-._____.-' 
    </pre>"; ?>
    <?='<small class="text-muted">'. __FILE__ .'</small>'?>

</div>
<!-- Side Area End 
                          //$sql = "S ELECT * FROM category ORDER BY title";
                          //$this->p repareSQL($sql); $this->e xecute();;
                          //while ($r = $this->f etchNext())
                          //if Executedsql than err : Call to a member function f etchNext() on bool
-->