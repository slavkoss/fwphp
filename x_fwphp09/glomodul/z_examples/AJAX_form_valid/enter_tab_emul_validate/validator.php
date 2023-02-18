<?php
// J:\awww\www\fwphp\glomodul4\help_sw\test\AJAX\validator.php
                if ('0') { echo '<pre>'.__FILE__ .', lin='. __LINE__
                .'<br />     <b>*** '.__METHOD__ .'  SAYS ***</b>';
                //.'<br />===========I N P U T (p a r a m e t e r s) :'
                echo '<br /><h3>$ _POST=</h3>'; print_r($_POST) ;
                //echo '<br />===========O U T P U T (c a l c u l a t e d) :' ;
                  echo '</pre><br />';
                 }
//echo 'hello';
$errors   = array() ;
$response = array() ;
                           //$response['hello'] = 'world' ;

if (empty($_POST['name'])) {
  $errors['name']  = 'Name is needed!' ;
}
if (empty($_POST['email'])) {
  $errors['email'] = 'Email is needed!';
}

$response['errors']  = $errors ;

if(!empty($errors)){
  $response['success'] = false ;
  $response['message'] = 'FAIL!';
} else {
  $response['success'] = true;
  $response['message'] = 'SUCCESS!';
}

$ret = array_merge($response, array('post'=>$_POST)) ;
//echo '<pre>'; print_r($ret) ;  echo '</pre>';
//echo '<pre>'; echo json_encode( $ret, JSON_PRETTY_PRINT ) ;  echo '</pre>';
echo json_encode( $ret, JSON_PRETTY_PRINT ) ;


