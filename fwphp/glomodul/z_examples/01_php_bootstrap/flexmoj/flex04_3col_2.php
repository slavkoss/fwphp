<!doctype html>
<html>
<head>
  <meta charset="utf-8" />

  <title>Inner Page</title> 
  
  <style>
  head {display: block;}
  head * {display: none;}
  </style>
  
<style contenteditable>
html {
  background-color: #eeeee8;
  font-family: trebuchet, geneva, sans-serif;
} 
body { 
  background-color: #deded8;
  margin: 0;  
} 

article, aside, footer, header { 
  padding: 0.5rem; 
  box-sizing: border-box; 
} 
header { 
  background-color: #333; 
  color: #ccc; 
  text-align: center; 
  border-bottom: 1px solid; 
} 
aside { 
  background: linear-gradient(to bottom, white 50%, #deded8 80%);
} 
/* default navigation values */ 
nav { 
    display: flex;  
} 
main nav {
  flex-flow: column;
  background: linear-gradient(to bottom, #ccc 50%, #deded8 80%);
}
nav a { 
  text-align: center; 
  background: #ccc; 
  color: black;

} 
nav a:hover { 
  outline: 1px solid #bbb; 
  color: red; 
  text-decoration: underline; 
}

main nav a {
  line-height: 3;
  border-bottom: #aaa solid 1px;
  margin-bottom: 1px;
}
footer nav a {
  margin: 0 5px; 
  padding: 5px 0; 
  text-decoration: none;
  flex: auto; 
}
 
footer {
  color: white;
  background-color: #333;
}
footer p {
  text-align: center;
}

footer p a {
  color: #aaa;
}
/* larger screen */ 
@media screen and (min-width: 30rem){ 
  body { 
    max-width: 75rem; 
    margin: auto;
  } 
  main { 
    display: flex; 
    flex-wrap: wrap; 
    box-sizing: border-box; 
  }  
  article { 
    flex: 60%; 
  } 
  main nav, 
  aside { 
    flex: 20%; 
  } 
} 
body { 
    display: flex; 
    flex-direction: column; 
    min-height: 100vh;
}
header, footer {
  flex: 0 0 content;
}
main {
  flex: 1;
}
  </style>
  

  
<!--  flex sticky hdr / ftr 
       STICKY FTR : 
          footer, header, main {...
          header, footer {...
       
-->
<style type="text/css">
  header, main {
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
   header {
    flex: 0 0 content;
   }
   main {
    flex: 1 1 0;
    overflow: scroll;
   
  }
</style>  
  
</head>



<body>
<body>
<header>
<h1>Site Wide Header</h1>
</header>
<main>
<nav>
<a href="#1">Home</a>
<a href="#2">About</a>
<a href="#3">Blog</a>
<a href="#4">Careers</a>
<a href="#5">Contact Us</a>
</nav>
<article>
<h2>Calendar with flexbox and CSS counters</h2>
<p>
In Calendar example class is the day of the week that is the first day of the month.&nbsp; 
Learning Flexbox https://sci101web.wordpress.com/</p>
  <h1>
  Learning Flexbox</h1>
  <p>
  Flexbox is a parent and child relationship. Flexbox layout is activated by 
  declaring display: flex; or display: inline-flex; on an element which then 
  becomes a flex container, arranging its children within the space provided and 
  controlling their layout. The children of this flex container become flex 
  items.</p>
  <p>
  Flexbox works on an axis grid system. With flexbox you add CSS property values 
  to a flex container element, indicating how the children, the flex items, 
  should be laid out.</p>
  <p>
  The children can be laid out from left to right, right to left, top to bottom, 
  or even bottom to top. The flex items can be laid out side by side on a single 
  line, or allowed, or even forced, to be wrapped onto multiple lines based on 
  the flex containers flex property values. These children can be visually 
  displayed as defined by the source order, reversed, or rearranged to any order 
  of your choosing.<br>Should the children of your flex container not fill up 
  the entire width or height of the container, there are flexbox properties 
  dictating how to handle the extra space, including preserving the space or 
  distributing it between the children. When space is preserved, you can group 
  the children to the left, the right, or centered, or you can spread them out, 
  defining how the space is spread out either between or around the&nbsp; 
  children.<br>You can grow the children to take up all the available space by 
  distributing that extra space among one, some, or all of the flex items. You 
  get to dictate how the children grow by distributing the extra space evenly, 
  proportionally, or by set amounts. The children can be aligned with respect to 
  their container or to each other, to the bottom, top, or center of the 
  container, or stretched out to fill the container. Regardless of the 
  difference in content length among sibling containers, with flexbox you can 
  make all the siblings the same size with a single CSS declaration.<br>If there 
  isn’t enough space to contain all the children, there are flexbox properties 
  you can employ to dictate how the children should shrink to fit within their 
  container.</p>
  <p>
  Flexbox defines a formatting context along with properties to control layout. 
  When you set an element to be laid out as a flexible box, it will only flex 
  its immediate children, and not further descendants. However, you can make 
  those descendants flexible boxes as well, enabling some really complex 
  layouts. An element that has both a parent and a child can be both a flex 
  container and a flex item.<br>Elements that aren’t flexed, and are not 
  absolutely positioned, have layout calculations biased to block and inline 
  flow directions. Flex layout, on the other hand, is biased to the flex 
  directions. The flex-flow value (see “The flex-flow Shorthand Property” on 
  page 14) determines how content is mapped to the top, right, bottom, left, 
  along a horizontal or vertical axis, and by width and height.</p>
  <p>
  Once you set an element to be a flex container, its children follow the 
  flexbox rules for layout instead of the standard block, inline, and 
  inline-block rules. Within a flex container, items line up on the “main axis.” 
  The main axis can either be horizontal or vertical so you can arrange items 
  into columns or rows. The main axis takes on the directionality set via the 
  writing mode: this main axis concept will be discussed in<br>depth later on 
  (see “Understanding axes” on page 25).</p>
  <p>
  In the next sections we’ll cover how to make a flex container using the 
  display property, then explain the various flex container properties to 
  distribute and align flex items within the flex container. Once we’ve covered 
  the properties applied to the flex container, we’ll cover the properties 
  applied directly to the flex items. We’ll learn how to make the children of 
  flex containers shrink and grow, and we’ll discuss the properties applied to 
  the those children that enable them to override the distribution and alignment 
  globally set on all the flex items by the parent flex container. We’ve also 
  included several flexbox use cases.</p>
</article>
<aside>
<h3>Aside Heading</h3>
<p>Mauris molestie arcu et lectus iaculis sit amet eleifend eros posuere. Fusce nec porta orci.</p>
</aside>
</main>


<footer>
<nav>
<a href="#1">Home</a>
<a href="#2">About</a>
<a href="#3">Blog</a>
<a href="#4">Careers</a>
<a href="#5">Contact Us</a>
</nav>
<p>Copyright &copy; 2017 <a href="#6">My Site</a></p>
</footer>


</body>
</body>
</html>