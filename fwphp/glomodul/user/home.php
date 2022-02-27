<?php
//     J:\awww\www\fwphp\glomodul\user\Home.php
// was J:\awww\www\fwphp\glomodul4\user\admins.php    background:#efefef
declare(strict_types=1);
                       //require_once($pp1->module_path .'admins.php');
//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\module\user ;
use B12phpfw\core\b12phpfw\Config_allsites as utl ;
use B12phpfw\core\b12phpfw\Db_allsites     as utldb ;
use B12phpfw\dbadapter\user\Tbl_crud       as utl_module ;


class Home extends utl
{
  public function __construct(object $pp1) 
  {
    
  }

  static public function displ( object $pp1): string 
  {
    //$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
    // cursor a dmins :
    $c_admins = utl_module::get_cursor($sellst='*', $qrywhere= "'1'='1' ORDER BY aname"
      , $binds=[], $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;

    $shares_path = $pp1->shares_path ; //includes, globals, commons, reusables


    $title = 'USER CRud';
    require $pp1->shares_path . 'hdr.php';
    require_once("navbar.php");
    ?>



    <div class="container">
	    <!--h2>Users</h2-->

	
      <?php
          if(!empty($_SESSION['username'])){ echo "Logged in: {$_SESSION['username']}";
          } else{ echo"You're not logged in!";	}
      ?>

      <?= utl::msg_err_succ(__METHOD__) ?>

      <h2>Admins<a class="btn btn-success" href="<?=$pp1->cc_frm?>" title="Add user">Add admin</a></h2>

      <table class="table table-striped">
        <thead>
        <tr>
          <th>No</th><th>DelID</th><th>Date&Time</th><th>Username</th>
          <th>Full Name</th><th>Added by</th><th>Action</th>
        </tr>
        </thead>

        <tbody>
          <?php
          $SrNo = 0;




          while ( $r = utldb::rrnext( $c_admins, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] )
                  and $r->rexists
          ):
          {
            $id = $r->id ;
            $SrNo++;
            ?>
            <tr>
              <td><?=$SrNo?> </td>

              <td>
                 <a id="erase_row" style="color:red;"
                    onclick="var yes ; yes = jsmsgyn('Home.php: Erase row <?=$id?>?','') ;
                    if (yes == '1') { location.href= '<?=$pp1->dd.$id?>/'; }"
                    title="Delete tbl row ID=$id"
                 ><?=$id?>
                 </a>
              </td>

              <td><?=self::escp($r->datetime)?></td>

              <td>
                <a href="<?=$pp1->upd_user_loggedin . $id?>"
                   title="Edit tbl row"
                ><?=self::escp($r->username)?></a>
              </td>

              <td><?=self::escp($r->aname) . ($pp1->dbg ? ' / '. $r->password : '') ?></td>

              <td><?=self::escp($r->addedby)?></td>

              <td><!--  width=15% -->
                  <div class="grid">

                    <a href="<?=$pp1->rr . $id?>" title="Read - show user profile">View</a>

                    &nbsp; <a href="<?=$pp1->loginfrm . $id?>">Login</a>

                  </div>
              </td>
            </tr>
            <?php
          } endwhile; ?>
        </tbody>
      </table>
    </div>

    <script src="/vendor/b12phpfw/themes/picocss/minimal-theme-switcher.js"></script>
</body>


    <?php
    require $pp1->shares_path . 'ftr.php'; 

    return('1') ;



  } //e n d  f n  d i s p l



} //e n d  c l s
