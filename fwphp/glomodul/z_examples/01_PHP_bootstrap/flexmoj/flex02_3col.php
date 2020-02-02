
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>Power Grid home page example</title>
<style>
  html {
    background-color: #F0EFF4;
    font-family: helvetica;
  }
    
    body > *, main > * {
      outline: 1px #ccc solid;} 
    * { 
      padding: 10px;
    } 
 nav {background-color: #E9E8ED;}
 header, 
 footer { 
  text-align: center; 
  background: #295579; 
  color: white;
} 
main {
  background-color: F0EFF4;
}
button {
  width: 100%;
}
    body, section {
      background-color: #F0EFF4; 
      margin: 5px;
    }  
    img {
      background-color: #ccc;
      padding: 0;
    } 
    h1 {
      margin: 0;
    } 
    nav {
      padding: 5px 2px;
    }
    nav a {
      margin: 0 5px; 
      background-color: white; 
      color: #ddaa00; 
      text-align: center; 
      text-decoration: none; 
      border: 1px solid #333;
    }

      section > button,
      section > a {
      background: linear-gradient(#ccc, #fff);
      border: 1px solid #ccc;
      text-decoration: none;
      color: #666;
      font-size: 0.75rem;
      text-align: center;
      display:inline-block;
      box-sizing: border-box;
    }
/* relevant CSS */
      nav {
        display: flex;
      }
      section > img, 
      section > button,
      section > a {
        width: 100%; 
      }
      nav a {
        flex: 1; 
      }

  @media screen and (min-width: 40em) {
    body, 
    main, 
    section {
      display: flex;
      flex-direction: column;
    }

    main > section, 
    main > section > p {
      flex: 1;
    }
    header, nav {
      order: -1;
    }
    main {
      flex-direction: row;
      border-bottom: 0.5rem solid;
    }
    main > section {
      margin: 10px;
    }
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
<header><h1>Power Grid Homepage</h1></header>
<main>
<section>
<img alt="" src="../static/img/unicorn1.jpg">
<p>Column 1</p>
  <h1>Power Grid Home Page</h1>
  <p>With flexbox for layout, adding three articles to the home page describing three sections of our site with three calls to action can be accomplished with 
  just a few lines of CSS. With flexbox, we can easily make those three modules appear to be the same height, as if they all had the same amount of content.
  <br><br>On a narrow screen, we can display all the sections in one column. On 
  wide screens, we lay those three sections next to each other in text 
  direction. Using flex, by default, those three sections are the same height. 
  That's what we want. We can make those sections width proportional to their 
  content, or make them all the same width, forcing them to be as tall as the 
  section with the most content, all while making sure the call to action 
  buttons are flush to the bottom of the containing sections.<br><br>Very little 
  CSS is needed for the mobile version. By default, everything is laid out as if 
  we had set flex: column. The only place we need to create a flex container is 
  the navigation, which needs to be display: flex for the control we need.<br>
  <br>We want all the links in the navigation to be the same width, no matter 
  the number of characters, so we need to use 0 for the basis. We declared flex: 
  0% on all the links in the navigation, which equally distributes all the 
  container's space to the items, no matter how many we have. We could have also 
  declared flex:<br>1 1 0%; , flex: 15 78 0%; , or flex: 18;<br>
  (or any other random number) 
  to get the same effect s long as the same flex value was used on all the flex 
  items.<br><br>To create links that are proportional to their content, we would 
  have set the flex-basis to auto with no inherited width value.When supported, 
  we'll be able to use content as the flex-basis value.<br><br>We added a button 
  width of 100%. We also turned the navigation into a flex container for all 
  screen sizes.</p>
<a href="somewhere">More</a></section>
<section>
<img alt="" src="../static/img/unicorn2.jpg">
<p>Column 2<br><br>On wider screens we want the navigation to appear on top, and 
we want the three sections to be the same height with the images on top and 
button on the bottom. On large screens we create three new flex containers:<br>- 
the &lt;body&gt; needs to be turned into a flex container so we can reorder the 
children to make the &lt;nav&gt; appear between the &lt;header&gt; and the &lt;main&gt; .<br>- the 
&lt;main&gt; needs to be a flex container so the three &lt;section&gt; s can be side by side 
and of equal height, and each same-height&nbsp; &lt;section&gt; needs to be a flex 
container to enable lining up the buttons on the bottom.<br><br>We add 
flex-direction: column to the &lt;body&gt; and each &lt;section&gt; , but not &lt;main&gt; or 
&lt;nav&gt; , which we allow to default to flex-direction:&nbsp; row .<br>Turning the 
&lt;body&gt; into a flex container wasn't necessary when the nav appeared on the 
bottom as this is where it appears in the source order. However, on wider 
screens we want the navigation to appear above the &lt;main&gt; content, not below it.
<br>By turning the &lt;body&gt; into a flex container the children the &lt;header&gt; , 
&lt;main&gt; , &lt;nav&gt; , and<br>&lt;footer&gt; —are orderable flex items.<br>By default, all flex items are 
order: 0; . In the last section of the wide-screen media query, we put both 
the &lt;header&gt; and &lt;nav&gt; into the same ordinal group, making them appear before 
&lt;main&gt; and &lt;footer&gt; . <br>We have to put both the header and nav , 
not just nav , into this lower numbered ordi nal group, as if we had just set 
the nav to -1, it would have come before the header. Remember from The order property on page 111 that flex items will be displayed in order-modified document 
order, starting from the lowest numbered ordinal group and going up: flex 
items appear in order by ordinal group, with the items in each ordinal group 
appearing in source order.<br>Note that the keyboard user, navigating through 
the page, will tab through the main content before tabbing through the 
navigation, as the tab order is the same as the source order.<br>Because we 
turned the &lt;body&gt; into a flex container to enable the appearance of a
reordering, we had to declare flex-direction: column; to maintain the look and
feel.<br>On the home page, on wider screens, we want the three sections of the 
main area to<br>appear side by side, stretched to all be equal height. We set 
display: flex; on main<br>globally. Similar to &lt;body&gt; , there should only be one 
&lt;main&gt; per page. If we're using a<br>site-wide stylesheet, this declaration 
should still be OK; but if we don't have multiple column layout for the inner 
pages, we should change the first selector list to read<br>body, .home main, 
section .<br>We didn't declare flex-direction: row; as that is the default, so 
isn't necessary.<br>Similarly, we could have declared align-items: stretch , but 
there was no need to<br>as it's also the default. If you remember from the “The 
align-items Property” on page 45, by default flex items stretch to be height of 
the flex line. This is what we<br>want: we want the sections to be the same 
height, no matter their content.<br>We are 95% of the way to creating our layout 
as seen in Figure 4-4 with a simple dec&#8208;<br>laration of display: flex; , but we 
can perfect our layout a bit. Making the sections<br>all the same width and 
aligning the buttons on the bottom of the sections would look<br>better.</p>
<button>
<a href="somewhere">More</a></button>
</section>
<section>
<img alt="" src="../static/img/unicorn3.jpg">
<p>Column 3</p>
  <h3>Sections</h3>
  <p>By default, the three sections will stretch to be as tall as the flex line. 
  That’s good. Their flex basis, which helps determine the width, is based on the content. In this case it is the width of the paragraph. As Figure 4-4 shows, that's not what we want.
  <br>To set the width of those sections to be proportional, such as 1:1:1, 2:2:3, or 3:3:5, we set the basis to 0 and set 
  growth values reflective of those proportions.</p>
  <p>We want them to be of equal widths, so we give them all the same basis and 
  growth<br>factor (the two declarations are equal):<br>main &gt; section {<br>
  flex: 1; /* is the same as */<br>flex: 1 0 0%;<br>}<br>Had we wanted the 
  proportions to be 2:2:3, we could have written:<br>main &gt; section {<br>flex: 
  2;<br>}<br>main &gt; section:last-of-type {<br>flex: 3;<br>}<br>Remember, the 
  flex property, including the basis (see “The flex-basis Property” on page 
  87), is set on the flex items, not the container. In our home page example, 
  the three &lt;section&gt; s are all both flex items and flex con&#8208;<br>tainers. We 
  turned them into flex containers with a direction of column to enable<br>
  forcing the buttons to the bottom. The paragraphs are of differing heights, so 
  the but&#8208;<br>tons aren’t by default aligned at the bottom. By only allowing the 
  paragraphs to grow by giving them a positive growth factor, while preventing 
  the image and button from growing with a null growth factor, the paragraphs 
  grow to take up all the distributable<br>space, pushing the button down to the 
  bottom of the section :<br>main &gt; section &gt; p {<br>flex: 1;<br>}<br>
  Now the buttons are always flush to the bottom. The CSS to make the link look 
  like a button is in the live example. When the link is not a flex item it is 
  an inline item, so we change its display property so it heeds our width 
  declaration. Now our layout is done, as shown in Figure 1-1. The relevant CSS 
  for our power grid homepage is only a few lines:<br>nav {<br>display: 
  flex;<br>}<br>section &gt; img, section &gt; button, section a {<br>width: 100%;<br>
  display: inline-flex;<br>}<br>nav a {<br>flex: 1;<br>}<br>@media screen and 
  (min-width: 40em) {<br>body, main, section {<br>&nbsp;display: flex;<br>}<br>
  body, section {<br>flex-direction: column;<br>}<br>main &gt; section,<br>main &gt; 
  section &gt; p {<br>flex: 1;<br>}<br>header, nav {<br>order: -1;<br>}<br>}</p>
<button>
<a href="somewhere">More</a></button>
</section>
</main>
<nav>
<a href="#1">Home</a>
<a href="#2">About</a>
<a href="#3">Blog</a>
<a href="#4">Careers</a>
<a href="#5">Contact Us</a>
</nav>
<footer>Copyright &copy; 2017</footer>
</body>
</html>