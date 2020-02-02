<!doctype htm1>
<html>
<head>
  <title>validate</title>
  <meta charset="UTF-8">
  
<style>
 input, textarea {
    box-sizing: border-box;
    margin: .5em 0;
    width: 100%;
}
</style>
</head>

<body>

<!-- -->
<form action="validator.php" method="POST" name="myform"  id="myformid">
  <table>
  <tr><td>Name:</td><td><input autofocus type="text" class="form-group" name="name"></td></tr>

  <tr><td>Email:</td><td><input type="email" class="form-group" name="email"></td></tr>
  </table>
  
  <button type="submit">Submit</button>
</form>
<span id="message"></span>

<!--script src="/zinc/themes/bootstrap/js/zepto.min.js"></script-->
<!--script src="/zinc/themes/bootstrap/js/jquery.min.js"></script-->
<script>

</script>

</body></html>

