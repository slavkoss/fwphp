<!DOCTYPE html>
<html lang="hr">
              <!-- CODE FOR SPECIFIC SKIN 
http://standardista.com/flexbox/flexfiles/
              -->
<head>
  <meta charset="utf-8">
  <title>HOME</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link href="/zinc/themes/flex_2cols.css" type="text/css" rel="stylesheet">
  <style type="text/css">

  </style> 

</head>



<body>
  <header>
    <h1>TAG &lt;HEADER&gt; (document heading)</h1>
        Below are tags: &lt;MAIN&gt; &lt;ARTICLE&gt; AND &lt;MAIN&gt; &lt;ASIDE&gt;, than 
 &lt;NAV&gt; (top toolbar), than &lt;FOOTER&gt;.<br>&lt;MAIN&gt; &lt;ASIDE&gt; and &lt;NAV&gt; float 
 above footer when device width is small.</header>
  <main>
    <article>
      <h1>Responsive Two-Column Layout</h1>
      <h3>CSS Flexible Box Layout Module Level 1 specification</h3>

      <p><strong>Navigation (MAIN.ASIDE)</strong> appear between the header and main content on wide screens, 
      or <strong>below content </strong>in both the markup and on narrow screens.</p>
   <p>By default, sectioning elements are displayed block, taking up 100% of 
   the width. For our layout, there may appear to be no reason to declare the 
   following:<br>body {<br>display: flex;<br>flex-direction: column;<br>}<br>
   When we declare this, the layout looks the same: we don’t need it for the 
   narrow layout. We include it for the wider version in which we change the 
   order of the navigation. The nav in the source code comes after the main 
   content, which is what we want for narrow viewports, screen readers, and 
   our search-engine friends. Visually, in wider browsers, we’ll reorder it, 
   which we’ll cover in a bit. For the narrow viewport, we only need flex for 
   the layout of the navigation:<br>nav {<br>display: flex;<br>}<br>nav a {<br>
   flex: auto;<br>}<br>The five links of the navigation, based on how we 
   marked it up, appear by default on one line, with the widths based on the 
   width of the text content. With flex display:<br>flex on the nav and flex: 
   auto on the links themselves, the flex items grow to take up all the 
   available horizontal space. Had we declared:<br>nav {<br>display: block;<br>
   }<br>nav a {<br>display: inline-block;<br>width: 20%;<br>box-sizing: 
   border-box;<br>}<br>all the links would be the exact same width—20% of the 
   parent. This looks perfect if we have exactly five links, but isn’t 
   robust: adding or dropping a link would ruin the layout.<br></p>
   <p><br></p>
   <h3>Wider Screen Layout</h3>
   <p>For devices with limited real estate, we want to content to appear 
   before the links, aside, navigation, and footer. When we have more room 
   available, we want the navigation bar to be directly below the header and 
   the article and aside to share the main area, side by side.</p>
   <p>We used media queries to define a new layout when the viewport is 30 
   rem wide or greater. We defined the value in rems instead of pixels to 
   improve the accessibility of the page for users increasing the font size. 
   For most users with devices less than 500 px wide, which is approximately 
   30 rem when a rem is the default 16 px, the narrow layout will appear. 
   However, if users have increased their font size, they may get the narrow 
   layout on their tablet or even desktop monitor.<br>While we could have 
   turned the body into a column-direction flex container, with only 
   sectioning level children, that’s the default layout, so it wasn’t 
   necessary on the narrow screen. However, when we have wider viewports, we 
   want the navigation to be between the header and the main content, not 
   between the main content and the footer, so we need to change the order of 
   the appearance. We set nav, header { order: -1px; } to make the &lt;header&gt; 
   and &lt;nav&gt; appear before all their sibling flex items. The siblings default 
   to order: 0; which is the default and a greater value.</p>
   <p>The group order puts those two elements first, with header coming 
   before nav , as that is the order of the source code, before all the other 
   flex item siblings, in the order they appear in the source code.<br>We did 
   want to prevent the layout from getting too wide as the navigational 
   elements would get too wide, and long lines of text are hard to read. We 
   limit the width of the layout to 75 rems, again, using rems to allow the 
   layout to remain stable if the user grows or shrinks the font size. With a 
   margin: auto; the body is centered within the viewport, which is only 
   noticeable once the viewport is wider than 75 rems. This isn’t necessary, 
   but&nbsp; demonstrates that flex containers do listen to width 
   declarations.<br>We turn the main into a flex container with display: flex 
   . It has two children. The article with flex: 75% and aside with flex: 25% 
   will fit side by side as their combined flex bases equals 100%.<br>Had the 
   nav been a child of main instead of body , we could use flex-wrap to 
   maintain the same appearance. In this scenario, for the nav to come first 
   on its own line, we would have made the navigation take up the full width 
   of the parent main , wrapping the other two children onto the next flex 
   line. We can force the flex container to allow its children to wrap over 
   two lines with the flex-wrap property.<br>We could have resolved nav being 
   a child of main by including:<br>main {<br>flex-wrap: wrap;<br>}<br>nav {<br>
   flex-basis: 100%;<br>order: -1;<br>}<br>To ensure the nav was on its own 
   line, we would have included a flex basis value of 100% with flex: 100%; . 
   The order: -1 would have made it display before its sibling aside and 
   article.<br>In our next example, our HTML is slightly different: instead 
   of an article and an aside , we have three sections of content in the main 
   part of the page.<br></p>
    </article>
    
    <aside>
  <h4>Here is the aside</h4>
  <p>Remember, when flex basis is 0 , the available space of the container 
   (not just the extra space) is distributed proportionally based on the 
   growth factors present. This is not what we want in this case either. We 
   want the longer content to take up more space than the shorter content. 
  </p>
  <p>In 
   the case of flex-basis: auto; , the extra space is distributed 
   proportionally based on the flex growth factors.<br>With all the links set 
   to flex: auto; , the space not consumed by actual content is divided 
   equally among the links. The links all have the same growth and shrink 
   factors. The links will look like they all have equal left and right 
   padding, with the &quot;padding&quot; changing dynamically based on the available 
   space.<br>&nbsp;&nbsp;&nbsp; </p>
  </aside>
    
  </main>

  <nav>
    <a href="/">Home</a>
    <a href="/about">About</a>
    <a href="/blog">Blog</a>
    <a href="/jobs">Careers</a>
    <a href="/contact">Contact Us</a>
  </nav>
  
  <footer>
      <p>Copyright &#169; 2017 <a href="/">My Site</a></p>
  </footer>
</body>