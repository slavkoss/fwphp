<?php
//J:\awww\www\fwphp\glomodul4\blog\read_post.php
namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5

//    1. S U B M I T E D  A C T I O N S
// mostly M O D E L  C O D E (why M-V data flow : if this code is in  c t r  we have fat c t r)
if(isset($_POST["Submit"])){
  $Name    = $_POST["CommenterName"];
  $Email   = $_POST["CommenterEmail"];
  $Comment = $_POST["CommenterThoughts"];

  //   1.1. V A L I D A T I O N
  if(empty($Name)||empty($Email)||empty($Comment)){
    $_SESSION["ErrorMessage"]= "All fields must be filled out";
    $this->Redirect_to($pp1->read_post."id/{$IdFromURL}");
  }elseif (strlen($Comment)>500) {
    $_SESSION["ErrorMessage"]= "Comment length should be less than 500 characters";
    $this->Redirect_to($pp1->read_post."id/{$IdFromURL}");
  }else{

    //  1.2 I N S E R T  D B T B L R O W
    // Query to insert comment in DB When everything is fine
    //I NSERT INTO $t bl ($f lds) $w hat
    $CurrentTime = time(); $DateTime = strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
    $flds     = "datetime,name,email,comment,approvedby,status,post_id" ;
    $qrywhat  = "VALUES(:dateTime,:name,:email,:comment,'Pending','OFF',:IdFromURL)" ;
    $binds = [
      ['placeh'=>':dateTime', 'valph'=>$DateTime, 'tip'=>'str']
     ,['placeh'=>':name',     'valph'=>$Name, 'tip'=>'str']
     ,['placeh'=>':email',    'valph'=>$Email, 'tip'=>'str']
     ,['placeh'=>':comment',  'valph'=>$Comment, 'tip'=>'str']
     ,['placeh'=>':IdFromURL','valph'=>$IdFromURL, 'tip'=>'int']
    ] ;
    $cursor = $this->cc($this,'comments',$flds,$qrywhat,$binds);

    //var_dump($cursor);
    if($cursor){ $_SESSION["SuccessMessage"]="Comment Submitted Successfully";
    }else { $_SESSION["ErrorMessage"]="Something went wrong. Try Again !"; }

    $this->Redirect_to($pp1->read_post."id/{$IdFromURL}");
  }
} //Ending of Submit Button If-Condition



//        2. G U I  to get user action
/**
*  <!-- *****************************************************
* P o s t Part Start (DETAIL OF U S E R  AND  P O S T T Y P E) 
*  ****************************************************** --> 
*/
// $title = 'Full Post Page' ;
 //require_once($pp1->wsroot_path.'zinc/hdr.php');
