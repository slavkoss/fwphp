<?php
//J:\awww\www\fwphp\glomodul4\blog\categories.php
namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5
//$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];

    //in home ctr $db = $this ;            //this globals for all sites are for CRUD... !!
    //not used $Db_postcat = new Db_post_category ; //tbl mtds and attr use globals for all sites !!

//    1. S U B M I T E D  A C T I O N S
if(isset($_POST["Submit"]))
{
  $Category = $_POST["CategoryTitle"];
  $Admin = $_SESSION["username"];

  //   1.1. V A L I D A T I O N
  if(empty($Category)){
    $_SESSION["ErrorMessage"]= "All fields must be filled out";
    $db->Redirect_to($db->pp1->categories);
  }elseif (strlen($Category)<3) {
    $_SESSION["ErrorMessage"]= "Category title should be greater than 2 characters";
    $db->Redirect_to($db->pp1->categories);
  }elseif (strlen($Category)>49) {
    $_SESSION["ErrorMessage"]= "Category title should be less than than 50 characters";
    $db->Redirect_to($db->pp1->categories);
  }else{

    //  1.2 I N S E R T  D B T B L R O W
    // Q uery to i nsert category in DB When everything is fine

    //I NSERT INTO $t bl ($f lds) $w hat
    $CurrentTime = time(); $DateTime = strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
    $flds     = "title,author,datetime" ;
    $qrywhat  = "VALUES(:categoryName,:adminname,:dateTime)" ;
    $binds = [
      ['placeh'=>':adminname',    'valph'=>$Admin, 'tip'=>'str']
     ,['placeh'=>':categoryName', 'valph'=>$Category, 'tip'=>'str']
     ,['placeh'=>':dateTime',     'valph'=>$DateTime, 'tip'=>'str']
    ] ;
    $cursor = $db->cc($this,'category',$flds,$qrywhat,$binds);

    if($cursor){
      //$_SESSION["SuccessMessage"]="Category id : " .$ConnectingDB->lastInsertId()." added Successfully";
      $_SESSION["SuccessMessage"]="Category added Successfully";
      $db->Redirect_to($db->pp1->categories);
    }else {
      $_SESSION["ErrorMessage"]= "Category adding went wrong. Try Again !";
      $db->Redirect_to($db->pp1->categories);
    }
  }
} //Ending of Submit Button If-Condition



//        2. G U I  to get user action
?>
    <!-- HEADER -->
    <header class="bg-dark text-white py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
          <h1><i class="fas fa-edit" style="color:#27aae1;"></i> Manage Categories</h1>
          </div>
        </div>
      </div>
    </header>
    <!-- HEADER END -->

     <!-- Main Area -->
<section class="container py-2 mb-4">
  <div class="row">
    <div class="offset-lg-1 col-lg-10" style="min-height:400px;">
      <?php
       echo $db->ErrorMessage();
       echo $db->SuccessMessage();
       ?>
      <form class="" action="<?=$db->pp1->categories?>" method="post">
        <div class="card bg-secondary text-light mb-3">
          <div class="card-header">
            <h1>Add Category</h1>
          </div>
          <div class="card-body bg-dark">
            <div class="form-group">
              <label for="title"> <span class="FieldInfo"> Categroy Title: </span></label>
               <input class="form-control" type="text" name="CategoryTitle" id="title" placeholder="Type title here" value="">
            </div>
            <div class="row">
              <div class="col-lg-6 mb-2">
                <a href="<?=$db->pp1->dashboard?>" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i> Back To Dashboard</a>
              </div>
              <div class="col-lg-6 mb-2">
                <button type="submit" name="Submit" class="btn btn-success btn-block">
                  <i class="fas fa-check"></i> Publish
                </button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <h2>Existing Categories</h2>
      <table class="table table-striped table-hover">
        <thead class="thead-dark">
          <tr>
            <th>No. </th>
            <th>Date&Time</th>
            <th> Category Name</th>
            <th>Creator Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
      <?php
      //$cursor = $db->r r('', $this, 'category', "'1'='1' ORDER BY title", '*' ) ;
      $cursor = $db->rr("SELECT * FROM category ORDER BY title", [], __FILE__ .' '.', ln '. __LINE__ ) ;
      $SrNo = 0;

      while ($r = $db->rrnext($cursor))
      {
        $SrNo++;
          //all row fld names lowercase
          switch ($db->getdbi())
          {
            case 'oracle' : $r = $db->rlows($r) ; break; 
            default: break;
          }
        ?>
        <tr>
          <td><?php echo self::escp($SrNo); ?></td>
          <td><?php echo self::escp($r->datetime); ?></td>
          <td><?php echo self::escp($r->title); ?></td>
          <td><?php echo self::escp($r->author); ?></td>
          <td>
           <!--  /*
              href="<=$db->pp1->del_row>t/category/id/<=$r->id>/" 
              alert(
           */ -->
          <a id="erase_row" class="btn btn-danger"
              onclick="if (jsmsgyn('Erase row ?',''))
                { location.href= '<?=$db->pp1->del_row?>t/category/id/<?=$r->id?>/'; }"
          >Delete</a>
          </td>
         <?php
      } ?>
      </tbody>
      </table>
    </div>
  </div>

</section>

<!-- End Main Area 
                          /*$sql = "INSERT INTO category(title,author,datetime)";
                          $sql .= "VALUES(:categoryName,:adminname,:dateTime)";
                          $db->p repareSQL($sql); 
                          $db->b indvalue(':categoryName', $Category, \PDO::PARAM_STR);
                          $db->b indvalue(':adminname', $Admin, \PDO::PARAM_STR);
                          $CurrentTime = time(); $DateTime = strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
                          $db->b indvalue(':dateTime', $DateTime, \PDO::PARAM_STR);
                          $cursor = $db->e xecute();*/

-->

<?php //require_once($db->pp1->wsroot_path.'zinc/ftr.php'); ?>

