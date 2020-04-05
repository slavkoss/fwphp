
<!DOCTYPE HTML>
<html>
<head>
<!--link rel="stylesheet" href="/static/css/examples.css" /-->
<!--  /*  flex sticky hdr  */  -->
<link rel="stylesheet" href="/fwphp/b12fw/css/flex_sticky_hdr_ftr.css">
                                <style>
                                /*  flex_sticky_hdr_ftr.css  */
                                /*
                                body {
                                font-size: 2;
                                }
                                header {background-color: #ddaa00;}
                                main {background-color: #fff;}
                                footer {background-color: #ddaa00;}

                                body {margin: 0; padding: 0;}
                                  footer, header, main {
                                    padding: 10px; box-sizing: border-box;
                                }
                                */
                                </style>
<style id="editme">
       /*  flex sticky ftr  */
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


<title>StickyHdrFtr</title>

</head>


<body>
<header><b>Sticky header</b></header>

<main>
<h1>Flexbox sticky header &amp; footer</h1>
<p>In &quot;Sticky Footer with flex&quot; on page 108, we showed a simple mobile example 
in which the footer would always be glued to the bottom of the page no matter 
the height of the device. That visually more complex example is equally easy to 
code: no matter how tall the browser got, and no matter how little content the 
main content had, the footer would always be glued to the bottom of the browser. 
As noted before, these are called &quot;sticky footers&quot; (see Figure 4-5).</p>
<p>Prior to flexbox being supported, we were able to create sticky footers, but 
it required hacks, including knowing the height of the footer. Flexbox makes 
creating sticky footers much simpler. In our first example, the footer always 
sticks to the bottom of the viewport. In our second example, the footer will 
stick to the bottom of the viewport if the page would otherwise be shorter than 
the viewport, but moves down off screen, sticking to the bottom of the page, not 
the viewport, if the content is taller than the viewport.<br>Both examples 
contain the same shell:<br>&lt;body&gt;<br>&lt;header&gt;...&lt;/header&gt;<br>&lt;main&gt;...&lt;/main&gt;<br>
&lt;footer&gt;...&lt;/footer&gt;<br>&lt;/body&gt;<br>We turn the body into a flex container with a 
column direction:<br>body {<br>display: flex;<br>flex-flow: column;<br>}<br>We 
also direct the &lt;main&gt; to take all the available space: it is the only flex item 
with a non-null growth factor.<br>The key difference between a permanent sticky 
footer and a page growing to push the footer to the bottom of the screen only 
when necessary is whether the height of the body is 100 vh or at minimum 100 vh, 
and whether the &lt;main&gt; is allowed to shrink.<br>In our first example, in Figure 
4-6, we want the sticky footer to always be present. If there is too much 
content in the main area, it should shrink to fit. If there isn't enough text to 
fill the screen, it should grow, making our footer always visible:<br>body {<br>
display: flex;<br>flex-flow: column;<br>height: 100vh;<br>}<br>header, footer {<br>
flex: 0 0 content;<br>}<br>main {<br>flex: 1 1 0;<br>overflow: scroll;<br>}<br>
To create a sticky footer that is always visible, we set the height to always be 
exactly the height of the viewport with height: 100vh . We dictate that the 
header and footer can neither grow nor shrink, but rather must always be the 
height of the content. The &lt;main&gt; can both grow and shrink, absorbing all the 
distributable space, if any, scrolling if too tall.</p>
<p>In our second example, if we are OK with the footer being out of view, below 
the page<br>fold, we set the minimum height to 100 vh, and dictate that the 
&lt;main&gt; can grow, but<br>is not required to shrink:<br>body {<br>display: flex;<br>
flex-flow: column;<br>min-height: 100vh;<br>}<br>header, footer {<br>flex: 0 0 
content;<br>}<br>main {<br>flex: 1;<br>}</p>
<p>Using both a sticky footer and sticky header isn't recommended: if the screen 
isn't tall, and the user increases the font, they may end up unable to see any 
of the main content. For this reason, the second example, with min-height 
instead of height set enabling the page to grow is recommended.</p>

</main>
<footer>Sticky footer</footer>
<p>aaaaaaaa&nbsp;</p>
</body>
</html>
