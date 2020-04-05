<?php
/*<!--
  J:\awww\www\fwphp\glomodul4\help_sw\test\bootstrap\
  http://dev1:8083/fwphp/glomodul4/help_sw/test/bootstrap/
--> */

require $wsroot_path.$path_rel_examples .'01_PHP_bootstrap/bootstrap/inc_adresses.php' ;
//require '../inc_adresses.php' ;
require $wsroot_path.$path_rel_examples .'01_PHP_bootstrap/bootstrap/inc_hdr_ftr.php' ;
//require '../inc_hdr_ftr.php' ;
hdr_pge($module_arr, 'Bootstrap4', '/'.$module_arr['module_relpath'].'/05site/style.css');
?>

  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container">
      <a href="index.php" class="navbar-brand">Module about art</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navNavbar"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
        
          <li class="nav-item active">
            <a href="index.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="../index.php" class="nav-link">HomeModulesGroup</a>
          </li>
          <li class="nav-item">
            <a href="about.php" class="nav-link">About Us</a>
          </li>
          <li class="nav-item">
            <a href="services.php" class="nav-link">Services</a>
          </li>
          <li class="nav-item">
            <a href="blog.php" class="nav-link">Blog</a>
          </li>
          <li class="nav-item">
            <a href="contact.php" class="nav-link">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- SHOWCASE SLIDER -->
  <section id="showcase">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item carousel-image-1 active">
          <div class="container">
            <div class="carousel-caption d-none d-sm-block text-right mb-5">

              <h1 class="display-3">Beautiful nature</h1>
              <p class="lead">Beautiful nature.</p>

              <a href="#" class="btn btn-danger btn-lg">Sign Up Now</a>
            </div>
          </div>
        </div>

        <div class="carousel-item carousel-image-2">
          <div class="container">
            <div class="carousel-caption d-none d-sm-block mb-5">

              <h1 class="display-3">Beautiful knowlege mauntains</h1>
              <p class="lead">are oposite to ugly ignorance.</p>

              <a href="#" class="btn btn-primary btn-lg">Learn More</a>
            </div>
          </div>
        </div>

        <div class="carousel-item carousel-image-3">
          <div class="container">
            <div class="carousel-caption d-none d-sm-block text-right mb-5">
            
            <h1 class="display-3">Info flow</h1>
              <p class="lead">Bootstrap example multipage module (site) project. Table rows CRUD is much heavier task than links and menus (basic framework).</p>

              
              <a href="#" class="btn btn-success btn-lg">Learn More</a>
            </div>
          </div>
        </div>
      </div>

      <a href="#myCarousel" data-slide="prev" class="carousel-control-prev">
        <span class="carousel-control-prev-icon"></span>
      </a>

      <a href="#myCarousel" data-slide="next" class="carousel-control-next">
        <span class="carousel-control-next-icon"></span>
      </a>
    </div>
  </section>

  <!-- HOME ICON SECTION -->
  <section id="home-icons" class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-4 text-center">
          <i class="fas fa-cog mb-2"></i>
          <h3>aaaaaaaaa</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, maxime.</p>
        </div>
        <div class="col-md-4 mb-4 text-center">
          <i class="fas fa-cloud mb-2"></i>
          <h3>Sending Data</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, maxime.</p>
        </div>
        <div class="col-md-4 mb-4 text-center">
          <i class="fas fa-cart-plus mb-2"></i>
          <h3>cccccccccc</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, maxime.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- HOME HEADING SECTION -->
  <section id="home-heading" class="p-5">
    <div class="dark-overlay">
      <div class="row">
        <div class="col">
          <div class="container pt-5">
            <h1>M V C</h1>
            <p class="d-none d-md-block">Vincent van Gogh (1853-1890) </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- INFO SECTION -->
  <section id="info" class="py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-6 align-self-center">
          <h3>487. Flower Garden, Arles [1888].jpg</h3>
          <p>All paintings and photos were scanned  from the book "VAN GOGH - Obra Completa de Pintura" (portuguese version), by Ingo F. Walther and Rainer Metzger (authors), Taschen (german publisher), ISBN 3-8228-7248-2.
          Wonderful and delightful journey into Van Gogh's painting world.

<p>Spent 3 weeks and a half to finish scanning pic by pic, page after page. Uff!!! 




          <a href="blog.php" class="btn btn-outline-danger btn-lg">Learn More (Blog)</a>
        </div>
        <div class="col-md-6">
          <a href="<?=$module_arr['wsroot_url']?>zinc/img/autoload_route_dispatch.jpg" data-toggle="lightbox" 
             data-gallery="img-gallery">
          <img src="<?=$module_arr['wsroot_url']?>zinc/img/autoload_route_dispatch.jpg" class="img-fluid" alt="">
        </div>
      </div>
    </div>
  </section>

  <!-- VIDEO PLAY SECTION -->
  <section id="video-play">
    <div class="dark-overlay">
      <div class="row">
        <div class="col">
          <div class="container p-5">
            <a
              href="#"
              class="video"
              data-video="https://www.youtube.com/embed/HnwsG9a5riA"
              data-toggle="modal"
              data-target="#videoModal"
            >
              <i class="fas fa-play"></i>
            </a>
            <h1>See What We Do (video)</h1>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- PHOTO GALLERY -->
  <section id="gallery" class="py-5">
    <div class="container">
      <h1 class="text-center">Photo Gallery</h1>
      <p class="text-center"><b>M V C extensible architecture</b></p>


  <!-- ROW 1, 3 PIC, PHOTO GALLERY http://lorempixel.com/560/560/business/1  -->
      <div class="row mb-4">
        <div class="col-md-4">



<h3>Benefits of MVC</h3>
         <p>
         Separate different parts of an application (separation of concerns). This makes it easier to modify code and assign developers on different tasks.
         <br>Maintaining small applications easy (3 dirs = M, V, C for all modules).
</p>



<h3>Downsides of MVC</h3>
         <p>
         <a href="https://medium.com/@sameernyaupane/php-software-architecture-part-1-mvc-1c7bf042a695">https://medium.com/@sameernyaupane/php-software-architecture-part-1-mvc-1c7bf042a695</a>
         <br>
         <a href="https://medium.com/@sameernyaupane/php-software-architecture-part-2-the-alternatives-1bd54e7f7b6d">https://medium.com/@sameernyaupane/php-software-architecture-part-2-the-alternatives-1bd54e7f7b6d</a>&nbsp;
         <br>
         <a href="https://blog.ircmaxell.com/2014/11/alternatives-to-mvc.html">https://blog.ircmaxell.com/2014/11/alternatives-to-mvc.html</a>&nbsp;
