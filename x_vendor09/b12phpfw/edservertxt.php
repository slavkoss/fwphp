<?php
// http://dev/test/books/ledford/edservertxt.php
// J:\dev_web\htdocs\inc\utl\edservertxt.php
//228 PA R T   I I I The Android Platform
//C H A P T E R   1 2 Developing Mobile Web Applications 227

// http://dev/inc/utl/edservertxt.php?file=J:\dev_web\htdocs\z_doc\learnng\ng_1_3_8\tema/examples_tema/02_01/finished/angular/index.html&line=1&prev=10000&next=10000
if (isset($_GET['file'])) {
   $file = str_replace('/',DIRECTORY_SEPARATOR, $_GET['file']);
}
else {
   $file = str_replace('/',DIRECTORY_SEPARATOR, $_SERVER['SCRIPT_FILENAME']);
}
$file = str_replace(DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
                   ,DIRECTORY_SEPARATOR, $file) ; // realpath

$thedir=dirname($file);
//
echo 'thedir='.$thedir ; 
echo '<br />'.'file='.$file ; 

//
$ext[1]="txt";  $ext[0]="TXT";
$ext[3]="html"; $ext[2]="HTML";
$ext[5]="php";  $ext[4]="PHP";
//
syslog(LOG_INFO, "{$_SERVER['REMOTE_ADDR']}: Remote Edit Accessed.");
//
/* *******************************************
   1. NIJE  P O S T:  F O R M A sa gumbom "O p e n"
*********************************************/
if($_SERVER['REQUEST_METHOD'] != 'POST')
{
   if(is_readable($thedir))
   {
      head();
         echo "<form action=\"" . basename($_SERVER['PHP_SELF']);
         echo "\" method=\"post\">\n";
         echo "<select name=\"the_file\">\n";
         chdir($thedir);
         $filelist=d2a($thedir, true);
         foreach($filelist as $file)
         {
            $ex=substr(strrchr($file, '.'), 1);
            if(in_array($ex,$ext) && is_writable($file))
            {
               echo "<option value=\"$file\">$file</option>\n";
            }
         }
         echo "</select>\n";
         echo "<br/>\n";
         echo "<input type=\"submit\" name=\"open\"";
         echo "value=\"Open\"/>\n";
         txtarea("");
      tail();
   }
   else
   {
      reply("Error: Bad directory (nije readable).\n");
   }
} // kraj NIJE  P O S T:    F O R M A
// ***********************************
//
/* *****************************************
      OBRADA UNESENOG U  F O R M U 
      o p e n,  s a  v e  t x t - a
********************************************/
// 1. p o s t  o p e n
else if(isset($_POST['open']))
{
   if(is_writable($_POST["the_file"]))
   {
      $file2open=fopen($_POST["the_file"], "r");
      $current_data=@fread($file2open,
         filesize($_POST["the_file"]));
      // echo preg_replace($pattern, $replacement, $string);
      $current_data= preg_replace("</textarea>", "<DO-NOT-EDIT>",  $current_data);
      //$current_data=eregi_replace("</textarea>", "<DO-NOT-EDIT>",  $current_data);
      head();
         echo "<form action=\"" . basename($_SERVER['PHP_SELF']);
         echo "\" method=\"post\">\n";
         echo "<input type=\"hidden\" name=\"cur_file\" ";
         echo "value=\"" . $_POST["the_file"] . "\"/>\n";
         echo $_POST["the_file"];
         echo "<br/>\n";
         echo "<input type=\"submit\" name=\"save\" ";
         echo "value=\"Save\"/> ili zatvorite ovaj dokument u ibrowseru \n";
         txtarea($current_data);
      tail();
      fclose($file2open);
   }
   else
   {
      reply("Error: Cannot open file.\n");
   }
}
// 1. p o s t  s a  v e
else if(isset($_POST['save']))
{
   if(is_writable($_POST["cur_file"]))
   {
      $file2ed=fopen($_POST["cur_file"], "w+");
      $data_to_save=$_POST["mods"];
      $data_to_save= preg_replace("<DO-NOT-EDIT>", "</textarea>",  $data_to_save);
      //$data_to_save=eregi_replace("<DO-NOT-EDIT>", "</textarea>",  $data_to_save);
      $data_to_save=stripslashes($data_to_save);
      if(fwrite($file2ed,$data_to_save)) 
      {
         reply("File saved.\n");
         fclose($file2ed);
      }
      else
      {
         reply("Error: Cannot save file.\n");
         fclose($file2ed);
      }
   }
   else
   {
      reply("Error: Cannot save file.\n");
   }
}
//
//
//
function head()
{
   echo "<html>\n";
   echo "<head>\n";
   echo "<title>\n";
   echo "Remote Editor\n";
   echo "</title>\n";
   echo "</head>\n";
   echo "<body>\n";
}
function tail()
{
   echo "</body>\n";
   echo "</html>\n";
}
function reply($text)
{
   head();
      echo $text;
      echo "<br/>\n";
      //echo "<a href=\"\">Back to editor</a>.\n";
      ?>
         <a href="http://dev/inc/utl/edservertxt.php?file=<?php
         echo $file //dirname(dirname(__FILE__))         .'/examples_tema/02_01/finished/angular/index.html'
         ;
      ?>" target="_blank">Back to editor</a>
      <?php
      
   tail();
}
function txtarea($text)
{
   if( strpos( $_SERVER['HTTP_USER_AGENT'],
               'Android') !== FALSE)
   {
      $Android=1;
      $rows=5;
      $cols=30;
   } else
   {
      $Android=0;
      $rows=30;
      $cols=80;
   }
   echo "<br/>\n";
   if($Android == 1)
   {
      echo "<span style=\"-webkit-box-shadow:10px 10px 5px #888;\">\n";
   }
   echo "<textarea name=\"mods\" rows=\"";
   echo $rows . "\" cols=\"" . $cols . "\">\n";
   echo $text;
   echo "</textarea>\n";
   if($Android == 1)
   {
      echo "</span>\n";
   }
   echo "<br/>\n";
   echo "</form>\n";
}
function d2a($dir, $recurse)
{
   $me=basename($_SERVER['PHP_SELF']);
   $files=array();
   if($handle=opendir($dir))
   {
      while(false !== ($file=readdir($handle)))
      {
         if($file != "." &&
         $file != ".." &&
         $file != $me &&
         substr($file,0,1) != '.')
         {
            if(is_dir($dir. "/" . $file))
            {
            if($recurse)
            {
               $files=array_merge($files, d2a($dir. "/" .
               $file,
               $recurse));
            }
            }
            else
            {
               $file=$dir . "/" . $file;
               $files[]=preg_replace("/\/\//si", "/", $file); 
            }
         }
      }
   closedir($handle);
   asort($files);
   }
   return $files;
} // e n d  f n  d 2 a
?>