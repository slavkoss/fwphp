<?php
/*
    public function showGallery(): Response
    {
        try {
            $imagesLists = $this->galleryManager->getImagesGalleryContents([
                'page'  => $this->request->get('page') ?? 1,
                'limit' => $this->request->get('size') ?? 10,
            ]);
        } catch (\Exception $exception) {
            $errors = true;
        }

        return $this->render(
           'gallery.html'
          , [
              'images_list' => $imagesLists ?? [],
              'error' => $errors ?? false,
          ]);
    }
*/
$uri = sprintf( 'https://picsum.photos/v2/list?%s'
   , http_build_query( //$options
       [
        'page'  => 1, // $this->request->get('page') ?? 1
        'limit' => 10, //$this->request->get('size') ?? 10,
       ]
   ) //Generates URL-encoded qry string from assoc. (or indexed) array
);
          //$contents = $this->client->retrieve($uri);
//$response = $this->client->request('GET', $url);
                    //echo '<pre>apicli $response='; print_r($response) ; echo '</pre>'; 
//$contents = $response->getBody()->getContents();
//$images_list = \json_decode($contents);
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="../assets/style.css" />
    <link rel="stylesheet" href="../assets/gallery.css" />

    <title>Images gallery</title>

  </head>

  <body>
  <h1> Images gallery</h1>
  <p class="c-gallery__description">Show images from endpoint:&nbsp; <b>https://picsum.photos/v2/list</b></p>

  $uri = <a class="c-home__ctn-btn" href="<?=$uri?>"><?=$uri?>"></a> <br /><br />


  <div class="c-gallery__image-ctn">
     <a class="c-home__ctn-btn" href="https://picsum.photos/v2/list">https://picsum.photos/v2/list</a> 
<br /><br /><a class="c-home__ctn-btn" href="https://unsplash.com/photos/6J--NXulQCs">Mountains</a> 
<br /><br /><a class="c-home__ctn-btn" href="https://unsplash.com/photos/pwaaqfoMibI">Sea</a> 
  </div>



  <div class="l-content">

  </div>
  <div class="l-footer">
      <br /><br /> <!--  &copy; 2019 by &nbsp; -->
      Hexagonal architecture, traits... by <a href="http://oumarkonate.com/" rel="nofollow">Oumar KONATE</a>
  </div>
  </body>
</html>
