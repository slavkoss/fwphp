<?php
// J:\awww\www\fwphp\glomodul\z_examples\02_mvc\domain_m_lazy_load\UserRepository.php
namespace B12phpfw ;

use PDO ;

/**
 * Repository of users from the database.
 */
class UserRepository extends Db_allsites //which extends Dbconn_allsites
{
  /** @var mixed Reference to DB or ORM database manager object. */
  //private $database;
  public  $userrobj;

  public function __construct() 
  { 
    //MUST OVERWRITE parents __construct !!   or Fatal error: Uncaught Error: Call to private B12phpfw\Db_allsites::__construct() from invalid context ...

    $id=18;
    $cursor = $this->rr("SELECT title FROM posts WHERE user_id=:AdminId"
    , [ ['placeh'=>':AdminId', 'valph'=>$id, 'tip'=>'int']
      ] , __FILE__ .' '.', ln '. __LINE__) ;

    $posts = [];
    //foreach ($userData as $data) {
    while ($row = $this->rrnext($cursor)): {
      //$postr = $row ;
      $posts[] = $row ; //new Post($data);
    } endwhile; 

    //return $posts;


    echo "<pre>\$posts of user id=$id are : "; print_r($posts); echo '</pre>'; 

    echo '<h3>'. basename(__FILE__).' '.__METHOD__ .', line '. __LINE__ .' SAYS : I DO NOT UNDERSTAND OTHER CODE HERE AND IN User cls !!!!!!'.'</h3>';

    // ... Example is simplified for readability.

    //parent::__construct($pp1, $pp1_module_links);


  }

    /**
     * Get user and set reference to call when requiring posts from DB by the given ID.
     *
     * @param int $id
     *
     * @return userrobj
     */
    public function findPostsByUsrId($id)
    {
      //$db = $this->database;
                //$query = $database->query('SELECT * FROM admins WHERE id = :id') ;
                //$query->setParameter('id', $id);
                //$userrobj = new User($query->getResult());

      $cursor = $this->rr("SELECT * FROM admins WHERE id=:AdminId ORDER BY aname"
          , [ ['placeh'=>':AdminId', 'valph'=>$id, 'tip'=>'int']
            ] , __FILE__ .' '.', ln '. __LINE__) ;
      while ($row = $this->rrnext($cursor)): {$usrr = $row ;} endwhile; 

      $userrobj = new User();


              //$ref_usr_posts_closure = function($userrobj) use($id, $database) 
              $ref_usr_posts_closure = function($userrobj) use($id) 
              {
                            //$query = $database->query('SELECT * FROM posts WHERE user_id = :id');
                            //$query->setParameter('id', $id);
                            //$userData = $query->getResult();
                $cursor = $this->rr("SELECT * FROM posts WHERE user_id=:AdminId"
                , [ ['placeh'=>':AdminId', 'valph'=>$id, 'tip'=>'int']
                  ] , __FILE__ .' '.', ln '. __LINE__) ;

                $posts = [];
                //foreach ($userData as $data) {
                while ($row = $this->rrnext($cursor)): {
                  //$postr = $row ;
                  $posts[] = new Post($data);
                } endwhile; 

                  return $posts;
              };

        $userrobj->setReference($ref_usr_posts_closure);
        $this->userrobj = $userrobj ;

        return $this->userrobj ;
    }
}

    /*
    $dsn = "mysql:host=localhost;dbname=z_blogcms" ;
    $options = [
       PDO::ATTR_PERSISTENT   => true
      ,PDO::ATTR_ERRMODE      => PDO::ERRMODE_EXCEPTION
      ,PDO::ATTR_ORACLE_NULLS => PDO::NULL_TO_STRING
    ];
    //self::$instance=new PDO($dsn,'root','',$options);
    $this->database = new PDO($dsn,'root','',$options); */
