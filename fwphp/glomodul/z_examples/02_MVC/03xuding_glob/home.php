<!--             U S E R  T B L  R E A D -->
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
    //foreach ($pdo->query($sql) as $row) {... $row['id'] $row['username']... ORDER BY id DESC
    $cursor = $this->rr("SELECT * FROM admins ORDER BY aname", [], __FILE__ .' '.', ln '. __LINE__) ;
    $SrNo = 0;
    while ($r = $this->rrnext($cursor))
    {
      $id = self::escp($r->id) ;
      ?>
      <tr>

      <td><a class="btn" href="index.php?u&id=<?=$id?>"><?=self::escp($r->username)?></a>
      </td>

      <td><?=self::escp($r->email)?></td>

      <td width=5%>
        <!--a class="btn btn-danger" href="index.php?d&id=<?=$id?>">Del</a>&nbsp;&nbsp;-->
        <a class="btn btn-danger" href="index.php?d/<?=$id?>">Del</a>&nbsp;&nbsp;
                                 <!-- 
                          { location.href= '<=$this->pp1->del_row>t/admins/id/<=$r->id>/'; }"
                          $this->pp1->del_row = QS.'i/del_row_do/' ; //used for all tables !!
                                 <!--
                       <!--a id="erase_row" class="btn btn-danger"
                          onclick="if (jsmsgyn('Erase row ?',''))
                          { location.href= '<?=''?>t/admins/id/<=$r->id>/'; }"
                       >Del</a--> 
      </td>
      <td width=5%>
        <a class="btn" href="index.php?r&id=<?=$id?>">Profile</a>
      </td>
      </tr> <?php
    }
    self::disconnect(); //Database::disconnect()
       ?>
      </tbody>
    </table>
 
 </div>
</div> <!-- /container -->
