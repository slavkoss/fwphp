<?php
$sql = 'SELECT * FROM admins ORDER BY id DESC';
?>
<div class="container">
<div class="row">
      <h3>USERS TABLE CRUD PDO MySQL BOOTSTRAP NON OOPMVC</h3>
</div>

<div class="row">
  <!-- href="create.php" -->
  <p><a href="index.php?c" class="btn btn-success">Create</a></p>

  <table class="table table-striped table-bordered">

  <thead><tr><th>Name</th><th>Email Address</th><th>Action</th></tr></thead>

  <tbody>
      <?php
    foreach ($pdo->query($sql) as $row) { ?>
      <tr>

      <td><a class="btn" href="index.php?u&id=<?=$row['id']?>"><?=$row['username']?></a></td>

      <td><?=$row['email']?></td>

      <td width=5%>
        <a class="btn btn-danger" href="index.php?d&id=<?=$row['id']?>">Del</a>&nbsp;&nbsp;
      </td>
      <td width=5%>
        <a class="btn" href="index.php?r&id=<?=$row['id']?>">Profile</a>
      </td>
      </tr> <?php
    }
    Database::disconnect(); ?>
      </tbody>
    </table>
 
 </div>
</div> <!-- /container -->


<!--

  <th>Telefon</th   //echo '<td width=25>'. $row['user_telefon'] . '</td>';
                //. '<a class="btn btn-success" href="update.php'
          //     .'?id='.$row['id'].'">Update</a>';
-->
