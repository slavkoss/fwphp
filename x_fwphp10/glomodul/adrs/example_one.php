<!-- J:\awww\www\fwphp\glomodul\adrs\example_one.php-->
<div class="container">
    This page EXAMPLE1 URL (web adress - web name) is :
    <h3><?=$pp1->module_url?>?i/ex1/</h3>
     where ex1 is method in Home cls.

  <p>
  ex1 method  I N C L U D E S  this page = view whose oper.system adress is : <?=__FILE__?>.
  </p>

  <p> </p>



<p><kbd title="Press the Y key on your keyboard to execute a script. This requires JavaScript to be enabled in your browser">Hit Y to Continue.</kbd></p>

<script>

function showkey( e )
{
  if( e.keyCode === 89 || e.keyCode === 121 )
  {
    alert( 'Y pressed. Thank You.' )
  }
}

document.onkeydown = showkey

</script>




</div>