</p>
         <p>
It does not scale well with bigger applications.
It encourages fat controllers/or fat models. Causing <strong>spaghetti code (Big 
         Ball of Mud aproach)</strong> as the code base grows.
It limits separation of concerns to only three different parts (3 dirs = M, V, C for all modules 
         is bad).
</p>
         <p>
         Eg flight booking system - how the MVC can become a bottleneck in growing applications.
We call third party flight booking API engine to check for available flights.
We log each response we get to the file system.
We save our data in the database for future use.
</p>




<h3>Improved MVC is not enough for large app</h3>
  <!-- ROW 4, 3 PIC, PHOTO GALLERY -->
<p>
          <a href="<?=$module_arr['wsroot_url']?>zinc/img/04_M_V_presenter_method.jpg" 
             data-toggle="lightbox" data-gallery="img-gallery">
            <img src="<?=$module_arr['wsroot_url']?>zinc/img/04_M_V_presenter_method.jpg" class="img-fluid">
          </a>
          1. 04_M_V_presenter_method.jpg
</p>
<p>
          <a href="<?=$module_arr['wsroot_url']?>zinc/img/04_M_V_viewmodel_method.jpg" data-toggle="lightbox" data-gallery="img-gallery">
            <img src="<?=$module_arr['wsroot_url']?>zinc/img/04_M_V_viewmodel_method.jpg" class="img-fluid">
          </a>
          2. 04_M_V_viewmodel_method.jpg
          - Uncle Bob - basically a Decorator pattern
</p>
<p>
          <a href="<?=$module_arr['wsroot_url']?>zinc/img/05_n_tier_phisical_servers_like_MVCcode.jpg" data-toggle="lightbox" data-gallery="img-gallery">
            <img src="<?=$module_arr['wsroot_url']?>zinc/img/05_n_tier_phisical_servers_like_MVCcode.jpg" class="img-fluid">
          </a>
          3. 05_n_tier_phisical_servers_like_MVCcode.jpg
</p>




        </div>
        <div class="col-md-4">

<h3>
DDD -
Doman Driven Design</h3>
         <p>
         2016_Buenosvinos_Domain-Driven_Design_in_PHP.pdf<br>Was introduced by Eric Evans published in 2003.
         <a href="https://twitter.com/ericevans0">https://twitter.com/ericevans0</a>&nbsp;
         and &quot;Domain-Driven Design: Tackling complexity in the Heart of 
         Software&quot; by Eric Evans.
         Vaughn Vernon author of the red book,
aka. &quot;Implementing Domain-driven Design&quot;, talks about Hexagonal Architecture
in Chapter 4 of the same book.


      </p>
         <p>
         DDD is not about technology, but about developing knowledge around 
         business&nbsp; by focusing on model, making sure business and software 
         talk the same (Ubiquitous) language&nbsp; discovering business domain. 
         Design is the code and the code is the design, framework for strategic 
         and tactical design. Sometimes thinking less technically is better, 
         think in the behaviours of objects.</p>
         <p>
         <strong>Layered Architecture (UI layer, app, domain, infrastructure)</strong> 
         instead&nbsp; procedural way of coding.&nbsp; As Domain Model layer 
         depends on concrete infrastructure implementations, <strong>DIP 
         (Dependency Inversion Principle)</strong> could be applied by 
         relocating Infrastructure layer on top of the other three layers -&nbsp; 
         now i.l. depends on UI l., app. l., domain layer. </p>
         <p>
         High level modules should not depend upon low level modules. Both 
         should depend upon <strong>abstractions</strong>. Abstractions should 
         not depend upon details. Details should depend upon abstractions. - 
         Robert C. Martin</p>
         <p>
         <strong>For data-centric (CRUD) app you do not need DDD</strong>. If 
         app has less than 30 use-cases, it might be simpler to use a framework. </p>
         <p>
         2016_Buenosvinos_Domain-Driven_Design_in_PHP.pdf -&nbsp; Carlos, 
         Christian and Keyvan - We arrived to DDD via the tactical patterns and 
         fallen in love then with the strategical parts.</p>
         <ol>
          <li>(Zend) examples not clear enough ! how to properly design Entities, 
          Value Objects, Services, Domain Events, Aggregates, Factories, 
          Repositories, Services and Application Services with PHP. </li>
          <li>What is the role of the main PHP libraries and frameworks used 
          today (Doctrine, Symfony).</li>
          <li>How to apply Hexagonal Architecture within your app 
          whether you use an open source framework or your own. </li>
          <li>How to integrate Bounded Contexts using REST frameworks and 
          messaging mechanisms.</li>
         </ol>

        </div>
        
        <div class="col-md-4">


         <h3>Hexagonal Architecture</h3>
         <p>
         also known as <strong>Ports and Adapters</strong> -&nbsp; app as 
         hexagon where each side represents a Port with one or more Adapters. 
         Port is a connector with a pluggable Adapter which transforms an 
         outside input to something the inside application can understand.&nbsp; 
         In terms of the DIP, the Port would be a high level module and an 
         Adapter would be a low level module. Furthermore, if the application 
         needs to emit some message to the outside it will also use a Port with 
         an Adapter to send it and transform it to something that the outside 
         can understand. For this reason, Hexagonal Architecture brings up the 
         concept of symmetry in the application and it is also the main reason 
         why the schema of the architecture changes. It is often represented as 
         a hexagon, because it does no longer make sense to talk about a &quot;top&quot; 
         layer nor a &quot;bottom&quot; layer. Instead, Hexagonal Architecture talks 
         mainly in terms of &quot;outside&quot; and &quot;inside&quot;.</p>
         <p>
         Was defined 2005 by Alistair Cockburn&nbsp; one of the Agile Manifesto 
         authors - <strong>adapter pattern</strong> - interface - abstraction layer for external services - eg DBI - rule 
         &quot;Program to an interface, not implementation&quot;
         <a href="http://alistair.cockburn.us/Hexagonal+architecture">http://alistair.cockburn.us/Hexagonal+architecture</a>&nbsp; 

         Allows an application to be equally driven by users, programs, 
         automated tests or batch scripts, and to be<br>developed and tested in 
         isolation from its eventual run-time devices and databases.</p>
         <p>
