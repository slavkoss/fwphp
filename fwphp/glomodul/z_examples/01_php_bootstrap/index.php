<!doctype html>
<html>
<head>
  <meta charset="utf-8" />

  <title>Composer</title> 

  <link rel="stylesheet" href="/zinc/themes/flex_3cols.css?">

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
  <!--header>
    <h1>Learn PHP</h1>
  </header-->
<main>

<?php include 'nav_left.php'?>


<article>
    <div id="wrapper">

    <div id="subheader">
               
        <div class="title"></div>
            </div>
    <div id="content">
    <div id="topper">
         <div class="wrap">
             <p id="breadcrumb"><a href="https://phpenthusiast.com/">Home</a> &gt;&gt; <a href="/blog">Blog</a> &gt;&gt; <span>PHP composer tutorials
    </span></p>
         </div>         
    </div>

    <div class="content-articles"> 

    <article id="first-article">
    <div class="wrap">
        
    <div class="one-third">
        
    <!--h1 style="margin-left:0">PHP composer tutorials</h1-->
      <div id="list-of-posts">
        <a href="https://phpenthusiast.com/blog/how-to-use-packagist-and-composer" class="half half-12 mix composer" data-myorder="12">
        <div>
          <h2><span>Packagist &amp; Composer</span></h2>
        </div>
        </a>
        <div class="main-title">
          <h3>How to use Packagist and Composer to integrate existing code 
          libraries <span lang="hr">or own classes </span>into our PHP apps?</h3>
          Updated August 28, 2015
          </div>
        <div class="two-third">
          <div class="blockquote">
            While <strong>Packagist</strong> is a huge repository of PHP 
            code libraries, <strong>Composer</strong> is a dependency 
            manager which allows us to download the code libraries from
            <strong>Packagist</strong> straight to our project.
          </div>
          <div class="main-title">
            <p>In 
            <a href="https://packagist.org/" rel="nofollow" target="_blank">packagist.org</a> website, type the name of the package that you 
          want to download in the search box. <span lang="hr">C</span>opy
                <span lang="hr">eg &quot;composer require fzaninotto/faker&quot; command to 
          download the latest stable version or composer require 
          monolog/monolog. Then </span></p>
          </div>
          <pre class="p_notes"><code>Update the composer autoloader from the command line:
    $ composer dump-autoload -o
    require_once __DIR__ . <span class="red">'/vendor/autoload.php'</span>;</code><span class="cl"></span></pre>
        </div>
        <P>&nbsp;</P>
        <P>&nbsp;</P>
        <a href="https://phpenthusiast.com/blog/how-to-autoload-with-composer" class="half half-13 mix composer" data-myorder="13">
        <div>
          <h2><span>How to Composer autoload?</span></h2>
        </div>
        </a>
        <P><strong>Autoloading</strong> allows us to use PHP classes without the 
      need to <span class="monospace">require()</span> or <span class="monospace">include()</span> them<span lang="hr">. 
        <strong>Composer autoloading</strong> 
      can work in one of two main ways: through direct autoloading of classes or 
      through the use of the PSR standards.</span></P>
        <h2>How to directly autoload classes with Composer?</h2>
        <P>The simplest way is to autoload each class separately. For this 
        purpose, all we need to do is define the array of paths to the classes 
        that we want to autoload in the <span class="monospace">composer.json</span> 
        file.<span lang="hr"> Eg :</span></P>
        <pre class="c_notes"><code style="color:black">{
    &nbsp;&nbsp;&quot;autoload&quot;: {
    &nbsp;&nbsp;&nbsp;&nbsp;&quot;classmap&quot;: [
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&quot;path/to/FirstClass.php&quot;,
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&quot;path/to/SecondClass.php&quot;
    &nbsp;&nbsp;&nbsp;&nbsp;]
    &nbsp;&nbsp;}
    }</code><span class="cl"></span></pre>
        <p>In the same way that we autoload classes, we can autoload directories 
        that contain classes also by using the <span class="monospace">classmap</span> 
        key of the autoload:</p>
        <pre class="c_notes"><code style="color:black">{
    &nbsp;&nbsp;&quot;autoload&quot;: {
    &nbsp;&nbsp;&nbsp;&nbsp;&quot;classmap&quot;: [
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&quot;path/to/FirstClass.php&quot;,
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&quot;path/to/directory&quot;
    &nbsp;&nbsp;&nbsp;&nbsp;]
    &nbsp;&nbsp;}
    }</code><span class="cl"></span></pre>
        <ul>
          <li>In order to autoload directories we need to use namespaces.</li>
        </ul>
        <h2>How to autoload the PSR-4 way?</h2>
        <p><strong>PSR-4</strong> is the newest standard of autoloading in PHP, 
        and it compels us to use namespaces.</p>
        <p>We need to take the following steps in order to autoload our classes 
        with <strong>PSR-4</strong>:</p>
        <p><strong>a. Put the classes that we want to autoload in a dedicated 
        directory.</strong> For example, it is customary to convene the classes 
        that we write into a directory called <span class="monospace">src/</span>, 
        thus, creating the following folder structure:</p>
        <p style="margin-left:40px"><span class="monospace">your-website/<br>&nbsp;&nbsp;src/<br>&nbsp;&nbsp;&nbsp;&nbsp;Db.php<br>&nbsp;&nbsp;&nbsp;&nbsp;Page.php<br>&nbsp;&nbsp;&nbsp;&nbsp;User.php</span>
        </p>
        <p><strong>b. Give the classes a namespace.</strong> We must give all 
        the classes in the <span class="monospace">src/</span> directory the 
        same namespace. For example, let's give the namespce
        <span class="monospace">Acme</span> to the classes. This is what the
          <span class="monospace">Page</span> class is going to look like:<br></p>
        <pre class="p_notes"><code><span class="red">&lt;?php</span>
    <span class="magenta">namespace</span> Acme;

    <span class="yellow">class</span> Page {
        <span class="blue">public</span> <span class="orange">function</span> __construct()
        {
            echo <span class="red">&quot;hello, i am a page.&quot;</span>;
        }
    }</code><span class="cl"></span></pre>
        <p></p>
        <ul>
          <li>We give the same namespace <span class="monospace">Acme</span> 
          to all of the classes in the <span class="monospace">src/</span> 
          directory.</li>
        </ul>
        <p><strong>c. Point the namespace to the <span class="monospace">src/</span> 
        directory in the <span class="monospace">composer.json</span> file .</strong> 
        We point the directory that holds the classes to the namespace in the
          <span class="monospace">composer.json</span> file. For example, this is 
        how we specify in the <span class="monospace">composer.json</span> file 
        that we gave the namespace <span class="monospace">Acme</span> to the 
        classes in the <span class="monospace">src/</span> directory:</p>
        <pre class="c_notes"><code style="color:black">{
      &quot;autoload&quot;: {
        &quot;psr-4&quot;: {
          &quot;Acme\\&quot;:&quot;src/&quot;
        }
      }
    }</code><span class="cl"></span></pre>
        <ul>
          <li>We use the <span class="monospace">psr-4</span> key.</li>
          <li>The namespace <span class="monospace">Acme</span> points to the
              <span class="monospace">src/</span> directory.</li>
          <li>The namespace has to end with <span class="monospace">\\</span>. 
          For example, <span class="monospace">&quot;Acme\\&quot;</span>.</li>
          <li>You can replace the generic <span class="monospace">Acme</span> 
          with the name of your brand or website.</li>
        </ul>
        <p></p>
        <p><strong>d. Update the Composer autoloader:</strong></p>
        <p class="console" style="padding:20px">$ composer dumpautoload -o</p>
        <p><strong>e. Import the namespace to your scripts.</strong> The scripts 
        need to import the namespace as well as the autoloader, e.g.,
          <span class="monospace">index.php</span>:<br></p>
        <pre class="p_notes"><code><span class="red">&lt;?php</span> 
    require <span class="red">&quot;vendor/autoload.php&quot;</span>;

    <span class="magenta">use</span> Acme\Db;
    <span class="magenta">use</span> Acme\User;
    <span class="magenta">use</span> Acme\Page;
     
    $page1 = <span class="orange">new</span> Page();</code></pre>
        <P>&nbsp;</P>
      </div>
    </div>
    <div class="cb">&nbsp;</div>

    </div>
    </article>

    </div><!--.content-articles-->
    </div><!--#content-->

    <div id="comment_section">
    <div class="wrap">

    <div id="disqus_thread"></div>
    <script type="text/javascript">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = 'php-enthusiast'; // required: replace example with your forum shortname

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
    var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
    dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>

    </div>
    </div>
    <div class="cb">&nbsp;</div>  <div id="social"  class="cd-fixed-bg cd-bg-2">
    <div class="wrap">
        <div class="inner-wrap">
        <span class="title">Share Us</span>
          <a href="https://plus.google.com/share?url=https://phpenthusiast.com/blog/composer" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">

          <!-- slikeeeeeeeeee -->

        </a>
          <a href="https://www.friendfeed.com/share?url=https://phpenthusiast.com/blog/composer&amp;title=PHP%20Composer%20tutorials%20%7C%20PHPenthusiast" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">

        </a>
          <a href="https://bufferapp.com/add?text=PHP%20Composer%20tutorials%20%7C%20PHPenthusiast&amp;url=https://phpenthusiast.com/blog/composer" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">

        </a>
          
        </div>      
    </div>
    </div>
    <div class="cb"></div>
    <div id="scroll-top">
        <a href="#" title="Back to the top">
        <div class="arrow-up" style="width:0;height:0;border-left:16px solid transparent;border-right:16px solid transparent;border-bottom:32px solid #fff"></div>
      </a>
    </div>
    <div id="subfooter">
    <div class="wrap">
        <div class="two-third">
            <div class="one-third">
                <h3>About PHPenthusiast</h3>
                <ul>
                    <li><a href="https://phpenthusiast.com/about">About</a></li>
                    <li><a href="https://phpenthusiast.com/contact">Contact us</a></li>
                    <li><a href="https://phpenthusiast.com/sitemap">Sitemap</a></li>
                    <li><a href="https://phpenthusiast.com/legal/privacy">Privacy policy</a></li>
                    <li><a href="https://phpenthusiast.com/legal/terms-of-use">Terms of use</a></li>
                </ul>
            </div>
            <div class="one-third most-viewd">
                <h3>Most viewed tutorials</h3>
                <ul>
                <li><a href="https://phpenthusiast.com/object-oriented-php-tutorials" title="Learn object oriented PHP">Object-oriented PHP tutorials</a></li>
                <li><a href="https://phpenthusiast.com/blog/develop-angular-php-app-getting-the-list-of-items">Learn to code Angular app with PHP backend</a></li>
                    <li><a href="https://phpenthusiast.com/object-oriented-php-tutorials/create-classes-and-objects" title="Object-oriented PHP tutorial">Classes, objects, methods and properties</a></li>
            <li><a href="https://phpenthusiast.com/blog/five-php-curl-examples">5 PHP cURL examples</a></li>
            <li><a href="https://phpenthusiast.com/object-oriented-php-tutorials/interfaces" title="interfaces in object oriented PHP">Interfaces - the next level of abstraction</a></li>
            <li><a href="https://phpenthusiast.com/blog/how-to-autoload-with-composer" title="How to use Composer in PHP projects">How to autoload PHP classes the Composer way?</a></li>
            <li><a href="https://phpenthusiast.com/object-oriented-php-tutorials/inheritance-in-object-oriented-php">Inheritance in object-oriented PHP</a></li>
                </ul>
            </div>
            <div class="one-third">
                <h3>The latest tutorials</h3>
                <ul>
                <li><a href="https://phpenthusiast.com/blog/the-essentials-of-git-and-github-for-web-developers" title="Git and Github tutorial for web developers">The essentials of Git and Github for web developers</a></li>
                <li><a href="https://phpenthusiast.com/blog/javascript-web-app-that-takes-pictures" title="App which is based on JavaScript, HTML5, PHP">Learn to code web app that takes pictures with the webcam</a></li>
                <li><a href="https://phpenthusiast.com/blog/javascript-fetch-api-tutorial" title="How to perform AJAX request with the new JavaScript syntax">Modern AJAX with the fetch API</a></li>
                <li><a href="https://phpenthusiast.com/blog/angular-form-ngform-and-two-ways-data-binding" title="Angular form tutorial">Angular form, NgForm and two-way data binding</a></li>
                <li><a href="https://phpenthusiast.com/blog/develop-angular-php-app-getting-the-list-of-items">Learn to code Angular app with PHP backend</a></li>
                <li><a href="https://phpenthusiast.com/blog/what-is-rest-api" title="what is REST API">What is REST API</a></li>
                </ul>
            </div>             
        </div>
        <div class="one-third"> 
                    <div id="newsletter" >
                        <form action="#" method="post">
                                     

                                    <p>Only the latest tutorial-No spam</p>                  
                    
                    <div class="form-group">                    
                        <input name="nl-email" type="email" placeholder="Enter your email" class="signup-email" value="">                        
                        <input type="hidden" name="nl-birthday" value="">
                    </div>                 
                    <input name="nl-submit" type="submit" value="Subscribe" class="button">                   
                    <div class="cb"></div>                                     
                </form>            
            </div> 
                
        </div>
        <div class="cb"></div>
    </div>
    </div>
    <div id="footer">
    <div class="wrap">   
        <div class="half">
            <p>© 2015-2019 Phpenthusiast.com | All rights reserved.</p>           
        </div>
        <div class="half">
            <p>Website Designed by <a rel="nofollow" href="www.austinpenpixel.com">Austin Pen &amp; Pixel</a></p>           
        </div>       
        <div class="cb"></div>        
    </div>
    </div>
       
    </div>



</article>


<?php include 'aside_right.php'?>
</main>




<footer>

<p>
Copyright &copy; 2017 
<a href="#1">Home</a>
<a href="#2">About</a>
<a href="#3">Blog</a>
<a href="#4">Careers</a>
<a href="#5">Contact Us</a>
<a href="#6">My Site</a>
</p>

</footer>


</body>
</body>
</html>