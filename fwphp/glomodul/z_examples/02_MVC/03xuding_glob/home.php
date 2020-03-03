<?php
// J:\awww\www\fwphp\glomodul\z_examples\02_mvc\03xuding_glob\home.php
namespace B12phpfw ;
//User_ crud is ORM class : DM of row in memory to/from DB tbl row
//where ORM = Object Relational Mapper, DM = Domain Model, row in memory is model of DB tbl row
//$cursor = User_crud::rr_all($this);
$User_crud = new User_crud ;
$cursor = $User_crud->rr_all($this);
?>
<!--             U S E R  T B L  R E A D -->
<div class="container">
<div class="row">
      <h3>USERS TABLE CRUD PDO MySQL/Oracle BOOTSTRAP OOP MVC šđčćž</h3>
</div>

<div class="row">

  <p><a href="<?=$this->pp1->c?>" class="btn btn-success">Create</a></p>

  <table class="table table-striped table-bordered">

  <thead><tr><th>Name</th><th>Email Address</th><th>Action</th></tr></thead>

  <tbody>
      <?php
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