Adapters are good, but using them religiously with Interfaces are not a necessity.
We do not need Adapters for framework classes that we need to use. Because we trust them enough and the extra layer of added complexity is rarely of any use. 

      </p>


           <h3>Onion Architecture</h3>
           <p>

Jeffrey Palermo coined the term Onion Architecture in his blog
           <a href="http://jeffreypalermo.com/blog/the-onion-architecture-part-1/">http://jeffreypalermo.com/blog/the-onion-architecture-part-1/</a>&nbsp;
Hexagonal architecture and Onion Architecture share the following premise:
           &quot;<strong>Externalize infrastructure and write adapter code so that the infrastructure
does not become tightly coupled</strong>&quot;.</p>
           <h3>Clean Architecture</h3>
           <p>

           was introduced by Uncle Bob same as : SOLID principles,
ViewModel pattern, which is basically a Decorator pattern
- easy to separate logic from views, making views as dumb as possible
He also uses Interfaces to separate things from web. That is a bit overkill
for web applications. But for applications that
interact with web, cli and/or desktop that is a good way to do it.
           <a href="https://twitter.com/unclebobmartin">https://twitter.com/unclebobmartin</a>&nbsp; 

           </p>


        </div>
      </div>
  <!-- ROW 1a, 3 PIC, PHOTO GALLERY http://lorempixel.com/560/560/business/1  -->
      <div class="row mb-4">
        <div class="col-md-4">
           <h3>MVC Extensible Architecture</h3>
          <a href="<?=$module_arr['wsroot_url']?>zinc/img/extensible_architecture.png"
             data-toggle="lightbox" data-gallery="img-gallery">
            <img class="img-fluid"
            src="<?=$module_arr['wsroot_url']?>zinc/img/extensible_architecture.png" 
            >
          </a>&nbsp; &nbsp; &nbsp; &nbsp;
           <p>extensible_architecture.png - 
           <a href="https://medium.com/@sameernyaupane/php-software-architecture-part-3-extensible-architecture-c3fc4d8f0e02">https://medium.com/@sameernyaupane/php-software-architecture-part-3-extensible-architecture-c3fc4d8f0e02</a> </p>
           <p>it is basically an extension to MVC - added new design patterns and layers.</p>
        </div>
        <div class="col-md-4">


          <p>&lt;--- [<b>Domains</b>]: Domain specific code/Business logic 
          eg. getFlightAvailability()
          - classes that act as a glue to various layers in our app. 
          Directs what API we need to call and where we need to save our data. 
          <br />All our domain code = <b>Business logic = CRUD is in domain layer
                instead in C method</b> without interfaces (only php classes) or 
          with. <strong><br>Dependency Rule</strong> : source code&nbsp; 
          dependencies can only point inwards. Nothing in an inner circle can 
          know anything at all about something in an outer circle. <br><strong>
          Functional rule</strong> : outer code knows what does inner code, but 
          not how.</p>
          <p>[<b>Adapters</b> w/o or w/ Interfaces]: Third party code/APIs separation. 
          eg. Flight Booking API. Adapter is actually a design pattern. It is a special class
          that is used as a bridge between two different interfaces. We usually use 
          an Interface class which the Adapter class will adhere to. But this 
          is not required in all cases. If you are not sure if the API is going to be a fit,
          you can always write an Interface for it. I usually do not see any need for 
          extra layer of Interfaces even for Adapters.

      </p>
        </div>
        <div class="col-md-4">
           <p>

          [<b>Services</b>]: Common application/business logic goes here. eg. log()
          <br />Services are overused term in PHP community, used for various reasons, 
           so due to that there is no clear definition of the term.
          Services are app logic that usually are cross-referenced 
          from different domain (CRUD) classes. It can also be domain logic that is 
          too big for domain itself. If some domain logic needs to be cross-referenced
          from different classes, then that usually is separated to its own Service class 
           (in domain inner circle, not in outer !).
          You could subdivide them into App S. and Domain S. if needed in large app.
          <br />Laravel Service Providers are completely different beasts. They are services which are used by
          framework itself, or that are needed globally throughout app.

           </p>
           <p>

           [<b>MVC</b> : Model, View, Controllers] :&nbsp; Three basic layers of separation

           </p>


        </div>
      </div>
  <!-- ROW 1b, 3 PIC, PHOTO GALLERY http://lorempixel.com/560/560/business/1  -->
      <div class="row mb-4">
        <div class="col-md-4">
          <a href="<?=$module_arr['wsroot_url']?>zinc/img/extensible_architecture_flowchart_view.png" 
             data-toggle="lightbox" data-gallery="img-gallery">
            <img class="img-fluid"
            src="<?=$module_arr['wsroot_url']?>zinc/img/extensible_architecture_flowchart_view.png"
            >
          </a>&nbsp; &nbsp; &nbsp; &nbsp;
           <p>extensible_architecture_flowchart_view.png - 
           <a href="https://medium.com/@sameernyaupane/php-software-architecture-part-3-extensible-architecture-c3fc4d8f0e02">https://medium.com/@sameernyaupane/php-software-architecture-part-3-extensible-architecture-c3fc4d8f0e02</a> </p>
           <p>In app where there are two or more than two user facing interfaces, let’s say 
              front-end and back-end, we can share the services, adapters and repositories.</p>
          <p>and refactoring (Laravel) code :
          <a href="https://medium.com/@sameernyaupane/php-software-architecture-part-4-refactoring-fd577eb6fe3f">
          https://medium.com/@sameernyaupane/php-software-architecture-part-4-refactoring-fd577eb6fe3f</a> 
           <br> </p>
        </div>
        <div class="col-md-4">
          <p>&lt;--- [<b>Repositories</b>]: Persistence logic goes here 
          - CRUD (DBI) layer, eg. saveData()
          <br />It usually retrieves them from the ‘Model’ which is the Eloquent Model in Laravel.
          Repositories are essential to keep all the persistence logic out of our 
          main Domain layer. They help act as a bridge between our internal code and the Model.
          This way no SQL or Eloquent queries can creep in to our business logic.
          It also makes easy to switch our persistence layer, we would just rewrite
          our repository instead of having to touch our domain layer.

          <br />Now, I am not advocating that we should never allow anyone to write
          their business logic in a controller. If a feature is small, go ahead and 
          write them in a controller. You can also directly reference your Model there,
          if the db call is just one liner. Just keep in mind that, if ever you need
          to change the persistence layer, you would need to refactor it into a Repository.
          The main point behind our simple architecture is to be quick and only refactor
          when it is actually needed. And further, only refactor the part you need to change.

      </p>


        </div>
        <div class="col-md-4">
           <p>Also these layers are not all you can add. If you need an extra layer
          between your View and your Repository/Model, you can use a Decorator pattern.
          In Clean Architecture by Uncle Bob, he uses a similar pattern called ViewModel.
          You can use that to do all the decorating logic before you pass it to a view.

          <br />Another layer that has been useful for me is the Translator layer.
          It sits before the Adapter layer. It processes the data that comes through
          an external API, then it passes it to the Adapter. Translators do manual
          conversion from XML/JSON structure to native objects. In case of PHP that
          would be plain native PHP objects.

           </p>
           <p>Check out this article for a different approach 
           to refactoring the same Laravel code :<br>
           <a href="https://medium.com/@mantasd/refactoring-refactored-code-d54e801001b4">
           https://medium.com/@mantasd/refactoring-refactored-code-d54e801001b4</a>
           
           </p>
        </div>
      </div>


  <!-- ROW 2, 3 PIC, PHOTO GALLERY -->
      <div class="row mb-4">
        <div class="col-md-4">
          <a href="<?=$module_arr['wsroot_url']?>zinc/img/mvc_M_V_data_flow.jpg" data-toggle="lightbox" 
             data-gallery="img-gallery">
            <img src="<?=$module_arr['wsroot_url']?>zinc/img/mvc_M_V_data_flow.jpg" class="img-fluid">
          </a><p>1. mvc_M_V_data_flow.jpg
             (<a href="https://www.sitepoint.com/the-mvc-pattern-and-php-1/">
                MVC Pattern and PHP, March 04, 2013 By Callum Hopkins</a>)
          </p>
        </div>
        <div class="col-md-4">
          <h3> MVC  Architecture</h3>
          <a href="<?=$module_arr['wsroot_url']?>zinc/img/mvc_Laravel_M_C_V_data_flow.jpg" data-toggle="lightbox" 
             data-gallery="img-gallery">
            <img src="<?=$module_arr['wsroot_url']?>zinc/img/mvc_Laravel_M_C_V_data_flow.jpg" class="img-fluid">
          </a>2. mvc_Laravel_M_C_V_data_flow.jpg Model code is most complicated. 
             C collects user events (eg link clicked) and demands data from M.
        </div>
        <div class="col-md-4">
          <a href="<?=$module_arr['wsroot_url']?>zinc/img/mvc_Laravel2.jpg" data-toggle="lightbox" 
             data-gallery="img-gallery">
            <img src="<?=$module_arr['wsroot_url']?>zinc/img/mvc_Laravel2.jpg" class="img-fluid">
          </a>
          3.mvc_Laravel2.jpg
        </div>
      </div>

  <!-- ROW 3, 3 PIC, PHOTO GALLERY -->
      <div class="row mb-4">
        <div class="col-md-4">
          <a href="<?=$module_arr['wsroot_url']?>zinc/img/mvc2.jpg" data-toggle="lightbox" 
             data-gallery="img-gallery">
            <img src="<?=$module_arr['wsroot_url']?>zinc/img/mvc2.jpg" class="img-fluid">
          </a>&nbsp; &nbsp; &nbsp; &nbsp;
           <p>4. mvc2.jpg - Original MVC idea is : 
           V calls CRUD fns of M as shown in picture 1. mvc_M_V_data_flow.jpg "M updates V".</p>
        </div>
        <div class="col-md-4">
           <p>&lt;--- <strong>My MSG_SHARE module</strong> : C knows WHAT to do, calls V, V knows HOW to do.
           V may be class but I prefer to include view sctipt in C method.</p>
           <p>Arrow to M begins at C rectangle meaning :
           <b>C class (eg Event_c) instantiates M class (eg Event_M)</b>,
           so C may manipulate model based eg on link in V before calling V
           and we do not need separate CRUD V to do this.
        </div>
        <div class="col-md-4">
           <p>In conf_site.php is code for request, router. After that code, in
           conf_module.php is code for namespacing ctrname, autoload class scripts,
            db constants and dispatch (method call).</p>
           <p>Global Model class in Model.php : CRUD fns abstracted for any table.</p>
        </div>
      </div>


  <!-- ROW 4, 3 PIC, PHOTO GALLERY -->
      <div class="row mb-4">
        <div class="col-md-4">
          <a href="<?=$module_arr['wsroot_url']?>zinc/img/04_M_V_presenter_method.jpg" 
             data-toggle="lightbox" data-gallery="img-gallery">
            <img src="<?=$module_arr['wsroot_url']?>zinc/img/04_M_V_presenter_method.jpg" class="img-fluid">
          </a>5. 04_M_V_presenter_method.jpg
        </div>
        <div class="col-md-4">
          <a href="<?=$module_arr['wsroot_url']?>zinc/img/04_M_V_viewmodel_method.jpg" data-toggle="lightbox" data-gallery="img-gallery">
            <img src="<?=$module_arr['wsroot_url']?>zinc/img/04_M_V_viewmodel_method.jpg" class="img-fluid">
          </a>6. 04_M_V_viewmodel_method.jpg
          - Uncle Bob - basically a Decorator pattern</div>
        <div class="col-md-4">
          <a href="<?=$module_arr['wsroot_url']?>zinc/img/05_n_tier_phisical_servers_like_MVCcode.jpg" data-toggle="lightbox" data-gallery="img-gallery">
            <img src="<?=$module_arr['wsroot_url']?>zinc/img/05_n_tier_phisical_servers_like_MVCcode.jpg" class="img-fluid">
          </a>7. 05_n_tier_phisical_servers_like_MVCcode.jpg
        </div>
      </div>


      <p>&nbsp;</p>
      <p>&nbsp;</p>

      <h2>Windows 10 64 bit, IIS 10, PHP 7.3.1, SSL : 2way (mutual) 
      authentication</h2>
      <h4><a href="https://localhost/fwphp/glomodul4/lsweb/">
      https://localhost/fwphp/glomodul4/lsweb/</a>&nbsp;&nbsp; ( not working : https://ssltest/fwphp/glomodul4/lsweb/ )<br>
      </h4>
      <p>2019.03.14 </p>
      <p>When request sender and receiver do not sign in one to anander :<br>
      <a href="https://chillyfacts.com/send-soap-request-and-read-xml-response-from-php-page/">
      https://chillyfacts.com/send-soap-request-and-read-xml-response-from-php-page/</a> 
      :<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; First statement says WHERE IS FN ON 
      INET,<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Second statement CALLS FN :<br>
      $soapclient = new SoapClient( 
      'http://www.holidaywebservice.com/HolidayService_v2/HolidayService2.asmx?wsdl');<br>
      $response =$soapclient-&gt;GetCountriesAvailable();<br>print_r($response);
      <br>GetHolidaysForYear($country_year_array) &lt;===<strong> fn in wsdl 
      description of web service</strong></p>
      <p>&nbsp;</p>
      <p>When installing IIS (CP -&gt; Programs -&gt; Win properties) : include in 
      Security group : Client Certificate Mapping Authentication and Centralni 
      mngment SSl<br><br>
      <a href="https://weblogs.asp.net/scottgu/tip-trick-enabling-ssl-on-iis7-using-self-signed-certificates">
      https://weblogs.asp.net/scottgu/tip-trick-enabling-ssl-on-iis7-using-self-signed-certificates</a>
      <br>
      <a href="http://weblogs.asp.net/scottgu/archive/2007/04/02/iis-7-0.aspx">
      http://weblogs.asp.net/scottgu/archive/2007/04/02/iis-7-0.aspx</a>&nbsp;
      <br>
      <a href="https://weblogs.asp.net/scottgu/ASPNET-20-Tips_2C00_-Tricks_2C00_-Recipes-and-Gotchas">
      https://weblogs.asp.net/scottgu/ASPNET-20-Tips_2C00_-Tricks_2C00_-Recipes-and-Gotchas</a>
      <br><br>You should always use SSL for <br>- login pages <br>- for all 
      other sensitive pages (eg: account pages that show financial or personal 
      info)<br><br>Install and manage a certificate, and then associate it with 
      a web-site<br><br>IIS 7 Manager makes it radically easier to configure and 
      enable SSL. IIS 7.0 also now has built-in support for creating &quot;Self 
      Signed Certificates&quot; that enable you to easily create test/personal 
      certificates that you can use to quickly SSL enable a site for development 
      or test purposes. <br><br>Step 1: Create a New Web Site<br>
      -----------------------------<br>IIS 7 Manager is a complete re-write, and 
      provides a more logical organization of web features,<br>now have an 
      unlimited number of sites, 10 simultaneous request limitation on Windows 
      Client versions of IIS also no longer exists. <br><br>right click on the 
      &quot;Web Sites&quot; node in the left hand tree-view pane and choose &quot;Add Web Site&quot; 
      :<br>Site name : ssltest<br>Path : J:\awww\www<br>Type : https Port 443<br>
      SSL certificate : IIS express development certificate<br><br>Step 2: 
      Create a new Self Signed Certificate if there is not IIS express 
      development certificate<br>--------------------------------------------<br>
      Before binding SSL rules to our new site, we need to first import and 
      setup a security certificate to use with the SSL binding. <br><br>
      Certificates are managed in IIS 7.0 by clicking the root machine node in 
      the left-hand tree-view explorer, and then selecting the &quot;Server 
      Certificates&quot; icon in the feature pane on the right:<br>NO MORE - now 
      &quot;Server certificates&quot; icon : IIS express development certificate expires 
      2023.05.01<br><br>I could optionally go to a certificate authority like 
      Verisign and purchase a certificate to import using this admin UI. 
      Alternatively, I can create a &quot;self-signed certificate&quot; which is a test 
      certificate that I can use during the development and testing of my site. 
      To-do this, click the &quot;Create Self-Signed Certificate&quot; link on the 
      right-hand side of the admin tool:<br><br>Enter a name to use for the 
      certificate (for example: &quot;test&quot;) and hit ok. IIS7 will then automatically 
      create a new self-signed crypto certificate for you and register it on the 
      machine:<br><br>Step 3: Enable HTTPS Bindings for New Site<br>
      ------------------------------------------<br>To SSL enable the web-site 
      we created earlier, select the web-site node in the left-hand tree-view, 
      and the click the &quot;Bindings&quot; link in its &quot;actions&quot; pane on the right-hand 
      side of the screen.<br><br>This will then bring up a dialog that lists all 
      of the binding rules that direct traffic to this site (meaning the 
      host-header/IP address/port combinations for the site)<br><br>To enable 
      SSL for the site, we'll want to click the &quot;Add&quot; button. This will bring up 
      an &quot;add binding&quot; dialog that we can use to add HTTPS protocol support. We 
      can select the self-signed certificate we created earlier from the SSL 
      certificate dropdownlist in the dialog, and in doing so indicate that we 
      want to use that certificate when encrypting content over SSL.<br><br>Step 
      4: Test out the Site<br>-------------------------<br>See above.<br><br>
      You'll likely see anti-phishing error message kick in - don't panic, 
      self-signed certificate on your local machine looks suspicious. Click the 
      &quot;Continue to this website&quot; link to bypass this security warning and 
      proceed to the site. <br>Add the site to my &quot;Trusted Root Certification 
      Authorities&quot; in IE to avoid seeing the phishing warning. <br>In addition, 
      if you are testing a local service that calls a webservice on the site 
      running the self signed SSL, you will need to add the site to the &quot;Local 
      Computer&quot; Trusted Root Certification Authorities. <br>Obviously one should 
      do this only for *self* signed certs.<br>&nbsp;</p>
      <h2>Configuring client certificates for 2way (mutual) authentication on 
      IIS 8</h2>
      <p>
      <a href="https://medium.com/@hafizmohammedg/configuring-client-certificates-on-iis-95aef4174ddb">
      <strong>
      https://medium.com/@hafizmohammedg/configuring-client-certificates-on-iis-95aef4174ddb</strong></a>&nbsp;
      <br>Using self signed certificate for a demonstration purposes.</p>
      <h2>1 . Make your website to require client certificate</h2>
      <p>In IIS Manager click on SSL Settings icon for ssltest site created 
      above.<br><br>On 
      the SSL Settings tick:</p>
      <ul>
       <li>&nbsp;<strong>Require SSL </strong>checkbox <br></li>
       <li>&nbsp;and on the Client certificates section choose <strong>Require</strong> 
       option to make any client connection require a certificate to the 
       website. The page you are attempting to access requires your browser to 
       have a Secure Sockets Layer (SSL) client certificate that the Web server 
       recognizes.</li>
      </ul>
      <p class="auto-style1">Alternatively, to allow a user to supply their own 
      certificate, use Accept client certificates.<br>To allow users to connect 
      without supplying their own certificate, click Ignore client certificates.<br>Require produces msg : HTTP Error 403.7 - Forbidden. 
      If we do next than not.</p>
      <h2>2. Generating self signed root (serverski) and client (aplikativni) 
      certificates</h2>
      <p>We use our own Root CA and Client certificate. Use&nbsp;makecert.exe (can 
      be found in&nbsp;Windows&nbsp;SDK, Signing tools) for creating certificates.<br>
      </p>
      <h4>2.1 
      Generate Root certificate <strong>ClientRootCA.cer (and .pvk) </strong>for signing your client certificates</h4>
      <pre>makecert -n &quot;CN=ClientRootCA&quot; -r -sv ClientRootCA.pvk ClientRootCA.cer         pswkeyprivate=ss</pre>
      <ul>
       <li>In Create Private Key 
      Password&nbsp;dialog box, enter password, confirm it,  
      click&nbsp;OK.Optionally, you can click&nbsp;None without entering the password 
       - not recommended for security reasons.<br>This will 
      create your Private key <strong>ClientRootCA.pvk</strong> </li>
       <li>In Enter Private Key 
      Password&nbsp;dialog box, enter password again and then click&nbsp;OK.This is 
      the password needed to access <strong>private key file ClientRootCA.pvk</strong> in 
      order to generate file <strong><span class="auto-style1">ClientRootCA.cer</span> containing public key</strong>.</li>
      </ul>
      <h4>2.2 
      Installing certificate on server machine <strong>to Trusted Root Certification</strong><br>
      </h4>
      <p>We will install 
      certificate in <strong>Trusted Root Certification Authorities location</strong>.<br>To 
      do this you need to Winkey+R -&gt; mmc -&gt; click on File -&gt; 
      Add/Remove Snap in -&gt; Certificate -&gt; Add -&gt; Manage certificates for 
      computer account -&gt; Local computer -&gt; Finish</p>
      <p>Then you can import the certifcate you created on 
      2.1 <strong>ClientRootCA.cer to Trusted Root Certification</strong>.<br>
      </p>
      <p>&nbsp;Go to the left panel 
      and Certificates(Local Computer) -&gt; Trustued Root Certification 
      Authorities -&gt; Certificates -&gt; right click on Certificates and All 
      Tasks -&gt; Import<br>Then on the next dialog <strong>choose your ClientRootCA.cer</strong> 
      which you created earlier.<br>Then Click Next and then Finish.Now you will 
      see your certificate on Trusted certificate list<br></p>
      <p>Now your Root CA is 
      trusted by you web server. Any certificate signed by the Root CA will be 
      trusted from now on.<br></p>
      <h2>3.Create sample client certificate for 
      authentication with your server</h2>
      <pre>makecert -sk MyKeyName -iv <strong>ClientRootCA.pvk</strong> -n &quot;CN=tempClientcert&quot; -ic <strong>ClientRootCA.cer</strong> -sr currentuser -ss my -sky signature -pe</pre>
      <p>In the&nbsp;Enter Private Key 
      Password&nbsp;dialog box, enter the password for the root CA private key file 
      you specified in the previous step.This command will create a certificate 
      to User account certificate (Which can be exported later from mmc).</p>
      <h2>4. 
      Export the client certificate for use</h2>
      <p>Again go to mmc same as before<br>
      Go to File -&gt; Add/Remove Snap in. Like before choose certificates-&gt;add 
      -&gt; choose My User Accounts. This will create another tree on left side :<br>
      &quot;Certifcates -&gt; Current User&quot;<br>Open that and 
      Personal -&gt; Certificates<br>You will see &quot;<span class="auto-style1"><strong>tempClientcert</strong></span>&quot; on the certifcate 
      list (That is<strong> your test client certificate which will be used to 
      authenticate</strong>).<br><br>Right click on certificate<strong> tempClientcert 
      -&gt; </strong>&nbsp;All Tasks-&gt;Export will 
      open a dialog to export the certificate. Now we will export two 
      certificates :</p>
      <ul>
       <li>one client=<strong>posiljaocev aplikacijski </strong>with private key and public key together 
      (which will be used to authenticate as client) <br>After 
      clicking next on the export dialog -&gt; Click Next -&gt; Choose option &quot;<strong>Export 
       private key also</strong>&quot; 
      and next -&gt; Provide password ss and click Next <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
       (sifrriranje TripleDES-SHA1 or AES256-SHA256)<br>-&gt; give it a name on the 
      next dialog and save the file as <strong>J:\wamp64\z_instalac_moj_wamp64\01_makecert\clientCertificate.pfx</strong> (choose&nbsp;.pfx file 
      type) and finish.<br></li>
       <li>and one client=<strong>posiljaocev webserverski </strong>only the 
       public key (will be used for mapping on IIS)<br>Again by opening on export 
      dialog. In this case we select the second option &quot;<strong>Export only 
       public key</strong>&quot; Choose Base-64 encoded 
      x.509 (.CER)<br>Then on click next and give it a name (like 
       J:\wamp64\z_instalac_moj_wamp64\01_makecert\client_public.cer) on the next dialog and finish. This will create your 
      public key of your client certificates<br></li>
       <li>Now open J:\wamp64\z_instalac_moj_wamp64\01_makecert\client_public using notepad++<br>
      Copy the only string inside :<br><br>-----BEGIN CERTIFICATE-----<br>
       MIIB+TCCAWagAwIBAgIQppCnbXtt27xIvBd+rT/qwDAJBgUrDgMCHQUAMBcxFTAT<br>
       BgNVBAMTDENsaWVudFJvb3RD...<br>-----END CERTIFICATE-----<br>
       <br>And make it to one line and remove the 
      space between the lines (use notpad++ will do the job easily)<br>
       MIIB+TCCAWagAwIBAgIQppC...<br>(*Note this string will be 
      used on Mapping on IIS)</li>
      </ul>
      <h2>5. Configuring IIS Mapping website to client certificate</h2>
      <p>Click on your 
      website and double click on Authentication icon in IIS section (group).<br>Disable Anonymous 
      Authentication - becouse of error &quot;You are not authorized to view this page due to invalid authentication 
      headers.&quot; I turned it on.<br>Apply Changes and on Management section (group) double click on 
      Configuration Editor.<br><br>
      On&nbsp;Section&nbsp;choose from drop down list <strong>system.webServer/security/authentication/iisClientCertificateMappingAuthentication</strong><br>Change 
      enable to True<br>Change oneToOneMappingsEnabled to True<br><br>Click on 
      oneToOneMappings&nbsp; and &quot;Edit items&quot; link in right column<br>Click on Add on the top right cornerThen on certificate copy the 
      public certificate that we from above step (We said we will use this on 
      IIS mapping above)<br>Change enabled to True<br>Give a valid&nbsp;windows&nbsp;username and 
      password which you can login to the server machine.Then close the 
      dialog Click on Apply.<br></p>
      <h2>6. Client 
      Side<br></h2>
      <p>Now client authentication is enabled for your site when you browse 
      your site it will require you to provide client certificate.<br>The client 
      certificate it the one we import as &quot;clientCertificate.pfx&quot;.<br>From 
      client machine you can import the certificate by <strong>double click on the pfx 
      file</strong> and import it to your certificates.<br>which later will be available to 
      the browser as imported certificate to choose (in the above image it is 
      imported and can be seen on the select certificate option).<br>Without 
      certificate / Invalid one the server will throw error message to the client</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <ol>
       <li><strong>CA (Certificate Authority)</strong> is a trustpoint used as a 
       third-party between the parties trying to validate each other's 
       authenticity.</li>
       <li><strong>AE (Asymmetrical encryption)</strong> allows us to form a 
       protected trust between two parties that do not need to know anything 
       about each other.</li>
       <li><strong>SSL Certificates</strong> are used for authentication and for 
       the remote party to use to encrypt it's first message sent back</li>
       <li><strong>SSL CA Key</strong> is used to sign certificates authorized 
       by a Certificate Authority</li>
       <li><strong>SSL Key</strong> used to decrypt data encrypted by the 
       corresponding SSL Certificate</li>
       <li><strong>pre-master secret</strong> is used as a starting point in the 
       calculation of the master secret</li>
       <li><strong>master secret</strong> is used as a symmetrical 
       encryption/decryption key between both parties, making the process of 
       encryption/decryption faster</li>
      </ol>
      <p>&nbsp;</p>
      <p><b>How One-Way SSL Works?</b></p>
      <p>In one way SSL, only client validates the server to ensure that it receives data from the intended server. For implementing one-way SSL, server shares its public certificate with the clients.<br>
      Authenticity check is performed by our client browser with a little help 
      from a third-party certificate authority.<br>Eg log into Facebook, bank 
      website, google, etc. The point of this type of authentication is for you 
      (as the client) to verify the authenticity of the web site you are 
      connecting to and form a secure channel of communication.</p>
      <div class="row mb-12">
        <div class="col-md-12">
          <a href="http://lorempixel.com/560/560/business/4" 
             data-toggle="lightbox" data-gallery="img-gallery">
            <img src="<?=$module_arr['wsroot_url']?>zinc/img/1way_ssl.png" class="img-fluid">
          </a>
          <p>8. 1way_ssl.png - client is never verified as authentic, <strong>
          every client use the same key - attacker only has to obtain one key</strong> 
          to gain visibility into every connection (client key compromised)</p>
        </div>
      </div>


      <div class="row mb-12">
        <div class="col-md-12">
 
