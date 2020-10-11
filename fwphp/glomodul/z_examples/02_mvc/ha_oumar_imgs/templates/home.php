<!--
J:\awww\www\fwphp\glomodul\z_examples\02_mvc\ha_oumar\templates\home.php
J:/awww/www/fwphp/glomodul/z_examples/templates/home.php  Router.php on line 78
-->
<!DOCTYPE html>
<html lang="hr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1 shrink-to-fit=no">
  <title>HA</title>

  <!--link rel="stylesheet" href="<=$wsroot_url>zinc/themes/bootstrap/css/bootstrap.min.css"-->  
  <style type="text/css">
  .auto-style1 {
	color: #008000;
  }
  </style>
</head>


<body style="font-size:1.2em;">

{% extends "base.html" %}

{% block title %}Home page{% endblock %}

{% block stylesheets %}
    {{parent()}}
    <link rel="stylesheet" href="../assets/home.css" />
{% endblock %}

{% block content %}
    <h1>Home page</h1>
    <p class="c-home__description">WELCOME !</p>
    <div class="c-home__ctn">
      <h3><a class="c-home__ctn-btn" href="<?=$pp1->gallery_images?>">Click to access to images</a></h3>
    </div>
{% endblock %}



<br /><br /><br />*************** gallery.php was :<br /><br />

{% extends "base.html" %}

{% block title %} Images list {{ parent() }}{% endblock %}

{% block stylesheets %}
    {{parent()}}
    <link rel="stylesheet" href="../assets/gallery.css" />
{% endblock %}

