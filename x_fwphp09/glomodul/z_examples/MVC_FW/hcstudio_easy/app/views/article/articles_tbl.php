<?php
// J:\awww\www\fwphp\glomodul\z_examples\MVC_FW\hcstudio_easy\app\views\article\articles_tbl.php
        // M -> V  data flow : V pulls data from M :
        $c_articles = $this->app->connection->prepare( 
           "SELECT * FROM posts" ); //articles  article
        $c_articles->execute(); // CREATE CURSOR OBJECT to read cursor row by row in V
        //$articles = $c_articles->fetchAll(\PDO::FETCH_OBJ); // puts pointer at last row
?>
<section class="hero is-info is-fullheight">

  <div class="container">
      <?= $controller->getMessage() ?>

      <h1 class="title">List of articles by name</h1>

      <table>
      <tbody>
        <tr>
          <th width="4%">Id</th>
          <th width="85%">Article name</th>
          <th width="3%">Upd</th>
          <th width="3%">Upd</th>
        </tr>
      <?php
      $idx=1;
      //foreach($articles as $row){
      // http://dev1:8083/fwphp/glomodul/mkd/?i/edit/path/01\001_config_ssl_tls\hosts.txt
      // http://dev1:8083/fwphp/glomodul/blog/?i/edmkdpost/flename/Prijedlozi_za_Nacrt_NPDTG_20.12.2019.txt/id/20
      // http://dev1:8083/fwphp/glomodul/blog/?i/read_post/id/78
      while($row = $c_articles->fetchObject()) {

        ?>
        <tr>
          <td width="4%">
             <a title="Delete article in DB (not txt !)" href="<?= BASE_URL ?>/article/del?id=<?=$row->id?>"
                style="color:red;"><?=$row->id?>
             </a>
          </td>
          <td width="85%"><a title="View article" href="<?= BASE_URL ?>/article/view?id=<?=$row->id?>">
            <?=$row->title?></a><?=$row->summary?>
          </td>
          <td width="3%"><a href="<?=BASE_URL.'/article/view?id='.$row->id?>">edit sum</a></td>
          <td width="3%"><a href="<?=WEB_URL .'/fwphp/glomodul/mkd/?i/edit/path/J:\\awww\\www\\fwphp\\glomodul\\blog\\msgmkd\\'. $row->title ?>">edit txt</a></td>
        </tr>
        <?php $idx++;
      } ?>
      
      </tbody>
      </table>
  </div>


</section>