<ol> 
<li>Client requests for some protected data from the server on HTTPS protocol. This initiates SSL/TLS handshake process. 
Ee Client browser knows based on https:// that this connection will require an 
SSL handshake and sends a CLIENT_HELLO to the destined web server (eg google). 
This includes other things like SSL/TLS version, acceptable ciphers, etc<li>Server returns its public certificate to the client along with server hello message.
 Ee The web server receives the CLIENT_HELLO request and sends a SERVER_HELLO 
 back to the client. SERVER_HELLO contains SSL version, acceptable ciphers, and 
 server public certificate.<li>Client validates/verifies the received certificate 
 against a list of known Certificate Authorities, ee through certification authority (CA) for CA signed certificates.
<li>SSL/TLS client sends the random byte string that enables both the client and the server to compute the secret key to be used for encrypting subsequent message data. The random byte string itself is encrypted with the server's public key. 
Ee client sends back a pre-master secret which is encrypted inside the server's 
certificate. Remember only the server can decrypt anything encrypted with it's 
certificate because only the server has the decryption key. <strong>Server 
Certificate public key encrypts, Server private Key decrypts.</strong><li>After agreeing on this secret key, client and server communicate further for actual data transfer by encryping/decrypting data using this key.
 Ee At this point both client and server have the pre-master secret and can 
 calculate a master secret to use to symmetrically encrypt and decrypt data 
 between them.</ol>
        </div>
      </div>


      <p>&nbsp;</p>
      <p><b>How Two-Way SSL Works?</b></p>
      <p>Contrary to one-way SSL; in case of two-way SSL, both client and server authenticate each other to ensure that both parties involved in the communication are trusted. Both parties share their public certificates to each other and then verification/validation is performed based on that.</p>
      <div class="row mb-12">
        <div class="col-md-12">
          <a href="http://lorempixel.com/560/560/business/4" 
             data-toggle="lightbox" data-gallery="img-gallery">
            <img src="<?=$module_arr['wsroot_url']?>zinc/img/2way_ssl.png" class="img-fluid">
          </a>
          <p>9. 2way_ssl.png - server asks client to send its own certificate 
          for verification before continuing to the pre-master and master secret 
          phase of the SSL handshake. If client key is compromised one simply 
          has to revoke the compromised client in the form of a CRL certificate. 
          If CA key is compromised attacker can impose and generate a new 
          certificate authority certificate and start signing certificates that 
          can be used to fake authenticity. In essence break the certificate 
          authoritys trust. Keep in mind a Certificate Authority key cannot 
          decrypt your connections.</p>
        </div>
      </div>


      <div class="row mb-12">
        <div class="col-md-12">
 
