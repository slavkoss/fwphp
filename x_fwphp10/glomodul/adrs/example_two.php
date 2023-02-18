<!-- J:\awww\www\fwphp\glomodul\adrs\example_two.php-->
<div class="container">
    This page EXAMPLE2 RECIVES TWO PARAMETERS p1='param1' and p2='param2'.<br>
    This page is  i n c l u d e d  with Home cls ex2 method.<br>
    This page URL is :
    <h3><?=$pp1->module_url?>?i/ex2/p1/param1/p2/param2/</h3>
  <p>Important part of Property pallette $pp1 is <b>uriq = URL (URI) query parts</b> :
  </p>
  <ul>
  <li>[i] => ex2 where ex2 is method in Home cls to be called which :
         <ol>
         <li>calls some method
         <li>includes some script
         <li>or URL calls some method or some script
         </ol>
  <li>[p1] => param1 This is method (script) parameter 1
  <li>[p2] => param2 This is method (script) parameter 2
  </ul>


    <p>url GET parameter p1=<?=$param1?> <br>
    url GET parameter p2=<?=$param2?> </p>

    <p>You are in View: <?=__FILE__?></p>
</div>