// require_once("navbar.php");
?>
<!-- HEADER -->
<div class="container">
  <div class="row mt-4">
    <!-- Main Area Start-->
    <div class="col-sm-8 ">
      <!--h1>Responsive CMS Blog</h1>
      <h1 class="lead">...</h1-->
      <?php
       echo $this->ErrorMessage();
       echo $this->SuccessMessage();
       ?>
      <?php
      // SQL query when Searh button is active
      if(isset($_POST["SearchButton"]))
      {
        $Search = $_POST["Search"];

        $qrywhere = "title LIKE :search1
              OR category LIKE :search2
              OR datetime LIKE :search3
              OR img_desc LIKE :search4
              OR summary LIKE :search5
              " ; //OR post LIKE :search

        $cursor = $this->rr("SELECT * FROM posts WHERE $qrywhere ORDER BY datetime desc"
        , [
           ['placeh'=>':search1', 'valph'=>'%'.$Search_from_submit.'%', 'tip'=>'str']
          ,['placeh'=>':search2', 'valph'=>'%'.$Search_from_submit.'%', 'tip'=>'str']
          ,['placeh'=>':search3', 'valph'=>'%'.$Search_from_submit.'%', 'tip'=>'str']
          ,['placeh'=>':search4', 'valph'=>'%'.$Search_from_submit.'%', 'tip'=>'str']
          ,['placeh'=>':search5', 'valph'=>'%'.$Search_from_submit.'%', 'tip'=>'str']
          ]
       , __FILE__ .' '.', ln '. __LINE__ ) ;
      }
      // default SQL query
      else{
        if (!isset($IdFromURL)) {
          $_SESSION["ErrorMessage"]="Bad Request !";
          $this->Redirect_to($pp1->filter_page."1/i/home/");
        }

        $qrywhere = "id=:IdFromURL" ;
        $cursor = $this->rr("SELECT * FROM posts WHERE $qrywhere ORDER BY datetime desc"
          , [
             ['placeh'=>':IdFromURL', 'valph'=>$IdFromURL, 'tip'=>'int']
            ]
        , __FILE__ .' '.', ln '. __LINE__ ) ;

      }

     while ($r = $this->rrnext($cursor)) //while ($r = $this->f etchNext())
      { //echo '<pre>'.__DIR__ .DS.'Uploads'.DS.$r->image.'</pre>';
        switch (self::$dbi)
        {
          case 'oracle' : $r = self::rlows($r) ; break; 
          default: break;
        }
      ?>
        <div class="card">


          <?php
          //J://awww//www//fwphp//glomodul//blog//Uploads//mvc_M_V_data_flow.jpg
          $tmp_imgpath = str_replace('/',DS, __DIR__ .DS.'Uploads'.DS.self::escp($r->image));
          $tmp_imgurlrel = 'Uploads/'.self::escp($r->image) ;
          if (file_exists($tmp_imgpath)) { ?>
            <img src="<?=$tmp_imgurlrel?>" class="img-fluid card-img-top"
                 style="max-height:450px;" 
                 alt="" />
            <?php
          } 

          $tmp_imgpath = str_replace('/',DS, $pp1->wsroot_path)
               . 'zinc'.DS.'img'.DS.'img_big'.DS.self::escp($r->image) ;
          $tmp_imgurlrel = '/zinc/img/img_big/'.self::escp($r->image) ;
                        if ('') {self::jsmsg( [ //basename(__FILE__).
                           __METHOD__ .', line '. __LINE__ .' SAYS'=>'BEFORE img '
                           ,'$tmp_imgurlrel'=>$tmp_imgurlrel
                           ] ) ; }
          if ($r->image and file_exists($tmp_imgpath)) { ?>
              <img src="<?=$tmp_imgurlrel?>" style="max-height:450px;" class="img-fluid card-img-top" />
              <?php
          } ?>



          <div class="card-body">
            <p><?php echo 
               str_replace('{{b}}','<b>', str_replace('{{/b}}','</b>', 
                  nl2br(self::escp($r->img_desc))
                  .' $tmp_imgpath='.$tmp_imgpath
                  .'<br />'.' $tmp_imgurlrel='.$tmp_imgurlrel
               ));
               //echo '<br />('.__DIR__ .DS.'Uploads'.DS.$r->image.')' ;
               ?>
              <!--style="float:right;" -->
              <a href="<?=$pp1->editpost?>id/<?=$r->id?>" 
                 class="btn btn-primary btn-block"  
                 title = "Edit database table row"
              > <span class="btn btn-info">Edit post data in database table row &rang;&rang; </span> </a>
            </p>

            <div><p class="card-title">
              <!--style="float:right;" -->
              <a href="<?=$pp1->edmkdpost?>flename/<?=$r->title?>/id/<?=$r->id?>" 
                 class="btn btn-success btn-block" 
                 title = "Markdown edit text in FILE (not in database !)"
              > <span class="btn btn-info">Edit post in <?php echo self::escp($r->title); ?> (We cre/del .txt in op.system. TODO: cre/del .txt here) &rang;&rang; </span> </a>
            </p></div>


            <small class="text-muted">Category: <span class="text-dark">

              <a href="<?=$pp1->filter_postcateg?><?=self::escp($r->category)?>"> 
                 <?=self::escp($r->category)?> </a></span> & Written by <span class="text-dark">
              <a href="<?=$pp1->read_user?>username/<?php echo self::escp($r->author); ?>">
                 <?=self::escp($r->author)?></a>
                 </span> On <span class="text-dark"><?php echo self::escp($r->datetime); ?></span>

            </small>


            <hr>
            <p class="card-text">
              <?php
                 //echo nl2br($r->summary); //echo nl2br($r->post);
                echo str_replace('{{b}}','<b>', str_replace('{{/b}}','</b>', 
                        nl2br(self::escp($r->summary))
                     ));
              ?>
            </p>
              <?php $this->readmkdpost($pp1, $r->title, ''); //means  i n c l u d e  here html ?>
            </p>

          </div>
        </div>
      <br>
      <?php   } ?>







      <!-- *****************************************************
           Comment Part Start (DETAIL OF DETAIL) 
      ****************************************************** -->
      <!-- Fetching existing comment START  -->
      <span class="FieldInfo">Comments</span>
      <br><br>
    <?php
        $qrywhere = "post_id=:IdFromURL" ;
        $cursor = $this->rr("SELECT * FROM comments WHERE $qrywhere ORDER BY datetime desc"
          , [
             ['placeh'=>':IdFromURL', 'valph'=>$IdFromURL, 'tip'=>'int']
            ]
        , __FILE__ .' '.', ln '. __LINE__ ) ;

    while ($r = $this->rrnext($cursor))
    { ?>
      <div>
        <div class="media CommentBlock">
          <img class="d-block img-fluid align-self-start" src="Uploads/comment.png" alt="">
          <div class="media-body ml-2">
            <h6 class="lead"><?php echo $r->name; ?></h6>
            <p class="small"><?php echo $r->datetime; ?></p>
            <p><?php echo $r->comment; ?></p>
          </div>
        </div>
      </div>
      <hr>
    <?php
  } ?>

    <!--  Fetching existing comment END -->

      <div>
        <form class="" action="<?=$pp1->read_post?>id/<?php echo $IdFromURL ?>" method="post">
          <div class="card mb-3">
            <div class="card-header">
              <h5 class="FieldInfo">Share your thoughts about this post</h5>
            </div>
            <div class="card-body">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                <input class="form-control" type="text" name="CommenterName" placeholder="Name" value="">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  </div>
                <input class="form-control" type="text" name="CommenterEmail" placeholder="Email" value="">
                </div>
              </div>
              <div class="form-group">
                <textarea name="CommenterThoughts" class="form-control" rows="6" cols="80"></textarea>
              </div>
              <div class="">
                <button type="submit" name="Submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </div>
        </form>
      </div>
        <!-- Comment Part End -->
    </div>
    <!-- Main Area End-->

     <?php require_once("home_side_area.php"); ?>

  </div>

</div>

<!-- HEADER END -->
