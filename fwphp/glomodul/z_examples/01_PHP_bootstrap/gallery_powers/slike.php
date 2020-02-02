<div id="maincontent">
  <div id="gallery">
    <h2>Slike 1 do 10, uk. 10 (2 puta istih 10)</h2>
      <table id="thumbs">
<!-- ************************************
        1. MALE SLIKE IZNAD VELIKE
*****************************************This row is repeated-->
<tr> 
<?php 
#$images = array(array('file' => 'kinkakuji', 'caption' => 'The Golden Pavilion in Kyoto')
# array('file' => 'maiko', 'caption' => 'Maiko&#8212;trainee geishas in Kyoto'),
#$selectedImage = $IMGPATH . "/{$images[$i]['file']}.jpg";
$i = 0; 
do
{ 
//echo "<br/>****** ".($i+1).' '.$IMGPATH . '/'.$images[$i]['file'].'.jpg';
//echo '<br/>"'.'ctr.php?inc=slike.php&image='.$IMGPATH.'/'.$images[$i]['file'].'jpg'.'"';
//echo '<br/>"'.$IMGPATH.'/'.$images[$i]['file'].'.jpg'.'"';
?>
   <td>
   <a href=<?php echo '"'.'ctr.php?inc=slike.php&pic='.$i.'"';?>>
      <img src=<?php echo '"'.$IMGPATH.'/'.$images[$i]['file'].'.jpg'.'"';?>
        alt=<?php echo '"'.$IMGPATH.'/'.$images[$i]['caption'].'"';?>
        width="70" height="54"
      >
       </a>
   </td>
  <?php 
  $i++ ;
} while ($i < count($images)); 
?>
</tr>               
</table>


<!-- ********************************************************* 
    2. VELIKA SLIKA ISPOD MALIH Navigation link goes here 
************************************************************** -->
<div id="main_image">

  <?php
$pic = filter_input(INPUT_GET, 'pic', FILTER_SANITIZE_SPECIAL_CHARS);
#echo "<br/>****** rbr slike="; if (!is_null($pic)) echo $pic; else echo 'null';
  
# ------------------------------------------------------------
//TEKST ISPOD VELIKE SLIKE  <p>Vodeni bazen kod Ryoanji hrama, Kyoto</p>
if (is_null($pic)) $vtmp = $images[1]['caption'];
else $vtmp = $images[$pic]['caption'];
echo "<p>$vtmp</p>" ; 
  
if (is_null($pic)) $vtmp = $IMGPATH.'/'.$images[1]['file'].'.jpg';
else $vtmp = $IMGPATH.'/'.$images[$pic]['file'].'.jpg';
echo <<<EOTXT
  <p><img src="$vtmp" alt="$vtmp"></p>
EOTXT;


?>

</div>
<!--e n d  div id="m ain_ i mage"-->
        </div>
        <!--e n d  div id="g allery"-->

        <!--h2>Slike</h2> <p id="picCount">1 do 8, uk. 8</p-->
</div>
<!--e n d  div id="m ainc ontent"-->
<!--php include($INCPATH . "/ftr.php"); ?-->
</body>
</html>