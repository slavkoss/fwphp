<?php
// J:\awww\www\fwphp\glomodul\z_examples\MVC_FW\blog\blog5\index.php
// L:\3_sw_video\1_php\robust blog application with PHP(OOP) and MySQL
include('session.php'); 
include('hdr.php');
include('post.php');
include('Tag.php');


$posts = new Post($db);
$tags = new Tag($db);
?>





    <!-- Main -->
    <main class="container">
      <div class="grid">

        <section>

          <hgroup>
            <h2>Tag hgroup is page title</h2>
            <h3>Page subtitle</h3>
          </hgroup>


          <?php
            if(isset($_GET['keyword'])){
              echo 'Search for:'.'<i>'.$_GET['keyword'].'</i>';
            }

            foreach($posts->getPost() as $post) 
            {?>
              <div class="media">
                <div class="media-left media-top">
                  <img src="/vendor/b12phpfw/img/<?php echo $post['image']; ?>" class="media-object" style="width:200px;">
                  <p>
                    Author:Admin<br>
                    Created:<?php echo date('Y-m-d',strtotime($post['created_at'])); ?>
                  </p>
                </div>
                <div class="media-body">
                  <h4 class="media-heading"><a href="view.php?slug=<?php echo $post['slug'];?>"><?php echo $post['title']; ?></a></h4>
                    <?php echo htmlspecialchars_decode($post['description'] );?> 
                </div>
              </div>
          <?php }?>

           <?php
            $sql = "SELECT count(id) from posts";
            $result = mysqli_query($db,$sql);
            $row = mysqli_fetch_row($result);
            $totalRecords = $row[0];
            $totalPages = ceil($totalRecords/5);
            $pageLink = "<ul class='pagination'>";
            
            if(!isset($_GET['tag'])){
              //if there is "tag" we don't show pagination
              if (!isset($_GET['page'])) {
                //is there is no "page" we set $_GET=1 
                $_GET['page']=1;
              }

            $page = $_GET['page'];
            
            if($page>1){

              $pageLink.="<a class='page-link'href='index.php?page=1'>First</a>";

              $pageLink.="<a class='page-link'href='index.php?page=".($page-1)."'><<<</a>";
            }

            for($i=1;$i<=$totalPages;$i++){
              $pageLink.="<a class='page-link'href='index.php?page=".$i."'>".$i."</a>  ";
            }

            if($page<=$totalPages){

              $pageLink.="<a class='page-link'href='index.php?page=".($page+1)."'>>>></a>";

              $pageLink.="<a class='page-link'href='index.php?page=".$totalPages."'>Last</a>";
            }


            echo $pageLink."</ul>";

          }
          ?>
        </section>






        <aside>


            <p>
              <h4>Search Posts</h4>
              <form action="" method="GET">
                <input type="tetx" name="keyword" class="form-control" placeholder="search...">
              </form>
            </p>




            <h4>Browse by Tags</h4>
            <p>
            <?php //  type="button" class="btn btn-outline-warning btn-sm"
            foreach($tags->getAllTags() as $tag){?>
              <a href="index.php?tag=<?php  echo $tag['tag'];?>">
                <button>
                   <?php  echo $tag['tag'];?>
                </button>
              </a>

            <?php  } ?>
            </p>



            
              <h4>Popular posts</h4>
              <?php foreach($posts->getPopularPosts() as $p) {?>
                <p>
              <a href="view.php?slug=<?=$p['slug']?>" 
                 style="color:white;border-bottom: 1px dashed green;"><?=$p['title'];?></a>
              </p>
            <?php }?>
	
	



            <a href="#" aria-label="Example" onclick="event.preventDefault()">
            <img src="XXXhttps://source.unsplash.com/T5nXYXCf50I/1500x750" alt="SLIKA 1 Architecture">
            </a>
            <p>
              <a href="#" onclick="event.preventDefault()">Donec sit amet</a><br>
              <small>Class aptent taciti sociosqu ad litora torquent per conubia nostra</small>
            </p>


            <a href="#" aria-label="Example" onclick="event.preventDefault()"><img src="XXXhttps://source.unsplash.com/tb4heMa-ZRo/1500x750" alt="SLIKA 2 Architecture"></a>
            <p>
              <a href="#" onclick="event.preventDefault()">Suspendisse potenti</a><br>
              <small>Proin non condimentum tortor. Donec in feugiat sapien.</small>
            </p>
            <a href="#" aria-label="Example" onclick="event.preventDefault()"><img src="XXXhttps://source.unsplash.com/Ru3Ap8TNcsk/1500x750" alt="SLIKA 3 Architecture"></a>
            <p>
              <a href="#" onclick="event.preventDefault()">Nullam lobortis placerat aliquam</a><br>
              <small>Maecenas vitae nibh blandit dolor commodo egestas vel eget neque. Praesent semper justo orci, vel imperdiet mi auctor in.</small>
            </p>
        </aside>

      </div>
    </main><!-- ./ Main -->





    <!-- Subscribe -->
    <!--section aria-label="Subscribe example">
      <div class="container">
        <article>
          <hgroup>
            <h2>Subscribe</h2>
            <h3>Litora torquent per conubia nostra</h3>
          </hgroup>
            <form class="grid">
              <input type="text" id="firstname" name="firstname" placeholder="First name" aria-label="First name" required>
              <input type="email" id="email" name="email" placeholder="Email address" aria-label="Email address" required>
              <button type="submit" onclick="event.preventDefault()">Subscribe</button>
          </form>
        </article>
      </div>
    </section--><!-- ./ Subscribe -->


<?php
 include('ftr.php'); 


