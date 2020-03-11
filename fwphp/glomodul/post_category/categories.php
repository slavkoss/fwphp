<?php
//J:\awww\www\fwphp\glomodul4\blog\categories.php

namespace B12phpfw ; //FUNCTIONAL and POSITIONAL see below MODULE_&_ITS_DIR_NAME
//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\dbadapter\post_category ;
use B12phpfw\dbadapter\post_category\Tbl_crud ;

//$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];

//           1. S U B M I T E D  A C T I O N S
if(isset($_POST["Submit"]))
{
  $Category = $_POST["CategoryTitle"];
  $Admin    = $_SESSION["username"];
  $CurrentTime = time(); $DateTime = strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
  // 1.1 V A L I D A T I O N  and  1.2 C R E A T E  D B T B L R O W
  $fldvals = [$Category, $Admin, $DateTime] ;
  $tbl_o = new Tbl_crud ; //Db_post_category
  $id = $tbl_o->cc($dm, $fldvals);
} //E n d  Submit Button If-Condition


//               2. R E A D  D B T B L R O W S
//$cursor = $dm->rr("SELECT * FROM category ORDER BY title", [], __FILE__ .' '.', ln '. __LINE__ ) ;
$tbl_o = new Tbl_crud ;
$cursor = $tbl_o->rr_all($dm);


//               3. G U I  (FRM) to get user action
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
       echo $dm->ErrorMessage();
       echo $dm->SuccessMessage();
       ?>


      <form class="" action="<?=$pp1->categories?>" method="post">
        <div class="card bg-secondary text-light mb-3">
          <div class="card-header">

                       <h1>Add Category</h1>

          </div>
          <div class="card-body bg-dark">
            <div class="form-group">
              <label for="title"> <span class="FieldInfo"> Categroy Title: </span></label>
               <input class="form-control" type="text" name="CategoryTitle" id="title"
                      placeholder="Type title here" value="">
            </div>
            <div class="row">
              <div class="col-lg-6 mb-2">
                <a href="<?=$pp1->dashboard?>" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i> Back To Dashboard</a>
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
        <tr><th>No. </th><th>Date&amp;Time</th><th> Category Name</th><th>Creator Name</th><th>Action</th> </tr></thead>
        <tbody>
      <?php

      $SrNo = 0;

      while ($r = $dm->rrnext($cursor))
      {
        $SrNo++;
          //all row fld names lowercase
          switch ($dm->getdbi())
          {
            case 'oracle' : $r = $dm->rlows($r) ; break; 
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

           */ -->
                 <a id="erase_row" class="btn btn-danger"
                    onclick="var yes ; yes = jsmsgyn('Erase row <?=$r->id?>?','') ;
                    if (yes == '1') { location.href= '<?=$pp1->del_row?>t/category/id/<?=$r->id?>/'; }"
                 >Del <?=$r->id?></a>
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
                          $dm->p repareSQL($sql); 
                          $dm->b indvalue(':categoryName', $Category, \PDO::PARAM_STR);
                          $dm->b indvalue(':adminname', $Admin, \PDO::PARAM_STR);
                          $CurrentTime = time(); $DateTime = strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
                          $dm->b indvalue(':dateTime', $DateTime, \PDO::PARAM_STR);
                          $cursor = $dm->e xecute();*/

-->
