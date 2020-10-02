<?php
    /**
    *  f n  m d 2 h t m ( ) :  P a r s e d o w n  displays .txt or .md or .mkd as html
    * http://dev1:8083/fwphp/www4/glomodul/mkd/?Home/md2htm/J:\awww\www/readme.md/
    * CALLED FROM 
    * CALLS (extern) Parsedown to display txt from content subfolder
    */

    require $pp1->wsroot_path.'vendor/erusev/parsedown/Parsedown.php';
    $pdown = new \Parsedown; // Parsedown cls has no namespace

    //http://sspc2:8083/fwphp/glomodul/mkd/?i/edit/path/J:\awww\www\\readme.md
    $fle_displ_url = '?i/edit/path/'. $fle_to_displ_path ;
    //http://dev1:8083/zinc/showsource.php?file=J:/awww/www/fwphp/glomodul/mkd/02/02_domain_model/DM_Gervasio_part2.txt&line=55&prev=10000&next=10000
    //http://dev1:8083/zinc/showsource.php?file=02/02_domain_model/DM_Gervasio_part2.txt&line=55&prev=10000&next=10000
    $colored_fle_displ_url = '/zinc/showsource.php?file='. realpath($fle_to_displ_path)
      .'&line=55&prev=10000&next=10000' ;

    ?>
    <!DOCTYPE html><html lang="hr">
    <head>
    <title><?=basename($fle_to_displ_path)?></title>
       <link rel="stylesheet" href="/zinc/themes/mini3.css">
       <!--link rel="stylesheet" href="/vendor/highlight_js/styles/default.css"-->
       <!--Ugly, no lines in tbls -->
       <!--script src="/vendor/highlight_js/highlight.pack.js"></script-->
       <!--script>
          document.addEventListener('DOMContentLoaded', (event) => {
            document.querySelectorAll('pre code').forEach((block) => {
              hljs.highlightBlock(block);
            });
          });
       </script-->


          </head> <body>
    <?php
    //          TOP TOOLBAR
    //ob_start(); // this shows html below
    ?>
      WYSIWYG md editor SimpleMDE or use some desktop markdown text editor
        &nbsp; &nbsp;<a href="index.php" title="index.php">Home</a>

      &nbsp; &nbsp;[<a href="https://domchristie.github.io/turndown/"
          title="html2markdown"> html2markdown </a>]

      <br /><b>Markdown txt <?=$fle_to_displ_path?> Parsedown-ed to HTML.</b>
        &nbsp; &nbsp;[<a href="<?=$fle_displ_url?>"
            title="SimpleMDE edit : <?=isset($_GET['edit'])?rtrim($_GET['edit'],'/'):''?>"
          ><b> Edit text</b>
         </a>]

        &nbsp; &nbsp;[<a href="<?=$colored_fle_displ_url?>"
            title="Higligted code <?=isset($_GET['edit'])?rtrim($_GET['edit'],'/'):''?>"
          ><b> Colored text</b>
         </a>]


    <?php
    //$top_toolbar = ob_get_contents();
    //ob_end_clean();

    //echo $pdown->text($top_toolbar);

    //Warning: file_get_contents(?home/md2htm/J:): failed to open stream
    $mkdowntxt = file_get_contents($fle_to_displ_path) ;
    $htmltxt = $pdown->text($mkdowntxt) ;
    echo $pdown->text($htmltxt) ;

//
