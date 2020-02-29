<!--             U S E R  T B L  R E A D -->
<div class="container">
<div class="row">
      <h3>USERS TABLE CRUD PDO MySQL BOOTSTRAP NON OOPMVC</h3>
</div>

<div class="row">

  <p><a href="<?=$this->pp1->c?>" class="btn btn-success">Create</a></p>

  <table class="table table-striped table-bordered">

  <thead><tr><th>Name</th><th>Email Address</th><th>Action</th></tr></thead>

  <tbody>
      <?php
    $cursor = $this->rr("SELECT * FROM admins ORDER BY aname", [], __FILE__ .' '.', ln '. __LINE__) ;
    $SrNo = 0;
    while ($r = $this->rrnext($cursor))
    {
      $id = self::escp($r->id) ;
      ?>
      <tr>

      <td><a class="btn" href="<?=$this->pp1->u?>id/<?=$id?>"><?=self::escp($r->username)?></a></td>

      <td><?=self::escp($r->email)?></td>

      <td width=9%>
         <a id="erase_row" class="btn btn-danger"
            onclick="if (jsmsgyn('Erase row <?=$id?> ?',''))
               { location.href= '<?=$this->pp1->d?>t/admins/id/<?=$id?>/'; }"
         >Del <?=$id?></a>
      </td>
      <td width=5%>
        <a class="btn" href="<?=$this->pp1->r?>id/<?=$id?>">Profile</a>
      </td>
      </tr> <?php
    }
    self::disconnect();
       ?>
      </tbody>
    </table>
 
 </div>
</div> <!-- /container -->
