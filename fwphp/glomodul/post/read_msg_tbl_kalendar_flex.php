<?php
// J:\awww\www\fwphp\glomodul\kalendar\inc\
// http://dev1:8083/fwphp/glomodul/blog/?i/J:|awww|www|fwphp|glomodul|kalendar|inc|kalendar_flex
//if (!defined('URLMODUL_CSS')) { define('URLMODUL_CSS', $module_relpath.'/css'); }
//J:\awww\www\fwphp\glomodul\post\read_msg_tbl_kalendar_flex.css

// http://dev1:8083/fwphp/glomodul/blog/index.php?i/read_post/id/54 - error
namespace B12phpfw ;

use B12phpfw\core\b12phpfw\Db_allsites as utldb ;
use B12phpfw\dbadapter\post\Tbl_crud as Tbl_crud_post ;
use B12phpfw\module\user\Home_ctr ;

  //switch (utldb::getdbi()) { case 'oracle' : $tmp_datetime = 'DATETIME2' ; break;
  //default: 
  $tmp_datetime = 'datetime' ;
  //break; }

$css_files = ["/vendor/b12phpfw/themes/read_msg_tbl_kalendar_flex.css"];

$_from_ymd = date('Y-m-d H:i:s');
$cal_yyyy_mm  = date('Y-m', strtotime($_from_ymd)); // yyyy-mm  $this->_from_ymd
$cal_monthname_yyyy = date('F Y', strtotime($_from_ymd)); // F = month name

$_m1       =10; $_y1       =2019;
$_daysInMonth=31;
$_m1week1d1=3; //or <article class="calendar tuesday days31"><h1><!-- eg October 2019 -->...

?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8" />

  <!--link rel="stylesheet" href="/static/css/examples.css" /-->
  <title>Poruke kalendar</title>
  <?php
  foreach ( $css_files as $fmtf ): ?>
    <link rel="stylesheet" type="text/css" media="screen,projection" href="<?=$fmtf?>"/>
  <?php endforeach; //href="/fwphp/glomodul/post/read_msg_tbl_kalendar_flex.css" />
  ?>
  <style></style>
</head>


