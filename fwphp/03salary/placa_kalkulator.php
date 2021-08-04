<!DOCTYPE HTML">
<html><head>

  <meta charset=UTF-8">
  <link rel="stylesheet" media="screen" href="/zinc/themes/site/simplest.css">
  
  <title>Kalkulator plaće</title>
    
  <style>

  </style>
</head><body>

<h1 class="aaa">Kalkulator plaće</h1>
<?php //        http://dev:8083/t1/apl/placa/placa_kalkulator.php
//H:\dev_web\htdocs\t1\apl\placa\placa_kalkulator.php
//H:\dev_web\htdocs\fw\t1\z_test\beyond\Chapter09\09_07_photo_gallery-final\public\admin\login.php
  try
  {
    //require_once("../../includes/initialize.php");

    //if($session->is_logged_in()) { redirect_to("index.php"); }

// Remember to give your form's submit tag a name="submit" attribute!
if (isset($_POST['submit'])) { // Form has been submitted.
  $br2n    = trim($_POST['br2n']);
  $n2      = (double)$_POST['n2'];
  $oo      = (double)$_POST['oo'];
  $kpp     = (double)$_POST['kpp'];
  $stup    = trim($_POST['stup']);
  //

} else { // Form has not been submitted.
  $br2n     = "0";
  $n2       = 7954.83;
  $oo       = 2200;
  $kpp      = 1.18;
  $stup     = '2';
}

// REKURZIJA JER FORMULAMA NE IDE :
// izračun $po12, $po25 i $po40 :
$ii = 0;
$n1 = 2 * $n2;
//
n2_iz_n1:
$ii++;
//
$po = $n1 - $oo; // = $po12 + $po25 + $po40
if ($po >= 2200) $po12 = 2200;
if (($po - 2200) > 0) $po25 = $po - 2200;
if ($po25 > 6600) {
      $po40 = $po25 - 6600;
      $po25 = 6600;
} else $po40 = 0;
// izračun $n2_iz_n1 iz $po12, $po25 i $po40 :
$por = $po12 * 0.12 + $po25 * 0.25 + $po40 * 0.40;
$n2_iz_n1 = $n1 - $por * $kpp; // = $n1 - $por - $prir
//
if ($n2_iz_n1 > $n2 and $ii < 101)
{
    $n1_smanji = ($n2_iz_n1 - $n2) * 14/10 ; // 14/10 -> oko 11 iteracija
           // veci mnzitelj -> veci koraci tj manje iteracija
    if ($ii == 1 or $ii % 10 == 0)  echo 'Iteracija br. '.$ii
       .' $n2_iz_n1 = '.$n2_iz_n1.' Smanjujem n1 za '.$n1_smanji.'<br />';
    //$n1 -= 10; //presporo
    $n1 -= $n1_smanji;
    //$n1 = 2 * $n2_iz_n1; // ovo povecava n2_iz_n1
    goto n2_iz_n1;
}
echo '<br /> Ukupno iteracija: '.$ii.', formula $n1_smanji = ($n2_iz_n1 - $n2) * 14/10 ;';

$br = $n1 / (8/10) ;

    //include_layout_template('admin_header.php');
?>
    
<h3>Izračun bruta (plaće) iz neta2 (za isplatu prije kred. i dod. u netu)</h3>



    <form action="placa_kalkulator.php" method="post">
      <table>

      
        <tbody><tr>
          <td>Mirov.osig: 1=I stup 2=II stup</td>
          <td>
            <input name="stup" maxlength="30" value="<?php echo htmlentities($stup); ?>" type="text">
          </td>
        </tr>

        <tr>
          <td>Osobni odbitak kn:</td>
          <td>
            <input style="text-align: right;" name="oo" maxlength="30" 
              value="<?php echo htmlentities($oo); ?>" type="text">
          </td>
        </tr>

        <tr>
          <td> &nbsp;&nbsp;&nbsp; ili&nbsp;&nbsp;a. Broj djece:</td>
          <td>
            <input style="text-align: right;" name="brdjece" maxlength="30" value="<?php echo htmlentities($brdjece); ?>" type="text">
          </td>
        </tr>

        <tr>
          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. Broj uzdržavanih osoba:</td>
          <td>
            <input style="text-align: right;" name="bruzdr" maxlength="30" value="<?php echo htmlentities($bruzdr); ?>" type="text">
          </td>
        </tr>
        
        <tr>
          <td>Koef.prirpor + 1 (za ZG 1.18):</td>
          <td>
            <input style="text-align: right;" name="kpp" maxlength="30" value="<?php echo htmlentities($kpp); ?>" type="text">
          </td>
        </tr>

        <tr>
          <td>1. Bruto plaća br = n1 / 0.8 kn:</td>
          <td>
            <input style="text-align: right;" name="br" maxlength="30" value="<?php echo htmlentities($br); ?>" type="text">
          </td>
        </tr>        

        <tr>
          <td>2. Dohodak (n1) kn:</td>
          <td>
            <input style="text-align: right;" name="n1" maxlength="30" value="<?php echo htmlentities($n1); ?>" type="text">
          </td>
        </tr>
      
        
        <tr>
          <td>3. Neto primitak (n2) kn: ===> </td>
          <td>
            <input style="text-align: right;" name="n2" maxlength="30" value="<?php echo htmlentities($n2); ?>" type="text">
          </td>
        </tr>


        <tr>
          <td colspan="2">
            <strong><input name="submit" value="IZRAČUN neto->bruto" 
                           type="submit"></strong>
          </td>
        </tr>

<!-- ********************PROVJERA*************** -->
        <tr>
          <td>n2 iz n1: $n2_iz_n1: (= n2 GORE !!) ===>
          </td>
          <td>
            <input style="text-align: right;" name="n2_iz_n1" 
                   maxlength="30" type="text" value=
                      "<?php echo htmlentities($n2_iz_n1); ?>" >
          </td>
        </tr>

        <tr>
          <td colspan="2">

    <p></p>
    <p>Neto2
(za isplatu prije kredita i neoporezivih primitaka), od kojeg polazimo
je zbroj neta2 primanja u brutu i jednog (po jednog) primanja u netu2.</p>
    <p>Podaci primanja u netu2 su razlika podataka prije i nakon dodavanja primanja u netu.</p>
    <p>Ako ima više primanja u netu ono koje se kasnije doda ima puno veći porez,
       pa bi bilo najtočnije dodati ih zbrojeno, ali tada ne znamo kako im rasporediti porez i ostalo.</p>


            <pre><strong>
// --- FORMULAMA NE IDE : korak 2,4 PROVJERA:
//     izr. n2 iz u preth. koraku pretpostav. n1
// izračun $po12, $po25 i $po40 :
$po = $n1 - $oo; // = $po12 + $po25 + $po40
if ($po >= 2200) $po12 = 2200;
if (($po - 2200) > 0) $po25 = $po - 2200;
if ($po25 > 6600) {
      $po40 = $po25 - 6600;
      $po25 = 6600;
} else $po40 = 0;
// izračun $n2_iz_n1 iz $po12, $po25 i $po40 :
$por = $po12 * 0.12 + $po25 * 0.25 + $po40 * 0.40;
$n2_iz_n1 = $n1 - $por * $kpp; // = $n1 - $por - $prir
            </strong></pre>
          </td>
        </tr>
<!-- ************************kraj PROVJERA********** -->



        <tr>
          <td colspan="2">
            <pre><strong>
// --- FORMULAMA NE IDE : korak 1:
// pretpostavljeni n1 :
$po12 = 2200; // pretpostavljeni
// formula za n1 ako je pretpostavljeni por40 = 0
$n1 = ( $n2/0.25 + $kpp * 
           ($po12 * (0.12/0.25 - 1) - $oo) )
      / (1 / (0.25 * $kpp) - $kpp);
            </strong></pre>
          <br>
</td>
        </tr>

        <tr>
          <td colspan="2">
            <pre><strong>
// --- FORMULAMA NE IDE : korak 3: ako je n2_iz_n1
//     nejednako zadanom n2 -> treba formula
//     koja uzima u obzir i por40 :
if ($n2_iz_n1 != $n2) {
   $po12 = 2200; // znamo da je toliki
   $po25 = 6600; // pretpostavljeni, moze biti manji
   $n1 = ( ($n2/$kpp + $po12*(0.12-0.4) 
                 + $po25*(0.25-0.4) )/0.4 - $oo )
         / (1 / (0.4 * $kpp) - 1);
   //  = ( (7954,83/1,18 + 2200*(-0.28) 
                 + 6600*(-0,15) )/0.4 - 2200 )
   //    / (1 / (0.4 * 1,18) - 1);
   //    = ( (6741,3814 - 616 -990 )/0,4 - 2200 ) 
            / (1/0,472 - 1 )
   //    = 10638,4535/1,118644 = 9510,13326
}
// --- korak 4: PROVJERA kao korak 2: 
//              izr. n2 iz n1 preth. koraka
            </strong></pre>
          <br>
