<?php
// J:\awww\www\fwphp\glomodul\z_examples\02_mvc\ddd_blog_buenosvinos\Tbl_crud.php
// J:\awww\www\fwphp\glomodul\z_examples\02_mvc\ddd_blog_buenosvinos\PDOPostRepo.php
declare(strict_types=1);

namespace B12phpfw\dbadapter\ddd_blog_buenosvinos ;

use B12phpfw\core\zinc\Db_allsites;

use B12phpfw\core\zinc\Config_allsites ;
use B12phpfw\module\ddd_blog_buenosvinos\Home_ctr ;

use B12phpfw\core\zinc\Interf_Tbl_crud ;



//class PDOPostRepository implements PostRepository
                    //public function byId(PostId $id);
                    //public function add(Post $post);
class Tbl_crud implements Interf_Tbl_crud
{
  static protected $tbl = "posts";
  
  /*private $pdo;
  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
  } */


  static public function rr_byid( int $id, array $other=[] ): object
  { 
    $cursor =  Db_allsites::rr("SELECT * FROM ".self::$tbl." WHERE id=:id"
    ,$binds=[ ['placeh'=>':id', 'valph'=>$id, 'tip'=>'int'] ]
    ,$other=['caller2' => __FILE__ .' '.', ln '. __LINE__ , 'caller1' => $other['caller'] ]
    ) ;
    $rx = Db_allsites::rrnext($cursor) ;
    if (is_object($rx)) return $rx ; else return ((object)$rx);
  }

  static public function rr( // *************** r r (
    string $sellst, string $qrywhere='', array $binds=[], array $other=[] ): object
  {
    return (object)[] ;
  }

  static public function rrnext(object $cursor): object
  {
               //while (
    $rx = Db_allsites::rrnext($cursor) ;
               //): { $row = $rx ; } endwhile;
    if (is_object($rx)) return $rx ; else return ((object)$rx);
  }

  // pre-query
  static public function rr_all( string $sellst, string $qrywhere="'1'='1'"
     , array $binds=[], array $other=[]): object  //returns $cursor
  {
      //             DEFAULT SQL QUERY :
      $cursor = Db_allsites::rr( "SELECT $sellst FROM ".self::$tbl." ORDER BY datetime desc"
         , $binds, $other ) ;
      return $cursor ;

    //$Db_allsites::disconnect(); //problem ON LINUX
    return $cursor ;

  }




  static public function get_submitted_cc(): array //return '1'
  {
    $submitted = [
     $_POST["PostTitle"]
    ,$_POST["Category"]
    ,strftime("%Y-%m-%d %H:%M:%S",time())
    ] ;
    return $submitted ;
  }
  //  c c(UserInterface $user) {
  static public function cc( object $pp1, array $other=[]): string //return id or 'err_c c'
  {
    // 1. S U B M I T E D  F L D V A L S - P R E / O N  I N S E R T
      $submitted_cc = self::get_submitted_cc() ;
      list( $PostTitle, $Category, $Target, $Admin, $imageName, $img_desc
            , $SummaryText, $datetime
      ) = $submitted_cc ;
      $_SESSION["submitted_cc"] = $submitted_cc ;


    // 2. C C  V A L I D A T I O N
    $valid = '1' ;
    switch (true) {
      case (empty($PostTitle)||empty($Category)): 
        $valid = "Title and Category Cant be empty"; break ;
      case (strlen($PostTitle)<5): $valid = "Post Title is minimum 5 characters"; break ;
      case (strlen($SummaryText)>4000): $valid = "Summary is max 4000 characters"; break ;
      //default: break;
    }

    if ($valid === '1') {} else {
      $_SESSION["ErrorMessage"]= $valid ;
      Config_allsites::Redirect_to($pp1->addnewpost);
      goto fnend ; //exit(0) ;
    }

    // 3. C R E A T E  D B T B L R O W - O N  I N S E R T
    $flds     = "datetime,title,summary" ;
    $valsins  = "VALUES(:datetime,:postTitle,:SummaryText)" ;
    $binds = [
      ['placeh'=>':datetime',     'valph'=>$datetime, 'tip'=>'str']
     ,['placeh'=>':postTitle',    'valph'=>$PostTitle, 'tip'=>'str']
     ,['placeh'=>':SummaryText',  'valph'=>$SummaryText, 'tip'=>'str']
    ] ;

    $cursor = Db_allsites::cc(self::$tbl, $flds, $valsins, $binds, $other=['caller'=>__FILE__.' '.',ln '.__LINE__]);

    Config_allsites::Redirect_to($pp1->addnewpost);

    return('1');
    fnend:
  }


  /*
  public function byId(PostId $id)
  {
    $stm = $this->db->prepare(
      'SELECT * FROM posts WHERE id = ?'
    );
    $stm->execute([$id->id()]);

    //return recreateFrom($stm->fetch());
  }
  public function add(Post $post)
  {
    $stm = $db->prepare(
      'INSERT INTO posts (title, content) VALUES (?, ?)'
    );
    $stm->exec([
      $post->getTitle(),
      $post->getContent(),
    ]);
  }
  */



}