<body>
<!-- article class="calendar friday days30"><h1>November 2019</h1 -->
<div class="calendar tuesday days31"><h3><!-- eg October 2019 -->
  <?=$cal_yyyy_mm . ' ('. $cal_monthname_yyyy .')'?></h3>

  <ul><!--  class="days" -->
    <li>Sunday</li><li>Ponedjeljak</li><li>Tuesday</li><li>Wednesday</li>
    <li>Četvrtak</li><li>Friday</li><li>Saturday</li>
    <!--li>Sunday</li><li>Monday</li><li>Tuesday</li><li>Wednesday</li><li>Thursday</li>
    <li>Friday</li><li>Saturday</li-->
  </ul>

  <!-- Start  n e w  ordered list  style="list-style-type: none;"  -->
  <ol class="nonum" style="list-style: none;">

  <?php
  // Create  t a b l e  markup
      //$ii=1; while ($ii<32): echo '<li><br />{{'. ($ii++) .'}}</li>'; endwhile;
      //<!--li><br />{{12345}}<br />{{12345}}<br />{{12345}}<br />{{12345}}</li-->

  //all calendar d a y s  in  m o n t h  and their r o w s
  for ( $iimonthday = 1 ; //expr1 executed once unconditionally at loop begin. Or: ,$x=1,...
        $iimonthday <= $_daysInMonth ; //expr2 is evaluated at iteration begin
        ++$iimonthday ) :              //expr3 is evaluated at iteration end
  {
    $dkal = str_pad($iimonthday, 2, '0', STR_PAD_LEFT)  ;

    //Build opening and closing list item tags (according r o w content !!)
    //$listart = "<li>"; $liend   = "</li>"; // \n\t\t
    next_master:
    $rows_sameday_str = '' ; //was NULL
    //$rows_sameday_str .= '<b> $dkal='. $dkal .' </b>' ; //f o r  testing

    //mysql substr begins with 1 (is php +1)
    //$qrywhere = "datetime LIKE :yyyymm and SUBSTRING(datetime,9,2) = :dkal" ;

    $cursor_filtered_posts = Tbl_crud_post::get_cursor( 
        $sellst="*"
      , $qrywhere="$tmp_datetime LIKE :yyyymm and SUBSTR($tmp_datetime,9,2) = :dkal ORDER BY $tmp_datetime desc" 
      , $binds=
        [
          ['placeh'=>':yyyymm', 'valph'=>'%'.'2019-10'.'%', 'tip'=>'str']
         ,['placeh'=>':dkal',   'valph'=>$dkal, 'tip'=>'str']
        ]
      , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] 
    ) ;

    //           EMPTY  D A Y SQUARE (NO  P O S T S)
    //if (!($rx = $this->rrnext($cursor_filtered_posts)))
    if ( $rx = utldb::rrnext( $cursor_filtered_posts
         , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) and !$rx->rexists )
    { 
                    if ('') {self::jsmsg( [ //b asename(__FILE__).
                       __METHOD__ .', line '. __LINE__ .' SAYS'=>' : '
                       ,'$rx'=>json_encode($rx)
                    ] ) ; }
                                    //$rx=[
                                    //{/ datetime/ :false
                                    //   ,/ 0/ :false
                                    //} ]
      echo '<li style="list-style-type:none;" class="nonum">'.$rows_sameday_str
           .' no posts</li>'.'<br />';
    } else
    {
      //Created date from strtotime("2019-10-09 12:00:00") is 2019-10-09 12:00:00
      $today_mmabr = substr(date("l"),0,3);
            //try { $post_date = n ew \DateTime($rx->$tmp_datetime);
            try { $post_date = new \DateTime($rx->datetime);
            } catch (Exception $e) { echo $e->getMessage(); exit(1); }
            $post_ddabr = substr($post_date->format('l'),0,3);
      $rows_sameday_str .= "Posts: $post_ddabr<br />" ; //f o r  testing
      //still not  l a s t  r o w  in  m o n t h
      // **********************************************************
      //   D a y  h e a d e r  -  1st r o w  in  d a y
      // **********************************************************
      $dtbl = substr($rx->datetime,8,2) ;

      if( $iimonthday !== (int)$dtbl ) {
         $rows_sameday_str .= ' $dtbl='. $dtbl .' notMMM '.$post_ddabr."<br />" ; //f o r  testing
      } else  //day in calender = day in tbl : read p o s t s of that day
      {
        //$rows_sameday_str .= '<b> $dtbl='. $dtbl .' </b>MMM '.$post_ddabr."<br />" ;
              //. ', $_m1week1d1='.$_m1week1d1. '< $iimonthday='.$iimonthday
              //.', $_d aysInMonth='.$_d aysInMonth

        // **********************************************************
        //   D a y  p o s t s
        // **********************************************************
        // ~~~~~~~~~~~~ STRING OF ROWS WITHIN SAME DAY :
        //for (  ; //expr1 executed once unconditionally at loop begin.
        //      substr($rx->datetime,8,2) == $dtbl ; //expr2 is evaluated at iteration begin
        //      $rx = $this->f etchNext() ) : //, ++$iimonthday expr3 is evaluated at iteration end
        while ( substr($rx->datetime,8,2) == $dtbl ): //eg 2019-10-07 from 0
        {
            $link="<a href=\"{$pp1->read_post}id/$rx->id\">{$rx->title}</a>"
                      .' '. substr($rx->datetime,11,5)
              //.', (int)substr($rx->datetime,8,2)='.(int)substr($rx->datetime,8,2)
              //. ', today=$iitoday='.$iitoday
            ;
            //strtotime($rx->datetime); // = string to date eg '2019-10-03 15:16:17'
            try { $post_date = new \DateTime($rx->datetime);
            } catch (Exception $e) { echo $e->getMessage(); exit(1); }
            $post_ddabr = substr($post_date->format('l'),0,3);
            $rows_sameday_str .= " $link "; //DDD$post_ddabr \n\t\t\t

            //if ( !($rx = $this->rrnext($cursor_filtered_posts)) ) {break;}
            if ( $rx = utldb::rrnext( $cursor_filtered_posts
              , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) and !$rx->rexists )
              {break;} ;
        } endwhile; //all same day r o w s

        //e cho $listart . $rows_sameday_str . $liend.'<br />'; // . $date  . $wrap
        echo '<li style="list-style-type:none;" class="nonum"> '
          . ' '. $rows_sameday_str.' </li>'.'<br />'; // . $date  . $wrap
      } //day in calender = day in tbl : read p o s t s of that day

    } //not last r o w  in  m o n t h

  } endfor; //all calendar d a y s  in  m o n t h  and their r o w s

  end_script:
  ?>

  </ol>

