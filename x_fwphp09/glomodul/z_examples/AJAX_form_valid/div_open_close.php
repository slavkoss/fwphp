<?php
header('Content-Type: text/xml');
$vrijeme = date('H:i:s'); $file = basename(__FILE__) ;
?>
<?xml version="1.0" ?>
<!DOCTYPE HTML>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Untitled Document</title>
  <style>
    .plava {color: #0000FF} 
    .plava_bold {color: #0000FF; font-weight: bold; }
    .tzelena_bold {color: darkgreen; font-weight: bold; 
       font:20px
    }
    .bold_darkblue_yellow {color: #0000A0;
       background-color:#FFFF99;
       font-weight: bold;
    }
    .bold_violet_white {   color: #800080;
       font-weight: bold;
    }
  </style>

</head>




<body>
<h4>Ispisala skripta: <?=$file?></h4>
Vrijeme na serveru: <?=$vrijeme?>

<br><br>Klijentska skripta poziva serversku ( 
<span class="bold_violet_white"> klijent-serversko web pozivanje potprograma </span>) radi :

<ol>
  <li>u ibrowseru</li>
  <li>pregaziti dio stranice <strong>div_srvgen</strong> stringom txt_srvgen</li>
  <li><strong>txt_srvgen</strong> može biti u  6 oblika: 
    txt / CSV / JSON / html&nbsp;/ xml / JS.</li>
</ol>

<p> JS može: <br>
  &nbsp;&nbsp;&nbsp; - pozvati serversku skriptu (php) da  stvori txt_srvgen <br>
  &nbsp;&nbsp;&nbsp; - i ubaciti ga u 
  div (span) element stranice ili u dijalog js alert.</p>


  
</body>
</html>
