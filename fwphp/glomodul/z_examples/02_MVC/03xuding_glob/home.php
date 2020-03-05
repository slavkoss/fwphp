<?php
/**
* step 3
* J:\awww\www\fwphp\glomodul\z_examples\02_mvc\03xuding_glob\home.php
* called from Home_ ctr cls method h ome() when usr clicks link/button or any URL is entered in ibrowser  
* calls Admin_crud cls method rr_all() =pre-query which sets rows filter (default-where), sort... 
* which calls Db_ allsites method rr() =execute-query which creates cursor for read row by row loop here
*
* Adds user request (interaction, event) eg $id at link end, for read user profile or update or delete.
* 
* Admin_ crud is ORM (tbl adapter) class, when instantiated is DM object of row in memory to/from DB tbl row
*    Where ORM = Object Relational Mapper, DM = Domain Model, row in memory is model of DB tbl row
* Admin_ crud maps (adapts) model of tbl row in memory to tbl row in DM data source (DB, web service...)
*/
namespace B12phpfw ;
$Admin_crud = new Admin_crud ;
$cursor = $Admin_crud->rr_all($this);
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

      <td><a class="btn" href="<?=$this->pp1->u . $id?>"><?=self::escp($r->username)?></a></td>

      <td><?=self::escp($r->email)?></td>

      <!-- $this->pp1->d?>t/admins/id/ . $id 
        var vodg ; alert('vodg='+vodg) ;
        vodg = jsmsgyn('Erase row <?=$id?> ?','') ; // '' means no URL to redirect
        if (  ) { location.href= '<?=$this->pp1->d . $id?>/'; }
      -->
      <td width=9%>
         <a id="erase_row" class="btn btn-danger"
            onclick="
            var vodg ;
            vodg = jsmsgyn('Erase row <?=$id?> ?','') ; // '' means no URL to redirect
            //alert('vodg='+vodg) ; // if OK vodg=1, if CANCEL vodg=0
            if ( vodg == 1 ) { location.href= '<?=$this->pp1->d . $id?>/'; }
            "
         >Del <?=$id?></a>
      </td>

      <td width=5%><a class="btn" href="<?=$this->pp1->r . $id?>">Profile</a></td>

      </tr> <?php
    }
    self::disconnect();
       ?>
      </tbody>
    </table>
 
 </div>
</div> <!-- /container -->