<ol> 
<li>Client requests a protected resource over HTTPS protocol and the SSL/TSL handshake process begins.
<li>Server returns its public certificate to the client along with server hello. 
<li>Client validates/verifies the received certificate. Client verifies the certificate through certification authority (CA) for CA signed certificates.
<li>If Server certificate was validated successfully, <strong>client will provide its public certificate to the server</strong>.
<li>Server validates/verifies the received certificate. Server verifies the certificate through certification authority (CA) for CA signed certificates.
<li>After completion of handshake process, client and server communicate and transfer data with each other encrypted with the secret keys shared between the two during handshake. 
</ol>
        </div>
      </div>



      <p>Both the server and client must generate their own SSL certificate and 
      keys, and both must be signed by the same Certificate Authority. This 
      ensures that both server and client certificate are trusted. This allows 
      authentication to remain asymmetrical, instead of symmetrical. For 
      example, rather than have a shared password that 3 clients and the server 
      use to encrypt and decrypt data. Each client and the server have their own 
      certificates and keys that will be used for communication with the server. 
      Asymmetrical authentication and encryption is better at enforcing 
      authenticity because everyone has their own cert and key used to establish 
      a secure connection with the server. Symmetrical authentication is faster 
      at encrypting and decrypting but suffers from having every client use the 
      same key.</p>
      <p>&nbsp;</p>
      <p class="text-center"><b>Pseudo kod za 2way authentication (prijava)</b> pošiljaoca za slanje primaocu CA FINI XML eife potpisan podacima iz fininog aplikativnog certifikata pošiljaoca (potpis je enkriptiran podacima iz fininog poslužiteljskog certifikata pošiljaoca). Tu su jednostavne copy i substring naredbe a ne carevo novo ruho i kozje uši (prazne fraze i dijagrami - dovoljan je donji pseudo kod detaljnije ispisan).</p>



      <div class="row mb-8"> 
        <div class="col-md-8">
          <a href="http://lorempixel.com/560/560/business/4" 
             data-toggle="lightbox" data-gallery="img-gallery">
            <img src="<?=$module_arr['wsroot_url']?>zinc/img/2way_authentication_prijava.jpg" class="img-fluid">
          </a>
      <p>&nbsp;</p>
      <p>7. 2way_authentication_prijava.jpg</p>


