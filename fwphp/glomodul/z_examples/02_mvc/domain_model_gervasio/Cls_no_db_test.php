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
;

class Cls_no_db_test
{  
  public static function db_test()
  {
                  // 3RD LAYER IS DATA - NO PERSISTENCE (NO DB or...) - for test :

                  // Even though M performs few simple tasks : cre few posts and binding comments, it shows how to wire domain objects together and put them to work. In this case each object graph is spawned (created, made) by using plain DI (Dependency Injection)
                  //If situation warrants (justifies, "The end justifies the means"), OBJECT GRAPH CREATION should be delegated to more versatile structures, such as DI Container or Service Locator.
                  

                  // 2. create some posts
                  $post01 = new Post(
                    "01. Domain Model 5 code layers (tiers)",
                    "
1. bootstrap (include and initialize an autoloader)
1. domain model of DB (User, Post, Comment entity classes)
1. data (is or is not) persistent - DB, webservice...
1. module (app) C
1. presentation V
"
                  );
                    // add some comments to post
                    $user  = new User("How to consume M", "joe@hisdomain.com"); // 1. create a user
                    $user2 = new User("Fat models, skinny controllers", "joe@hisdomain.com"); // 1. create a user
                    $post01->_comments = array(
                    new Comment("
If we were going to build a NAIVE BLOG APP (all of its object graphs reside all the time in memory and don't need to be persisted ee commited in DB, sent to web service...), there would be no need to create mapping layer (ee classes User_db, Post_db...) :     
- DM row object in memory ----map to---- DB table row (or web service...)    
  ", $user),
                    new Comment("Implementation didn't require to tie up M to any form of persistence infrastructure, therefore M is an easily portable and scalable creature!", $user2)
                    );




                  $user = new User("uuuuuuuuuu", "joe@hisdomain.com");
                  $post02 = new Post(
                    "02. SECOND POST, NO DB",
                    "22222222222222222222222222222222222222"
                  );
                     // add some comments to post
                    $post02->_comments = array(
                      new Comment("POST 2, COMMENT 1 :
Even simplest Domain Model demands definition of   
1. constraints
1. rules
1. relationships among its building objects
1. how building objects will behave in a given context
1. what type of data building objects will carry during their life cycle

Plus, process of transferring model data to and from the storage will likely
require to drop a set of Data Mappers at some point, a fact that highlights
why Domain Models are often surrounded by a cloud of bullying
(intimidating a weaker person to make them do something).", $user)
                    );

                  //4TH LAYER : (BLOG's) MODULE (APP) CONTROLLERS in an MVC stack, which is responsible for pulling in M data and passing it to V (presentational layer). Or V pulls data !
                  // ************************************
                  $posts = (object)array((object)$post01, (object)$post02);

                  //return ($posts) ;
    // 5TH LAYER : PRESENTATION - Graphs can be decomposed back through a skeletal view :
    $pgtitle = 'PHP Building DM (Domain Model) - DATA TO/FROM MEMORY - no persistance data, data is from DM';
    include_once 'tbl.php' ;
  }


}
