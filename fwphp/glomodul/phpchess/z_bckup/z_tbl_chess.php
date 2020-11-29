<!--https://www.w3resource.com/php-exercises/php-for-loop-exercise-9.php -->
<?php
$boards_in_row = 4 ;
$boards_rows = 2 ;
function print_board() 
{ ?>
  
   <table width="270px" cellspacing="0px" cellpadding="0px" border="1px">
    <!-- a,b,c... = first row top -->
    <tr height="15px" align=center bgcolor=#D3D3D3>
       <td></td><td>a</td><td>b</td><td>c</td><td>d</td>
       <td>e</td><td>f</td><td>g</td><td>h</td><td></td>
    </tr>
    <?php
    for($row=1;$row<=8;$row++): // 8 rows (ranks)
    { ?>
      <tr height=30px align=center>
        <!-- 8,7,6... = first col left -->
        <td align=center width=20px bgcolor=#D3D3D3><?=(9-$row)?></td>
        <!-- 8 columns (files) x ...px --><?php
        for($col=1;$col<=8;$col++):
        {
          $total=$row+$col;
          if($total%2==0) {
            echo "<td width=34px bgcolor=#FFFFFF></td>"; //white square
          } else {
            echo "<td width=34px bgcolor=#D3D3D3></td>"; //lightgray square
          }
        } endfor ; ?>
        <!-- 8,7,6... = last col right -->
        <td align=center width=20px bgcolor=#D3D3D3><?=(9-$row)?></td>
      </tr> <?php
    } endfor ;
    ?>
    <!-- a,b,c... = last row bottom -->
    <tr height=15px align=center bgcolor=#D3D3D3>
       <td></td><td>a</td><td>b</td><td>c</td><td>d</td>
       <td>e</td><td>f</td><td>g</td><td>h</td><td></td>
    </tr>
  </table>
  <?php
};
?>

<!DOCTYPE html>
<html> 
<head> 
  <title>Chess Boards</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body> 
  <!--h3>Chess Board using Nested For Loop</h3-->

  <!-- 4 boards in row -->
  <table width="100%" cellspacing="0px" cellpadding="0px" border="1px">

    <?php
    //$boards_in_row = 4 ;
    //$boards_rows = 2 ;
    for($board_row=1;$board_row<=$boards_rows;$board_row++): { //while(false !== ...) {
      echo '<tr>' ;
          for($col=1;$col<=$boards_in_row;$col++): { // 8 rows (ranks)
            echo '<td style="padding:5px;">' ; print_board() ; echo '</td>' ;
          } endfor ;
      echo '</tr>' ;
    } endfor ;
      ?>

  </table>
</body>
</html>