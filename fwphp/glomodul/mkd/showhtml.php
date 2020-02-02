<?php
    /**
    *  f n  m d 2 h t m ( ) :  P a r s e d o w n  displays .txt or .md or .mkd as html
    * http://dev1:8083/fwphp/www4/glomodul/mkd/?Home/md2htm/J:\awww\www/readme.md/
    * CALLED FROM 
    * CALLS (extern) Parsedown to display txt from content subfolder
    */
//  public function md2htm($fle_to_displ_path )
//  {
    //http://dev1:8083/fwphp/glomodul4/mkd/?Home/md2htm/J:/awww/www/readme.md
    //NEVER $_GET['fle']

    //Warning: require(/home/slavkoss/public_html/vendor/erusev/parsedown/parsedown.php): failed - P...php not p...php
    require $wsroot_path.'vendor/erusev/parsedown/Parsedown.php';

    $md_fle_url  = $md_fle_url ; 

    $fle_displ_url = '?edit='.$fle_to_displ_path .'/' ;

    $pdown = new \Parsedown; // Parsedown cls has no namespace
    ?>
    <!DOCTYPE html><html lang="hr"><head><title>HTMLofMKD</title>
       <link rel="stylesheet" href="/vendor/erusev/parsedown/styles/default.css">
       <script src="/vendor/erusev/parsedown/highlight.pack.js"></script>
       <script>hljs.initHighlightingOnLoad();</script>


          </head> <body>
    <?php
    echo $pdown->text(
      '<b>'.'Markdown txt ' . $fle_to_displ_path .' Parsedown-ed to HTM. '
        . "[<a href='$fle_displ_url'"
           . ' title="SimpleMDE edit : '. ( isset($_GET['edit'])?rtrim($_GET['edit'],'/'):'' )
           .'"> <b>Edit file - here</b>
           </a>]'
                  .'&nbsp; &nbsp;<a href=\'index.php\' title=\'index.php\' >Home</a>'
     .'</b>'
           .'<br />(WYSIWYG md editor SimpleMDE or use some desktop markdown text editor).'

        . "[<a href='https://domchristie.github.io/turndown/'"
           . ' title="html2markdown"> <b>html2markdown</b></a>]'

    );
    echo $pdown->text(file_get_contents($fle_to_displ_path)) ;
    //Warning: file_get_contents(?home/md2htm/J:): failed to open stream
