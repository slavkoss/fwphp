<?php

    $do_pgntion = null ;
    $db_i = 'oci' ;
    $db_hostname = 'dev1:1521/XE:pooled;charset=UTF8' ;
    $db_name = 'hr' ;
    $db_username = 'hr' ;
    $db_userpwd = 'hr' ;
    
    $dsn = $db_i.':dbname='.$db_hostname ;


    try
    {
      //if( !isset( $instance ) || !($instance instanceof PDO) )
      //{
        // FETCH_ASSOC
        $options = [
           PDO::ATTR_PERSISTENT   => true
          ,PDO::ATTR_ERRMODE      => PDO::ERRMODE_EXCEPTION
          ,PDO::ATTR_ORACLE_NULLS => PDO::NULL_TO_STRING
          //,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
          //,PDO::ATTR_EMULATE_PREPARES   => false
        ];
        $conn = new PDO($dsn,$db_username,$db_userpwd,$options);
                      //echo 'connected, $db_i='.$db_i .', DBI='. DBI ;
      //}

      //return $conn; //instance

    }
    catch( PDOException $e )
    {
      die( 'Database Error: ' . $e->getMessage() );
    }
    # Method End

