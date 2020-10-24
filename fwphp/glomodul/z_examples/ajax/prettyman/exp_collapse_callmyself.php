<?php
// J:\awww\www\fwphp\glomodul\z_examples\ajax\prettyman\exp_collapse_callmyself.php

switch (true)
{
  case isset($_POST['showtxt_btn']) :
    //        E X P A N D E D - exclusive or
    print "<html><head><title>PHP Example</title></head>";
    
    print "<form method='post' action='".basename(__FILE__)."'>";
    print "<input type='submit' id='hidetxt_btn' name='hidetxt_btn' value='Hide text'/>".' (show only button to open text)';
    print "&nbsp;&nbsp; <input type='submit' id='home_btn' name='home_btn' value='Home'/>";
    print "</form>";

    print "<h1>Hello World, \$_POST['showtxt_btn'] is set.</h1>";
    break ;

  case isset($_POST['home_btn']) :
   header('Location: .'); // no rights for dir ch02_Interfaces_Platforms_Containers_3tierProgramming
   //header('Location: http://dev1:8083/index.php?cmd=lsweb&dir=J:\awww\apl\dev1\04knjige\reservation_Prettyman\ch02_Interfaces_Platforms_Containers_3tierProgramming
   //' );
   break ;

  default :
    //  C O L L A P S E D  ('default') - exclusive or
    print "<html><head><title>PHP Example</title></head>";
    print "<form method='post' action='".basename(__FILE__)."'>";
    print "<input type='submit' id='showtxt_btn' name='showtxt_btn' value='Open text'/>";
    print "</form>";
    print "</body></html>";
    break ;
}

/*
if (defined('ENVIRONMENT'))
{
  switch (ENVIRONMENT)
  {
    case 'development':
      ini_set('display_errors', 1);
      error_reporting(E_ALL);
    break;
  
    case 'testing':
    case 'production':
      error_reporting(0);
    break;

    default:
      exit('The application environment is not set correctly.');
  }
}
*/