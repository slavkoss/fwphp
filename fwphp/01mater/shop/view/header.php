<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css"
          href="<?php
            //if ($skin == '01sidebar') 
              echo $css_url_rel;
            //else echo $module_relpath.'/main.css';
            ?>">
            
    <!--  FLEX STICKY HDR / FTR & SCROLL BAR-->
    <style type="text/css">
      footer, header, main {
        padding: 10px; box-sizing: border-box;
      }
    </style>
    <style id="editme">
     * {box-sizing: border-box;}
      body {
        height: 100vh;
        display: flex;
        flex-flow: column;
      }
       header, footer {
        flex: 0 0 content;
       }
       main {
        flex: 1 1 0;
        overflow: scroll;
       
      }
    </style>

</head>

<body>

<header><!-- stycky page title -->
    <h1><?php if (isset($subtitle)) echo $subtitle; ?> My Guitar Shop</h1>
</header>