{% block content %}
    <h1> Images gallery</h1>
    <p class="c-gallery__description">Show images from endpoint:&nbsp; <b>https://picsum.photos/v2/list</b></p>
    <div class="c-gallery__image-ctn">
        {% for image in images_list %}
            <div class="c-gallery__image-ctn-item">
                <img src="{{image.download_url}}" alt="{{'image n°' ~ image.id}}" width="300px" height="300px">
            </div>
        {% endfor %}
    </div>
{% endblock %}<p>&nbsp;</p>
<h1>Code skeleton (Application Architecture)</h1>
<h2>Interfaces (ports) and adapters (classes or methods) - HA (hexagonal 
architecture)</h2>
<p>"The object-oriented version of spaghetti code is, of course, <strong>lasagna code</strong>'. 
Too many layers." - Roberto Waltman.<a href="https://twitter.com/CodeWisdom/status/706782602854850560?ref_src=twsrc%5Etfw%7Ctwcamp%5Etweetembed%7Ctwterm%5E706782602854850560%7Ctwgr%5Eshare_3&amp;ref_url=https%3A%2F%2Fmatthiasnoback.nl%2F2017%2F08%2Flayers-ports-and-adapters-part-2-layers%2F"> 
11:04 AM · Mar 7, 2016</a><a href="https://help.twitter.com/en/twitter-for-websites-ads-info-and-privacy"></a><a href="https://twitter.com/intent/like?ref_src=twsrc%5Etfw%7Ctwcamp%5Etweetembed%7Ctwterm%5E706782602854850560%7Ctwgr%5Eshare_3&amp;ref_url=https%3A%2F%2Fmatthiasnoback.nl%2F2017%2F08%2Flayers-ports-and-adapters-part-2-layers%2F&amp;tweet_id=706782602854850560">
</a></p>
<p>
<a href="https://blog.octo.com/en/hexagonal-architecture-three-principles-and-an-implementation-example/">
https://blog.octo.com/en/hexagonal-architecture-three-principles-and-an-implementation-example/</a> 
(Java example)<br>Publication date&nbsp;15/10/2018&nbsp;by&nbsp;<a href="https://blog.octo.com/en/author/erwan-alliaume-era/">Erwan 
Alliaume</a>,&nbsp;<a href="https://blog.octo.com/en/author/sebastien-roccaserra-sro/">Sébastien 
Roccaserra</a> </p>
<p>See also on this topic:
<a href="https://medium.com/@msandin/strategies-for-organizing-code-2c9d690b6f33">
https://medium.com/@msandin/strategies-for-organizing-code-2c9d690b6f33</a><a href="https://martinfowler.com/bliki/PresentationDomainDataLayering.html"> 
https://martinfowler.com/bliki/PresentationDomainDataLayering.html</a> </p>
<p>Coding your app without being dependent on any external libraries or 
frameworks, ee to equally be 
driven by users, programs, automated test or batch scripts, and to be developed 
and tested in isolation from its eventual run-time devices and databases. By 
defining <strong>interfaces at the boundaries</strong> of your application, you 
will allow external libraries to implement functionality hidden within your 
actual application.&nbsp; </p>
<p>HA allows to isolate business of an app and automatically test its behaviour 
independently of everything else. This could be the reason why this architecture 
has caught the eye of Domain-Driven Design (DDD) practitioners. But be careful, 
DDD and hexagonal architecture are two quite distinct notions which can 
reinforce each other but which are not necessarily used together.</p>
<p>&nbsp;</p>
<p>
<a href="https://matthiasnoback.nl/2017/07/layers-ports-and-adapters-part-1-introduction/">
https://matthiasnoback.nl/2017/07/layers-ports-and-adapters-part-1-introduction/</a>
<br>
<a href="https://matthiasnoback.nl/2017/08/layers-ports-and-adapters-part-2-layers/">
https://matthiasnoback.nl/2017/08/layers-ports-and-adapters-part-2-layers/</a> 
Aug&nbsp;2nd&nbsp;2017&nbsp;by&nbsp;Matthias Noback <br>
<a href="https://matthiasnoback.nl/2017/08/layers-ports-and-adapters-part-3-ports-and-adapters/">
https://matthiasnoback.nl/2017/08/layers-ports-and-adapters-part-3-ports-and-adapters/</a> </p>
<p>&nbsp;</p>
<h2>Principles and techniques of HA (Ports &amp; Adapters&nbsp;Pattern)</h2>
<p>Hexagon metaphor leaves room to represent multiple&nbsp;ports and adapters&nbsp;on the 
diagram.&nbsp; </p>
<ol>
  <li>Explicitly separate 
  (code layers)<ol>
  <li>User-Side (Cockburn calls it left Side) - &nbsp;<strong><span class="auto-style1">Home_ctr</span> 
  - application or transport Layer is actions</strong> 
  - classes called&nbsp;commands&nbsp;and&nbsp;command handlers (app services) that knows how 
  to process a particular command - Commands and Queries, as well as the Events 
  that will be triggered after Commands are executed. <br><br>Application Layer 
  is an orchestration intermediate layer. Takes care of adapt outside requests 
  to the domain layer and pass messages to this one. Application layer is 
  usually implemented by Commands, CommandBus and EventBus Patterns. <br><br>Could be unit 
  tested, also acceptance tests (see
  <a href="https://stakeholderwhisperer.com/posts/2014/10/introducing-modelling-by-example">
  https://stakeholderwhisperer.com/posts/2014/10/introducing-modelling-by-example</a> 
  ).<br> <br>
  <li>Business Logic (center, core, <strong>domain</strong>) 
  
  
      <ol>
      <li>&nbsp;Entities<li>&nbsp;Value 
  objects<li>&nbsp;Domain events<li>&nbsp;Repository interfaces - <strong>
		<span class="auto-style1">Interf_Tbl_crud</span></strong><li>&nbsp;Domain services<li>
		Factories</ol>
  
  Here may be <strong>Model</strong> subdir with subdir for each of the aggregates that we model. 
  An aggregate directory contains all the things related to that aggregate 
  (value objects, domain events, a repository interface, etc.). <br><br>Tests 
  for domain model code can be purely unit tests, as all they do is execute code 
  in memory. There is no need for domain model code to reach out to the world 
  outside (like approaching the file system, making a network call, generate a 
  random number or get the current time).&nbsp; <br> <br>
  <li>Server-Side
  (right side) - <strong>infrastructure</strong>&nbsp;- "hands and feet" - wrapping 
  Application - makes app code usable,&nbsp; communicate with real users and 
  external services - actors who&nbsp;are managed&nbsp;by Business Logic. 

  
    <ol>
      <li>Processing HTTP requests, producing a response for an incoming request
      <li>Making (HTTP) requests to other servers<li>Handles HTTP calls to other 
	  apps&nbsp; on which you depend<li>Makes calls to file system<li>&nbsp;DB CRUD - Eg Post model 
	  (<span class="auto-style1"><strong>Tbl_crud</strong></span>), with a <strong>PostRepositoryInterface 
  (Interf_Tbl_crud)</strong> defined in our Domain layer, we'll implement the 
  repository here.
      Or APIs.<li>Sending emails
      <li>Publishing messages
      <li>Getting the current timestamp
      <li>Generating random numbers
    </ol>

    <br>This kind of code requires integration testing (in the terminology of Freeman and Pryce
  <a href="https://www.natpryce.com/articles/000772.html">
  https://www.natpryce.com/articles/000772.html</a> ).
    You test all the "real things": the real database, the real vendor code,
    the real external services involved. This allows you to verify all the assumptions
    your infrastructure code makes about things that are beyond your control.<br>
  <br>  

  </ol>
  </li>
  <li>Everything depends on Business Logic, Business Logic&nbsp;does not depend on 
  anything. <br>Dependencies are going <strong>outside to inside</strong>, to 
  center : from User-Side and Server-Side to the Business 
  Logic. User-Side&nbsp;(ConsoleAdapter)<strong> </strong>depends on Business Logic (<strong>IRequestVerses</strong>).
  <strong>&nbsp;</strong>Server-Side
  depends on Business Logic (<strong>IObtainPoems</strong> ). Technically a 
  <strong>class on the&nbsp;Server-Side&nbsp;side will inherit interface defined in 
  Business Logic</strong>&nbsp;and implement it, we will see it in detail below to 
  talk about <strong>dependency inversion</strong>. <br> <br></li>
  <li>We isolate the boundaries with interfaces<strong> </strong>by using Ports and Adapters</li>
</ol>
<pre>&nbsp;     OUTSIDE LEFT        INSIDE&nbsp;(core, domain)              OUTSIDE RIGHT (infrastr)
     (User-Side, app)    Business Logic, center             Server-Side</pre>
<pre>     ConsoleAdapter <strong>---&gt;</strong> <strong>IRequestVerses
     </strong>ibrowser<strong>,<span class="auto-style1"> Home_ctr</span> <span class="auto-style1">Interf_Home_ctr (more if needed)</span></strong></pre>
<pre>                               A</pre>
<pre>                               |&nbsp;</pre>
<pre>                        PoetryReader&nbsp;---&gt; <strong>IObtainPoems</strong> <strong>&lt;---</strong> PoetryLibraryFileAdapter
               <strong>methods</strong> to call/inc code  <strong><span class="auto-style1">Interf_Tbl_crud   Tbl_crud </span></strong></pre>
<p>User-side code drives business code through&nbsp;an interface&nbsp;(here 
IRequestVerses) defined in business code. And business code drives the 
server-side through&nbsp;an interface&nbsp;also defined in business code (IObtainPoems). 
These <strong>interfaces act as&nbsp;explicit insulators - ports - between inside and 
outside</strong>. Business Logic&nbsp;defines&nbsp;<strong>ports - so they&nbsp;are inside</strong>, 
on which all kinds of&nbsp;adapters&nbsp;can be interchangeably connected if they follow 
the <strong>specification defined by the&nbsp;port</strong>. </p>
<p>Port&nbsp;of the&nbsp;Business Logic&nbsp;on which we will connect either a hard-coded data 
source during a unit test, or a real database in an integration test. Just code 
corresponding implementations and&nbsp;adapters&nbsp;on the&nbsp;Server-Side, the&nbsp;Business 
Logic&nbsp;is not impacted by this change. </p>
<p><strong>Adapters</strong>&nbsp;are outside, represent external code, make the glue 
between the&nbsp;port&nbsp;and the rest of the user-side code or server-side code. </p>
<p>&nbsp;</p>
<p>Concerning business code, the inside, a good idea is to choose to <strong>
organize domain modules (or directories) according to business logic</strong>. The 
ideal case is to be able to open a directory or a business logic module and 
<strong>immediately&nbsp;understand business problems that your program solves</strong>; rather 
than seeing only “repositories”, “services”, or other “managers” directories eg 
M, V, C dirs. </p>
<p>&nbsp;</p>
<h2>Frameworks and libraries</h2>
<p>Any framework and library that is related to "the world outside" (e.g.
<strong><span class="auto-style1">Db_allsites</span> </strong>cls, networking, 
file systems, time, randomness) will be used or <strong>called in the 
infrastructure layer</strong>. Of course, code in the domain and application 
layers may need functionality offered by <strong>ORMs, HTTP client libraries</strong>, 
etc. But they can only do so through <strong>more abstract dependencies. This 
gets dictated by dependency rule</strong>.<br></p>
<p>&nbsp;</p>
<h2>Dependency Rule - decoupling (code separation) - Dependency Inversion 
Principle - "D" in SOLID</h2>
<p>The dependency rule (based on the one posed by Robert C. Martin in The Clean 
Architecture
<a href="https://8thlight.com/blog/uncle-bob/2012/08/13/the-clean-architecture.html">
https://8thlight.com/blog/uncle-bob/2012/08/13/the-clean-architecture.html</a> ) 
states that <strong>you should only depend on things that are in the same or in 
a deeper layer</strong>. That means :</p>
<ol>
  <li>&nbsp;domain code can only depend on itself</li>
  <li>&nbsp;application code can only depend on domain code and its own code</li>
  <li>&nbsp;infrastructure code can depend on anything. </li>
</ol>
<p>According to the dependency rule it's not allowed for domain code to depend 
on infrastructure code. This should already make sense, but the rule formalizes 
our intuitions here.<br><br>Obeying a rule blindly isn't a good idea. So why 
should you use the dependency rule? Well, it guarantees that you don't couple 
the code in the domain and application layer to something as "messy" as 
infrastructure code. When you apply the dependency rule, <strong>you can replace 
anything in the infrastructure layer without touching and/or breaking code in 
any of the deeper layers</strong>.<br><br>This style of decoupling has for a 
long time been known as the Dependency Inversion Principle - the "D" in SOLID, 
as formulated by Robert C. Martin: "<strong>Depend on abstractions, not on 
concretions</strong>." A practical implementation in most object-oriented 
programming languages implies :</p>
<ol>
  <li>Define an interface for the thing you want to depend on (which will be the 
  abstraction)</li>
  <li>Then provide a class implementing that interface. This class contains all 
  the low-level details that you've stripped away from the interface, hence, 
  it's the concretion this design principle talks about.</li>
</ol>
<p>Extending "infrastructure" to everything that's needed to connect your app to 
users and external services, including code written by us or by any (hardware) 
vendor we rely on, we should humbly conclude that by far the <strong>biggest 
part of an app&nbsp; is concerned with simply connecting</strong> our tiny bit 
of custom (yet precious) domain and application layer code <strong>to the "world 
outside"</strong>.</p>
<p><br></p>
<h2>Architecture: deferring technological decisions from project start</h2>
<p>Applying the proposed set of layers as well as the dependency rule gives you 
a lot of options:<br><br>You can develop many use cases before making decisions 
like "which DB am I going to use?". You can easily use different databases 
for different use cases as well.<br></p>
<p>You can even decide later on which (web) 
framework you're going to use. This prevents your app from becoming "a 
Symfony application" or "a Laravel project".<br>Frameworks and libraries will be 
put on a safe distance from domain and app layer code. This helps with 
upgrading to newer (major) versions of those frameworks and libraries. It also 
prevents you from having to rewrite the system if you ever like to use, say, 
Symfony 3 instead of Zend Framework 1.<br></p>
<p>This is a very attractive 
idea: right technological 
decisions; not at the beginning of a project, but when I know, based on 
<strong>what use cases of my app are stating</strong>.<br><br>Having seen a lot of 
legacy code in my career, I also believe that applying correct <strong>layering</strong> as well 
as enforcing the <strong>dependency rule</strong> helps prevent you from producing legacy code. 
At least, it helps you <strong>prevent making framework and library calls all over the 
code base</strong>. After all, replacing those calls with something more up-to-date, 
proves to be one of the biggest challenges of working with legacy code. If you 
have <strong>framework and library calls in one, infrastructure layer</strong>, and if you always apply dependency inversion 
principle (<strong>app and core code do not depend on infrastructure code</strong>), it'll be much easier to do so.<br></p>
<h3>Conclusion</h3>
<p>As I mentioned in my previous post, with this nice set of layers, we know now 
that there is a time and place for your beloved framework too. Fw is not all over 
the place, but in a restricted zone called "the infrastructure layer". In fact, 
it's more like the domain and application layer are restricted zones, since the 
dependency rule has only consequences for these two layers. You can fully 
embrace any kind of RAD-stupid thing your framework offers, as long as it stays 
inside that layer, and nothing of it trickles down into either the Application 
or g*d forbid the&nbsp;Domain&nbsp;layer. <br><br>Some may find 
that the proposed layer system results in "<strong>too many layers ?</strong>" (I don't know about 
3 layers being too many, but anyway, if it hurts, maybe you shouldn't do it). If 
you want, you could leave out the application layer. You won't be able to write 
acceptance tests against the application layer anymore (they will be more like 
system tests, which tend to be slow and brittle). And you won't be able to 
<strong>expose the same use case to, say, a web UI and a web API</strong> without duplicating 
some code. But it should be doable.<br><br>At least, make sure that the biggest 
improvement of your application's design comes from the fact that you separate 
domain (or core) code from infrastructure code. Optimize it for your 
application's use cases, apply anything you've learned from the discipline of 
Domain-Driven Design, and bend ORMs and web frameworks to obey your will.<br>
<br>We still need to look at infrastructure code in more detail. This will bring 
us to the topic of hexagonal architecture, a.k.a. "ports &amp; adapters", to be 
covered in another article.<br></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

