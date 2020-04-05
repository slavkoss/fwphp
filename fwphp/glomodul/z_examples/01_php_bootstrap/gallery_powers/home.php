<!--div id="wrapper"-->
<div id="maincontent">

  <h2>Blog sa galerijom slika PHP, PDO, PDOOCI (OCI8) prva stranica <?=$selectedImage?></h2>

<?php 
if ($SHOW_PICTURES) {
    if (isset($imageSize)) { ?>
      <div id="pictureWrapper">

        <p id="caption"><?=$caption?></p>
      
        <img src="<?=$selectedImage?>" 
             alt="Random image: <?=$selectedImage?>" 
             title="Random image: <?=$selectedImage?>" 
             class="picBorder" 
             <?php echo $imageSize[3]; ?>
        >

      </div>
      <?php 
      } // kraj if (isset($imageSize)) 
} // prikazati sliku gore desno      
      ?>  
      
<p>      
U ibrowseru izaberite Character encoding: UTF-8.<br/>
F5 za promjenu slike (osvježiti ovu stranicu).<br />
<?php
/*
echo <<<EOTXT
       <a href="$A PLDI R/i ndex.ph p">$A PLDI R/inde x.ph p</a>.
EOTXT;
*/
?></p>

    <h3>Testovi HR user :</h3>
    <ol>
       <li>Ispis slogova radnika 
          <?php
echo <<<EOT
<a href="t1/oci8test_HR.php"> okomito </a> <br />
           </strong> (t1/oci8test_HR.php)
EOT;
?>           
       <strong></strong> <br />
        </li>
<br />
        
       <li>
          <?php
echo <<<EOT
<a href="t1/oci8test.php"> LOV / CRUD forma šifrarnika 
</a> <br />
            </strong> (t1/oci8test.php)
EOT;
?>
          <br/>
          i<strong> zadavanje broja redaka</strong>. 
          
      </li>

      <br /><li><strong> </strong>
            <?php
echo <<<EOT
<a href="oci8testOOP_HR.php"> 
         OOP ispis employees tablice </a> 
 </strong> 
 <br />(oci8testOOP_HR.php)
EOT;
?>
            <br />
            Testing Db Class - literatura L1&nbsp; page 3-8 (42/112) 
       </li>         
    </ol>

    <p></p>
    <p>
    <strong>L1</strong>  Oracle DB Express Edition  2 Day + PHP Developer's Guide 
    <br />
    11g Release 2 (11.2) E18555-03 July 2011&nbsp; &nbsp
        Pokaži <a href=
"/inc/utl/showource.php?file=<?php echo str_replace(
       "home.php", "config.php", __FILE__
       ); ?>" >config.php</a>
    </p>
  </div>
<!-- e n d  div id="maincontent" -->


