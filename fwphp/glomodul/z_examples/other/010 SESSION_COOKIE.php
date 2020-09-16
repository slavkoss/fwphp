<?php
$visits=0;
if(isset($_COOKIE['visits'])){
$visits=$_COOKIE['visits'];
$visits++;
}
if(isset($_COOKIE['lasttime'])){
$lasttime =$_COOKIE['lasttime'];
}
setCookie('visits',$visits+1,time()+86400);
setCookie('lasttime',date("d-m-Y H:i:s"),time()+86400);
if(!$visits){
echo 'Welcome for the first time';
}
else
{
echo 'You\'ve been here before '.$visits.' times last time was '.$lasttime.'<BR>';
}
/*
session_start();
session_destroy();
//$_SESSION["userx"]="Udemy";
//$_SESSION["color"]="Red";
//$_SESSION["userx"]="new user";
echo $_SESSION["userx"];
print_r($_SESSION);
if(isset($_COOKIE["userx"])){
    echo $_COOKIE["userx"];
}
else
{
    echo 'No cookie';
}
$int = 86400; // = 1 day
$rNum = rand(0 , 15000); 
//setcookie("userx","Udemy".$rNum,time()+$int);
setcookie("userx","",time()-1000);
*/