<?php
//     J:\awww\www\fwphp\glomodul\user\Home.php
// was J:\awww\www\fwphp\glomodul4\user\admins.php    background:#efefef
declare(strict_types=1);
                       //require_once($pp1->module_path .'/admins.php');
//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\module\user ;
use B12phpfw\core\b12phpfw\Config_allsites as utl ;
use B12phpfw\core\b12phpfw\Db_allsites     as utldb ;
use B12phpfw\dbadapter\user\Tbl_crud       as utl_module ;

use B12phpfw\module\user\Home              as Home_view;

class Home extends utl
{
  public function __construct(object $pp1) 
  {
    
  }


  static public function navbar_top( object $pp1, array $other ): string 
  { 
    $pp1->stack_trace[]=str_replace('\\','/', __METHOD__ ).', lin='.__LINE__ ;

                  if ('') {  //if ($module_ arr['dbg']) {
                    echo '<h3>'. __METHOD__ .'() '.', line '. __LINE__ .' said: '.'</h3>' ;
                    echo '<pre style="font-family:\'Lucida Console\'; font-size:small">';
                      echo '<b>$pp1</b>='; print_r($pp1);
                      //echo '<br><b>$_POST</b>='; print_r($_POST);
                    echo '</pre>'; }
   ?>
   <!--  -->
<!-- N A V B A R  A D M I N   J:\awww\www\fwphp\glomodul\user\n avbar.php  onclick="event.preventDefault()"-->
  <!-- Hero -->
  <div class="hero" data-theme="dark">

    <nav class="container-fluid">
        <ul>
          <li><a href="<?=$pp1->sitehome?>" class="contrast"><strong>Sitehome</strong></a></li>
        </ul>

        <ul>
          <!--li><a href="#" class="contrast" data-theme-switcher="auto">Auto</a></li-->
          <li><a class="contrast" href="<?=$pp1->home?>" title="Refresh this page">Home</a></li>
          <!--li><a href="#" class="contrast" data-theme-switcher="light">Light</a></li>
          <li><a href="#" class="contrast" data-theme-switcher="dark">Dark</a></li-->
          &nbsp; &nbsp; &nbsp; 
          <!--li><a class="contrast" href="<?=$pp1->sitehome?>">Sitehome</a></li>
          <li><a class="contrast" href="result.php">Dashboard</a></li-->



          <?php if(!empty($_SESSION['username'])) { ?>
             <li><a class="contrast" href="<?=$pp1->logout?>">Logout</a></li>

          <?php }else{
            //utl::Redirect_to($pp1->glomodul_url .'/'. $pp1->dir_user) ;
            ?>
             <li><a class="contrast" 
                href="<?=$pp1->loginfrm?>">Login</a></li>
          <?php  } ?>



        </ul>
    </nav>


  </div><!-- Hero -->
   <!-- N AV B A R  END -->

    <?php
    return('1') ;
  } //e n d  f n  n a v b a r


  static public function displ_tbl( object $pp1, array $other): string 
  {
    $pp1->stack_trace[]=str_replace('\\','/', __METHOD__ ).', lin='.__LINE__ ;
                                 //$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
    // cursor a dmins :
    $c_admins = utl_module::get_cursor($sellst='*', $qrywhere= "'1'='1' ORDER BY aname"
      , $binds=[], $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;

    $shares_path = $pp1->shares_path ; //includes, globals, commons, reusables


    $title = 'USER CRud';
    require $pp1->shares_path . '/hdr.php';
    Home_view::navbar_top($pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]); 
                             //require_once("n avbar.php");
    ?>



    <div class="container">
	    <!--h2>Users</h2-->

	
      <?php
          if(!empty($_SESSION['username'])){ echo "Logged in: {$_SESSION['username']}";
          } else{ echo"You're not logged in!";	}
      ?>

      <?= utl::msg_err_succ(__METHOD__) ?>

      <h2>Admins <a class="btn btn-success" href="<?=$pp1->cc_frm?>" title="Add user">Add admin</a></h2>

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
    require $pp1->shares_path . '/ftr.php'; 

    return('1') ;



  } //e n d  f n  d i s p l



} //e n d  c l s
