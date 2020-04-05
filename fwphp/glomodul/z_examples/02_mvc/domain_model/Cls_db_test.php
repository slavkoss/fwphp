<?php

namespace DMtest; // module name

// ***********************************************************
// Mapping the Blog’s Domain Objects to and from the DAL
// ***********************************************************

// 2ND LAYER IS HOME TO OUR DOMAIN MODEL
// ************************************
use Model\User
  , Model\Post
  , Model\Comment
  // 3RD LAYER IS DATA - PERSISTENCE MECHANISM - DB (or web service or...) 
  //           - not needed for get_data_no_db_test() :
  // **********************************
  , CoreDB\Global_db 
  // mapping layer domain model - DB or web service or... :
  , ModelMapper\User_db
  , ModelMapper\Post_db
  , ModelMapper\Comment_db
;

class Cls_db_test
{  
  public static function db_test()
  {
    // create PDO adapter
    $globdb_obj = new Global_db("mysql:dbname=z_blogcms", "root", ""); //$adapter db, usr, psw
     
    // create mappers
    $usrdb_obj   = new User_db($globdb_obj);
    $Comment_db  = new Comment_db($globdb_obj, $usrdb_obj); //child before parent !
    $Post_db     = new Post_db($globdb_obj, $Comment_db);
    //mappers have been initialized by dropping their collaborators into the corresponding constructors. They're ready to get some real action. Let’s use post mapper and insert few trivial posts into the DB :

    $userrobj = new User("EverchangingJoe", "joe@example.com"); //in memory
                          if ('1') { echo ''. __METHOD__ .'() method SAYS : ';
                            //echo '<b>$sql='; print_r($sql); echo '</b>' ;
                            echo '<pre>$userrobj='; print_r($userrobj); echo '</pre>';
                          }
    //$usrdb_obj->cc($userrobj); //in dbtblrow (cre id)


    /*
    // Joe's comments for post1 (post ID = 1, user ID = 1)
    $cmntrobj0101 = new Comment("POST1 COMMENT1", $userrobj); //in memory
                       //$Comment_db->cc($cmntrobj, 1, $userrobj->id);  
      //$Comment_db->cc($cmntrobj, $postrobj01->id, $userrobj->id); //in dbtblrow (cre id)
    $cmntrobj0102 = new Comment("POST1 COMMENT2", $userrobj); //in memory
      //$Comment_db->cc($cmntrobj, $postrobj->id, $userrobj01->id); //in dbtblrow (cre id)
    */
    $postrobj01 = new Post(
        "POST1 Welcome to blog CRUD", "POST1 SUMMARY"
      //, [$cmntrobj0101, $cmntrobj0102]
    ) ;                                       //in memory
    // or $postrobj01->_comments = [$cmntrobj0101, $cmntrobj0102];
                          if ('1') { echo ''. __METHOD__ .'() method SAYS : ';
                            //echo '<b>$sql='; print_r($sql); echo '</b>' ;
                            echo '<pre>$postrobj01='; print_r($postrobj01); echo '</pre>';
                          }
    //$Post_db->cc($postrobj01);            // in dbtblrow (cre id)



    /*
    // Joe's comment for the second post (post ID = 2, user ID = 1)
    $cmntrobj0201 = new Comment("POST2 COMMENT1", $userrobj); //in memory
                 //$Comment_db->cc($cmntrobj, 2, $userrobj->id);
      //$Comment_db->cc($cmntrobj, $postrobj02->id, $userrobj->id); //in dbtblrow (cre id)
    $postrobj02 = new Post(
         "POST2", "POST2 SUMMARY"
       , [$cmntrobj0201]
    ) ;                                           //in memory
    // or $postrobj02->_comments = [$cmntrobj0201];
    
    //$Post_db->cc($postrobj02);                 //in dbtblrow (cre id)
    */
                  //Notice that FK (foreign keys) used to sustain (supply) bound between comments and u sers have been picked up at runtime. In production, they most likely (probably) should be gathered inside UI (user interface).

    //4TH LAYER : (BLOG's) MODULE (APP) CONTROLLERS in an MVC stack, which is responsible for pulling in M data and passing it to V (presentational layer). Or V pulls data !
    // ************************************
                  //Now that the blog’s DB has been finally hydrated with a couple of posts, comments, and a chatty user’s info, we pull in data and dump it on screen :
    //workhorse that creates blog domain object graphs on request from DB and put them in memory :

    $pgtitle = 'PHP Building DM (Domain Model) - DATA TO/FROM DM (MEMORY) - no persistance data, data for view is from DM';
    
    //$posts = [$postrobj01, $postrobj02]; //data from DM objects, ee no db data 
    $posts = [$postrobj01]; //data from DM objects, ee no db data 

    //$pgtitle = 'PHP Building DM (Domain Model) - DATA TO/FROM DB (or web service...) - persistance data to/from DM';
    //$posts = $Post_db->findAll(); //$p osts = (object)array((object)$p ost01, (object)$p ost02);

    // ***********************e n d  persistence mechanism - DB (or web service...)

    //return ($posts) ;
    // 5TH LAYER : PRESENTATION - Graphs can be decomposed back through a skeletal view :
    include_once 'tbl.php' ;

  }


}