Fetch protected page which required clientside certificate : in Cmder Win CLI as admin
<pre>curl --cert J:\awww\www\zinc\cert\cacert.pem https://www.xxx/some_protected_page
or
curl --cert certificate_file.pem:password https://www.xxx/some_protected_page</pre>
          <p>... see
          <a href="https://www.binarytides.com/use-clientside-ssl-certificate-curl-php/">
          https://www.binarytides.com/use-clientside-ssl-certificate-curl-php/</a>
</p>
          <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <a href="https://thejimmahknows.com/1-way-vs-2-way-ssl-authentication/">
          https://thejimmahknows.com/1-way-vs-2-way-ssl-authentication/</a>
</p>
          <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <a href="https://chillyfacts.com/send-soap-request-and-read-xml-response-from-php-page/">
          https://chillyfacts.com/send-soap-request-and-read-xml-response-from-php-page/</a>
          <br>
</p>
        </div>


        <div class="col-md-4">
<p>Eračun je <b>(B2B) 2way veza</b> gdje pošiljalac računa i primalac (FINA) imaju po 2 certifikata : <b>aplikacijski za potpisivanje txt-a koji šalju jedan drugom</b> i <b>serverski za enkriptiranje privatnim ključem txt-a koji šalju</b> pa će pdfcreator vjerojatno (ako uspije) samopotpisati pdf podacima iz aplikativne ili servercke p12 datoteke (=certifikat) kao što to radi sa podacima iz 1-way FISKAL p12 datoteke.</p>

