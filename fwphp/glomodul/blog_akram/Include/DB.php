<?php

switch (true) 
{ 
  case DBI==='mysql':
    include_once('DB_mysql.php') ;
    break;

  default:
    include_once('DB_oracle.php');
    break;
}