</td>
        </tr>



<!--
Doprinosi iz bruto plaće :
Mirovinsko osig. 1. stup :
Mirovinsko osig. 2. stup :
Osobni odbitak :
Porezna osnovica :
Porez i prirez ukupno:
Porez :
- stopa 12% :
- stopa 25% :
- stopa 40% :
Prirez :
Neto plaća :
-->
      </tbody></table>
    </form>

<?php //include_layout_template('admin_footer.php');

    } // end try
  catch(Exception $e)
  {
    print 'Exception '.__FILE__.' : '.$e->getMessage();
  }



/* // FORMULAMA NE IDE :
// --- korak 1:
// pretpostavljeni n1 :
$po12 = 2200; // pretpostavljeni
// formula za n1 ako je pretpostavljeni por40 = 0
$n1 = ( $n2/0.25 + $kpp * ($po12 * (0.12/0.25 - 1) - $oo) )
      / (1 / (0.25 * $kpp) - $kpp);

// --- korak 2: PROVJERA: izr. n2 iz u preth. koraku pretpostav. n1
// izračun $po12, $po25 i $po40 :
$po = $n1 - $oo; // = $po12 + $po25 + $po40
if ($po >= 2200) $po12 = 2200;
if (($po - 2200) > 0) $po25 = $po - 2200;
if ($po25 > 6600) {
      $po40 = $po25 - 6600;
      $po25 = 6600;
} else $po40 = 0;
// izračun $n2_iz_n1 iz $po12, $po25 i $po40 :
$por = $po12 * 0.12 + $po25 * 0.25 + $po40 * 0.40;
$n2_iz_n1 = $n1 - $por * $kpp; // = $n1 - $por - $prir

// --- korak 3: ako je n2_iz_n1 nejednako zadanom n2 -> treba formula
//     koja uzima u obzir i por40 :
if ($n2_iz_n1 != $n2) {
   $po12 = 2200; // znamo da je toliki
   $po25 = 6600; // pretpostavljeni, moze biti manji
   $n1 = ( ($n2/$kpp + $po12*(0.12-0.4) + $po25*(0.25-0.4) )/0.4 - $oo )
         / (1 / (0.4 * $kpp) - 1);
}

// --- korak 4: PROVJERA: izr. n2 iz u preth. koraku pretpostav. n1
// izračun $po12, $po25 i $po40 :
$po = $n1 - $oo; // = $po12 + $po25 + $po40
if ($po >= 2200) $po12 = 2200;
if (($po - 2200) > 0) $po25 = $po - 2200;
if ($po25 > 6600) {
      $po40 = $po25 - 6600;
      $po25 = 6600;
} else $po40 = 0;
// izračun $n2_iz_n1 iz $po12, $po25 i $po40 :
$por = $po12 * 0.12 + $po25 * 0.25 + $po40 * 0.40;
$n2_iz_n1 = $n1 - $por * $kpp; // = $n1 - $por - $prir
*/


?>

</body></html>