<p>To znači da koristi privatni i javni ključ pošiljaoca koji su u p12 datoteci za enkr/dekr pdf-a a u pdf stavi samo javni ključ - znači primalac može samo čitati a ne i enkriptirati pdf.</p>

<p>Aplikacijski i serverski pošiljaočevi finini demo certifikati oblika .p12 (isto kao .pfx,  PKCS12) - bilo koji od njih prijavljen u pdfcreator  može potpisati pdf-ove zato jer .p12 format sadrži i privatni i  javni ključ i sve podatke za potpis (fiskal.exe vadi stringove potrebne za potpis iz p12 ukrcanog u widows spremište a isto to radi i pdfcreator). Poslali su nam FISKAL 1 a ne 2 !?</p>

<p><b>Digitalni potpis</b> : to je string koji se formira ovako : enkriptirani hash nekih podataka u p2 datoteci=certifikatu - to sam napravio php-om doma za 1way fiskalizaciju a varaždinci isto a uz to i za 2-way vezu - dakle ako pdfcreator ne uspije apl. ili serverskim certifikatom potpisati pdf kao što to uspjeva sa FISKAL certifikatom onda varaždinci trebaju primjeniti 2way kod za potpisivanje XML-a eife i komunikaciju sa fininim web servisom za eife. Taj potpis mogu ubaciti u pdf ako znaju programski kreirati pdf (ja znam u php.u).</p>

