<?php
//if (DBG) { ?>
  <hr />
  <h4>$hashed_password = $row->user_pass; if (password_verify('socnet', $hashed_password)) {echo...</h4>
  <!--eg socnet, $2y$10$eUjrML1GiMdpNQXouRiuiumVwspSnXVJs6RT6eTtJOVP5TWqVkPxm
  <br /> eg socnet, $2y$10$8xkZqVwDJZUSQORi7CLRs.cxwjSlq1xRol1Z87o/cBpyk.jXNhAni 
  <br /> Above if outputs : -->
  <?php
  $hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';
  if (password_verify('rasmuslerdorf', $hash)) {echo 'Psw "rasmuslerdorf" is valid!';} else {echo 'Invalid "rasmuslerdorf" password.';}
  
  ?><br /><?php
  $hash = '$2y$10$eUjrML1GiMdpNQXouRiuiumVwspSnXVJs6RT6eTtJOVP5TWqVkPxm';
  if (password_verify('socnet', $hash)) {echo 'Psw "socnet" is valid!';} 
  else {echo '<br />Invalid "socnet" password.';}
  ?><br /><?php
  
  $hash = '$2y$10$8xkZqVwDJZUSQORi7CLRs.cxwjSlq1xRol1Z87o/cBpyk.jXNhAni';
  if (password_verify('socnet', $hash)) {echo 'Psw "socnet" other pswhash is valid!';} 
  else {echo '<br />Invalid "socnet" password.';}
  
  ?><br /><?php
  $hash = '$2y$10$vmL9ZDdVmf2DpZXlcexBRefeaJlN2wBPVqo.5umf.pz6PBTtoWzii';
  if (password_verify('ss', $hash)) {echo 'Psw "ss" is valid!';} 
  else {echo '<br />Invalid "ss" password.';}

  ?>
  <br />Above "Psw...is valid" is impossible if we know psw hash and do not know psw, ee <b>impossible is decrypt psw from it`s hash !!</b>



  <p>&nbsp;</p>
  <h4>$its_hash_60charEACHTIMENEW = password_hash(Spsw, PASSWORD_DEFAULT);</h4>

  password_hash("socnet"... FOR SAME PSW CREATES NEW PSW HASH !! - Try F5 : '
  <br /><?=password_hash("socnet", PASSWORD_DEFAULT)?>

  <br /><br />password_hash("socnet2"... FOR SAME PSW CREATES NEW PSW HASH !! - Try F5 : '
  <br /><?=password_hash("socnet2", PASSWORD_DEFAULT)?>
  
  <br /><br />password_hash("ss"... FOR SAME PSW CREATES NEW PSW HASH !! - Try F5 : '
  <br /><?=password_hash("ss", PASSWORD_DEFAULT)?>
  
  <pre>/**
   * password_hash() - Creates a password hash to see where password_verify came from.
   * Salt option is deprecated as of PHP 7.0.0. - use salt generated by default. 
   * Hash our password using the current DEFAULT algorithm.
   * This is presently (2018 year) BCRYPT, and will produce a 60 character result.
   * 60 char may change over time, so your storage 255 char would be good.
   */</pre>
   <hr />This script is <?=__FILE__?>
  <?php  
//} //e n d  i f  D B G

echo '<br /><br /><hr />'; include(dirname(dirname(dirname(__DIR__))) .'/zinc/showsource.php');
