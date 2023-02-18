<?php
// https://refactoring.guru/design-patterns/catalog
// https://refactoring.guru/design-patterns/php
// https://phpenthusiast.com/blog/design-patterns
// https://github.com/domnikl/DesignPatternsPHP
// https://designpatternsphp.readthedocs.io/en/latest/README.html

?>
<a href="https://phpenthusiast.com/blog/simplify-your-php-code-with-facade-class">https://phpenthusiast.com/blog/simplify-your-php-code-with-facade-class</a>

<?php
// Class to tweet on Twitter.
class CodeTwit {
  function tweet($status, $url)
  {
    echo '<br />'; var_dump('Tweeted:'.$status.' from:'.$url);
  }
}

// Class to share on Google plus.
class Googlize {
  function share($url)
  {
    echo '<br />'; var_dump('Shared on Google plus:'.$url);
  }
}

// Class to share in Reddit.
class Reddiator {
  function reddit($url, $title)
  {
    echo '<br />'; var_dump('Reddit! url:'.$url.' title:'.$title);
  }
}



class shareFacade {
  // Holds a reference to all of the classes.
  protected $twitter;    
  protected $google;   
  protected $reddit;    
    
  // The objects are injected to the constructor.   
  function __construct($twitterObj,$gooleObj,$redditObj)
  {
    $this->twitter = $twitterObj;
    $this->google  = $gooleObj;
    $this->reddit  = $redditObj;
  }  
        
  // One function makes all the job of calling all the share methods
  //  that belong to all the social networks.
  function share($url,$title,$status)
  {
    $this->twitter->tweet($status, $url);
    $this->google->share($url);
    $this->reddit->reddit($url, $title);
  }
}

// Create the objects from the classes.
$twitterObj = new CodeTwit();
$gooleObj   = new Googlize();
$redditObj  = new Reddiator();

// Pass the objects to the class facade object.
$shareObj = new shareFacade($twitterObj,$gooleObj,$redditObj);

// Call only 1 method to share your post with all the social networks.
echo '<br />';
$shareObj->share('https://myBlog.com/post-awsome','My greatest post','Read my greatest post ever.');

?>
<br /><br />
<p>01. FACADE PATTERN - code processor, manager, controller - eg shareFacade class gets the social networks objects injected to its constructor, holds these objects by reference, and has the ability to call to all of the share methods from a single share method.</p>


<p>Pros (benefits, advantages) and Cons</p>
<ol>
<li>code that shares the newest posts in our blog with several social networks. Each social network has its own class, and a set of methods to share our posts. Every time that we want to share our posts, we need to call to all of the methods - better is CALL TO ONLY ONE METHOD IN FACADE CLASS
</ol>

<?php
include(dirname(dirname(dirname(dirname(__DIR__)))) .'/zinc/showsource.php');