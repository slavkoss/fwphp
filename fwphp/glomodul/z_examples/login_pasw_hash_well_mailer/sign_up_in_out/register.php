<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="style.css" type="text/css">

    <title>Register</title>
</head>

<body>
  <div class="signin-form">
    <div class="container">
      <div class="alert alert-info">
        <h1><?php $type = $_GET['pkg']; echo $type ?> Member Registration</h1>
      </div>
      <div id="dis">
        <!-- here message will be displayed -->
      </div>

      <form method='post'  action="create.php">
        <table class='table table-bordered'>
        <tr>
          <td>Name</td>
          <td><input type='text' name='emp_name' class='form-control' placeholder='' required /></td>
        </tr>

        <input type="hidden"  value="<?php $type = $_GET['pkg']; echo $type ?>" name="type" class='form-control'>

        <input type='hidden' name='cdate'  value="<?php echo date('Y-m-d'); ?>" class='form-control' placeholder='' >

        <tr>
            <td>Mobile</td>
            <td><input type='text' name='mobile' value="<?php echo '03'; ?>" class='form-control' placeholder='' ></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td><select name="gender" class='form-control'>
                <option value="Male">Male</option>
                <option  value="Female">Female</option>
                </select></td>
        <tr>
            <td>Email</td>
            <td><input type='text' name='email' value="<?php echo '@gmail.com'; ?>" class='form-control' placeholder='' ></td>
        </tr>
        <tr>
            <td>City</td>
            <td><input type='text' name='city' class='form-control' placeholder=''>
        </tr>

        <tr>
            <td>Question:

            <?php

                                           $a = rand(0, 9);
                                           $b = rand(0, 9);

                                         ?> &nbsp;<span class="red"><?php echo "$a + $b"; ?> =</span><br>
                                          <input value="<?php echo $a ?>"  name="a" type="hidden">
                                         <input value=" <?php echo $b ?>" name="b"  type="hidden"></td>

                                          <td> <input type="text"  placeholder='answer here' name="ans" class='form-control' /></td>

        </tr>
  <input type='hidden' name='links' value="<?php echo 'Link Provided Time 12 Hours'; ?>" class='form-control' placeholder='' >

      <input type='hidden' name='click' value="<?php echo '0'; ?>" class='form-control' placeholder='' >

        <input type='hidden' name='balance' value="<?php echo '0'; ?>" class='form-control' placeholder='' >

        <input type='hidden' name='emp_payment' value="<?php echo '0'; ?>" class='form-control' placeholder='' >

        <input type="hidden" name="estatus" value="Pending" class='form-control'>


        <tr>
            <td colspan="2">
            <input type="checkbox" checked="checked" > <a href="https://computerpakistan.com/ppc.html" target="_blank">I Agree</a>
            <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save">
        <span class="glyphicon glyphicon-plus"></span> Register
      </button>
            </td>
        </tr>

    </table>
</form>

</div>

</div>
</body>
</html>