</article>






<div>
<p>&copy; 2001-<?php echo date("Y");?>
<?php
    if (isset($_SESSION['user'])) {
       echo " Prijavljen je korisnik: ".$_SESSION['user']->user_name.'</p>' ;
    } else { echo "Niste prijavljeni!";  //echo $_DisplayLinks()
    }
echo '</p></div><br />';






if ('') //if ($module_ arr['dbg'])
{
  //UPDATE `posts` SET `datetime` = '2019-10-12 12:20:29' WHERE `posts`.`id` = 16;
  echo '<p>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</p>' ;
  echo '<pre>';

  echo '<h2>Date arithmetic, see <a href="https://www.w3schools.com/php/php_date.asp">w3schools</a></h2>' ;

  echo 'Current time: date("Y-m-d H:i:s")=' . date("Y-m-d H:i:s") . "\n";
  echo '<br>Today is date("Y.m.d") = ' . date("Y.m.d")
    . '<br />, date("l") = ' . date("l")
    . '<br />, date("j") = ' . date("j")
    . '<br />l=lowercase L     = day of the week eg Tuesday'
    . '<br />j                      = today`s ordno in month'
  ;

  date_default_timezone_set("America/Los_Angeles");
  echo "<br>The time is in America/Los_Angeles " . date("Y.m.j l H:i:s") ;

  date_default_timezone_set("America/New_York");
  echo "<br>                +3 in America/New_York " . date("Y.m.j l H:i:s");

  date_default_timezone_set("Europe/Zagreb"). '<br>';
  echo "<br>                +6 in Europe/Zagreb " . date("Y.m.j l H:i:s");



  echo '<br>Today is date("l jS \of F Y h:i:s A") = ' . date("l jS \of F Y h:i:s A") . ' (l=lowercase L)';
  echo '<br>Today is  date("l jS \of F Y H:i:s") = ' . date("l jS \of F Y H:i:s") . ' (l=lowercase L)';

  $d=mktime(11, 14, 54, 8, 12, 2014);
  echo "<br />Created date from mktime(11, 14, 54, 8, 12, 2014) is " . date("Y-m-d h:i:sa", $d);

  $d=strtotime("2019-10-09 12:00:00");
  echo '<br />Created date from strtotime("2019-10-09 12:00:00") is ' . date("Y-m-d H:i:s", $d);

  $d=strtotime("10:30pm April 15 2014");
  echo '<br />Created date from strtotime("10:30pm April 15 2014") is ' . date("Y-m-d h:i:sa", $d);

  $d=strtotime("tomorrow");
  echo '<br />Created date from strtotime("tomorrow") is ' . date("Y-m-d h:i:sa", $d);

  $d=strtotime("next Saturday");
  echo '<br />Created date from strtotime("next Saturday") is ' . date("Y-m-d h:i:sa", $d);

  $d=strtotime("+3 Months");
  echo '<br />Created date from strtotime("+3 Months") is ' . date("Y-m-d h:i:sa", $d);

  $d=date_create("2013-03-15");
  echo '<br />date_create("2013-03-15") formated "Y/m/d H:i:s"='.date_format($d,"Y/m/d H:i:s");

  $date = \DateTime::createFromFormat('Y-m-d', '2019-10-03');
  echo "<br />Format: 'Y-m-d' of '2019-10-03'=" . $date->format('Y-m-d H:i:s')
    . '<===== H:i:s is time of displaying !!!' ;  //or use $format = 'Y-m-d';

  $date = \DateTime::createFromFormat('Y-m-d H:i:s', '2019-10-03 15:16:17');
  echo "<br />Format: 'Y-m-d H:i:s' of '2019-10-03 15:16:17'=" . $date->format('Y-m-d H:i:s') ;

  echo '</pre>';
}