<p>Za <b>mapiranje cer u oblaku na lokalni disk</b> nisam našao ništa na fininim stranicama. Mogućnost konvertiranja .cer iz oblaka u .p12 pomoću apl i serverskog certifikata nam neće trebati ako radi 1. ali to je zapravo isto kao 1. sa manje šansi da će raditi</p>

<p>FISKAL p12 datoteka=certifikat (isto za banke) je za <b>1way</b> vezu : pošiljalac zahtjeva_kojeg_treba_potpisati 
koji sadrži podatke pošiljaoca&nbsp; -&gt; primalac, takva veza traži od pošiljaoca (koji ima apl certifikat za potpisivanje = FISKAL koji sadrži podatke 
primaoca) da provjerava certifikat primaoca (Kod SSL veze primalac najčešće 
nema pojma tko ga sve čita). </p>


        </div>
      </div>







    </div>
  </section>

  <!-- NEWSLETTER SECTION -->
  <section id="newsletter" class="text-center p-5 bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="col">
          <h1>Signup For Our Newsletter</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis magnam similique esse assumenda quasi repellendus illum perferendis quos aliquid possimus.</p>
          <form class="form-inline justify-content-center">
            <label class="sr-only" for="name">Name</label>
            <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" placeholder="Enter Name">

            <label class="sr-only" for="email">Email</label>
            <input type="email" class="form-control mb-2 mr-sm-2 mb-sm-0" placeholder="Enter Email">
            <button class="btn btn-primary" type="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <footer id="main-footer" class="text-center p-4">
    <div class="container">
      <div class="row">
        <div class="col">
          <p>Copyright 2017 &copy; Module about art</p>
        </div>
      </div>
    </div>
  </footer>


  <!-- VIDEO MODAL -->
  <div class="modal fade" id="videoModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <button class="close" data-dismiss="modal"><span>&times;</span></button>
          <iframe src="" height="350" width="100%" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>

<?php ftr_pge($module_arr, 'jquery.min.js', '/'.$module_arr['module_relpath'].'/navbar-fixed.js'); ?>
  
  <!--script src="../js/slick.js"></script-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.js"></script>
  <script src="main.js"></script>


</body></html>
