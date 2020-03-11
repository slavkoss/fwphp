<?php
/**
*  J:\awww\www\fwphp\glomodul\post_comment\Db_post_comment.php
*/
//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\module\dbadapter\post_comment ;
use B12phpfw\module\blog\Home_ctr ;
//use B12phpfw\core\zinc\Config_ allsites ;

class Db_post_comment //extends Db_allsites
{
  /** 
  * ****************************************************
  * ROUTES TABLE = I N C L U D E S  OR  METHOD CALLS
  * ****************************************************
  */
    public function __construct() //$saltLength=NULL
    {
      /** 
      * NO NEED (COMPLICATED -> CAN HARM) to instantiate parent 
      * (occupy memory with global fn-s and variables) because 
      * methods in this cls use CRUD methods in global $db object
      * which is their parameter !!
      */
        // Call parent constructor to get or create db object
        //parent::__construct(); 
    }


  //         u p d  c o m m e n t _ s t a t
  public function upd_comment_stat(object $pp1, object $dm)
  {
    //copy of an already created object can be made by cloning it.
    $uriq = $pp1->uriq ;
                              if ('') { echo '<br /><h3>'.__METHOD__ .', line '. __LINE__ .' SAYS:</h3>'
                              .'<br />works if redirect commented U R L  query array ='.'$u riq=' ;
                              if (isset($uriq))
                                { echo '<pre>'; print_r($uriq) ; echo '</pre>'; }
                              else { echo ' u riq arr. not set<br />' ; } 
                              echo 'c l a s s  name of $dm='.get_class($dm);
                              echo '<br />c l a s s  name of $dm='.get_class($dm);
                              echo '<br />c l a s s  name of $dm_post_comment='.get_class($Db_post_comment);
                              }
                              // outputs :
                              //c l a s s name of $dm=B12phpfw\Home_ctr
                              //c l a s s name of $dm=B12phpfw\Home_ctr
                              //c l a s s name of $Db_post_comment=B12phpfw\Db_post_comment

      $flds     = "SET status=:status, approvedby=:admin" ;
      $qrywhere = "WHERE id=:id" ;
      
      $id   = $uriq->id ;
      $stat = $uriq->stat ;
      $binds = [
        ['placeh'=>':status', 'valph'=>$stat, 'tip'=>'str']
       ,['placeh'=>':admin',  'valph'=>$_SESSION["adminname"], 'tip'=>'str']
       ,['placeh'=>':id',     'valph'=>$id, 'tip'=>'int']
      ] ;
      $cursor = $dm->uu($dm,'comments',$flds,$qrywhere,$binds);

      if ($cursor) {
        if ($stat == 'ON') {$_SESSION["SuccessMessage"]="Comment Approved Successfully ! " ;
        } else {$_SESSION["SuccessMessage"]="Comment DisApproved Successfully ! " ;}
      }
      else { $_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !"; }

                      /*  ?><SCRIPT LANGUAGE="JavaScript">
                         alert( "<?php echo __METHOD__ .', line '. __LINE__ .' SAYS: '
                               .'\\n $dm->pp1[\'comments\']=' 
                               . (isset($dm->pp1->comments)?$dm->pp1->comments:'NOT SET')
                               ; ?>" 
                         ) ;
                         </SCRIPT><?php */ //works if redirect commented
    //$dm->Redirect_to($dm->pp1->comments);
  }





} // e n d  c l s  