/*
j                 = today`s ordno in month
l (lowercase 'L') = day of the week eg Tuesday



  // Create  t a b l e  markup   $ t = today day ordno in month
  //for ( $ii=1, $dayinm_ ordno=1, $iitoday=date('j'), $m=date('m'), $y=date('Y');
  //        $dayinm_ ordno<=$_d aysInMonth; ++$ii
  for ( $iimonthday=1, $iitoday=date('j'), $m=date('m'), $y=date('Y');
          $iimonthday<=$_d aysInMonth; ++$iimonthday
  ):
  {
        // // Apply a "fill" class to the boxes occurring before first of the month
        $class = $iimonthday<=$_m1week1d1 ? "fill" : NULL;
        // // Add a "today" class if current date matches current date
        //if ( $iimonthday==$iitoday and $m==$_m1 and $y==$_y1 ) {$class = "today";}

        // // Build opening and closing list item tags
        $listart = sprintf("<li class=\"%s\">", $class); // \n\t\t
        $liend   = "</li>"; // \n\t\t

        $rows_sameday_str = NULL;

        // // Add day of the month to identify the calendar box
        //if ( $_m1week1d1<$iimonthday and $_d aysInMonth>=$dayinm_ ordno )
        //{
            // // Format e vents data
            //if ( isset($e vents[$d ayinm_ordno]) )
            //{
                //foreach ( $e vents[$d ayinm_ordno] as $event ) {
               while ($rx = $this->f etchNext())
               {
                  //echo $iimonthday.' ';
                  // ~~~~~~~~~~~~ ROWS WITHIN SAME DAY :
                  //if($iimonthday == (int)substr($rx->datetime,8,2)) // 2019.10.07
                  {
                   $link='<a href=?loadscript/read/event_ id/'.$rx->id.'">'
                      . $rx->title
                      . '</a>'
                      .' '.$rx->datetime
                      .', (int)substr($rx->datetime,8,2)='.(int)substr($rx->datetime,8,2)
                      . ', today=$iitoday='.$t
                      . ', $_m1week1d1='.$_m1week1d1
                      . '< $iimonthday='.$iimonthday
                      .', $_d aysInMonth='.$_d aysInMonth
                      //.'>= $dayinm_ ordno='.$dayinm_ ordno
                   ;
                   $rows_sameday_str .= " $iimonthday $link <br />"; // \n\t\t\t
                   //echo $listart . $rows_sameday_str . $liend; // . $date  . $wrap
                  }
                  //else {echo '<li></li>' ; }
                }
            //}
            //$dayinm_ ordno++ ;
            //$date = sprintf("<strong>%02d</strong>",$dayinm_ ordno); // \n\t\t\t
        //}
        //else { $date="&nbsp;"; }

        echo $listart . $rows_sameday_str . $liend; // . $date  . $wrap
  } endfor;
*/


                          /*$sql = "S ELECT * FROM posts
                                  WHERE datetime LIKE '%2019-10%'
                                  and SUBSTRING(datetime,9,2) = '$dkal'
                                  ORDER BY datetime desc";
                          //echo $sql ;
                          $this->p repareSQL($sql);
                          $this->e xecute(); */

?>
</body>
</html>