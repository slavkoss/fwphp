<?php
/**
* step 3
* J:\awww\www\fwphp\glomodul\z_examples\02_mvc\xuding_glob\home.php
* called from Home_ ctr cls method h ome() when usr clicks link/button or any URL is entered in ibrowser  
* calls Tbl_crud cls method rr_ all() =pre-query which sets rows filter (default-where), sort... 
* which calls Db_ allsites method rr() =execute-query which creates cursor for read row by row loop here
*
* Adds user request (interaction, event) eg $id at link end, for read user profile or update or delete.
* 
* Tbl_ crud is ORM (tbl adapter) class, when instantiated is DM object of row in memory to/from DB tbl row
*    Where ORM = Object Relational Mapper, DM = Domain Model, row in memory is model of DB tbl row
* Tbl_ crud maps (adapts) model of tbl row in memory to tbl row in DM data source (DB, web service...)
*
*
* https://getbootstrap.com/docs/4.0/components/buttons/
* 1. <button type="button" class="btn btn-primary">Primary</button> BLUE
* 2. btn-secondary GRAY  3. btn-success GREEN    4. btn-danger RED
* 5. btn-warning YELLOW  6. btn-info DARK GREEN  7. btn-light WHITE, GRAY TXT
* 8. btn-dark BLACK      9. btn-link WHITE, BLUE TXT
*
*/
//namespace B12phpfw ;
use B12phpfw\dbadapter\xuding_glob\Tbl_crud ;

$Tbl_crud = new Tbl_crud ;
$cursor = $Tbl_crud->rr_all($this);
?>
<!--             U S E R  T B L  R E A D -->
<div class="container">
<div class="row">
      <h3>Admins table CRUD PDO MySQL or Oracle or... Bootstrap 4 OOP MVC šđčćž</h3>
</div>

<div class="row">

  <p><a href="<?=$pp1->c?>" class="btn btn-success">Create</a></p> &nbsp;  &nbsp; 
  <p><a href="<?=$pp1->h?>" class="btn btn-info">Help DM</a></p> &nbsp;  &nbsp; 

  <table class="table table-striped table-bordered">

  <thead><tr><th>User Name (click to update)</th><th>Name</th><th>Del.ID</th><th>Profile</th></tr></thead>

  <tbody>
      <?php
    $SrNo = 0;
    while ($r = $this->rrnext($cursor))
    {
      $id = self::escp($r->id) ;
      ?>
      <tr>

      <td><a class="btn" href="<?=$pp1->u . $id?>"><?=self::escp($r->username)?></a></td>

      <td><?=self::escp($r->aname)?></td>

      <td width=9%>
         <a id="erase_row" class="btn btn-danger" title = "Delete row ID=<?=$id?>"
            onclick="
            var vodg ;
            vodg = jsmsgyn('Erase row <?=$id?> ?','') ; // '' means no URL to redirect
            //alert('vodg='+vodg) ; // if OK vodg=1, if CANCEL vodg=0
            if ( vodg == 1 ) { location.href= '<?=$pp1->d . $id?>/'; }
            "
         > <?=$id?></a>
      </td>

      <td width=5%><a class="btn btn-primary" href="<?=$pp1->r . $id?>">Show</a></td>

      </tr> <?php
    }
    self::disconnect();
       ?>
      </tbody>
    </table>
 
 </div>
</div> <!-- /container -->
