<!-- J:\awww\www\fwphp\glomodul\z_examples\MVC_FW\hcstudio_easy\app\views\site\i ndex.php -->
<section>

    <div class="container">

      <?= $controller->getMessage() ?>

      <h1 class="title">Easy PHP Framework</h1>

      <p>
        Another simple PHP framework for education purpose! 
      </p>

      <p>
        Seems simple (is to simple, not enough for learnig !) but is (much) more complicated than B12phpfw code skeleton which seems complicated because has much more FUNCTIONALITY and better APPROACH (each module in own folder like Oracle Forms fmb-s, not three M, V, C folders for all modules, shares - globals - commons...) ! 
      </p>

      <p>
        Routing and Middleware are more complicated than in B12phpfw. Middleware in B12phpfw is called in module`s controller`s method and in module`s DB adapter code. This is in my opinion enough. Middleware class like here is overkill, not needed complication.
      </p>


      <h3>Middleware in web applications</h3>

      <p>
      Middleware in web applications is the mid-layer between the HTTP request and the application logic. 
      The middleware process incoming requests and execute the code BEFORE THE CONTROLLER'S ACTIONS...
      Frequently the middleware layer has multiply middlewares in the chain and they run one after another.
      </p>
      <p>
      Middleware is the term used for the components that are combined to form the request pipeline.
      This pipeline is arranged like a chain. The request is either returned by the middleware or passed 
      to the next one until a response is sent back.
      </p>

      <ol>

      <li>PRE-ACTION is BEFORE MIDDLEWARE, is run against the request before the execution of the actual 
         action it requests (duh). Examples of this could be CHECKING (testing, verifying, audit, authentication) 
           - if the user is authenticated (prijava) and authorized (prava)
           - if the CSRF token sent with the request is valid etc.
      </li>

      <li>After PRE-ACTION, ACTUAL ACTION runs - get array of users from DB to send to client. 
      </li>

      <li>Before the response reaches the client we want to do some POST-ACTION work on it.
         This is AFTER MIDDLEWARE. Examples could be deleting temp files, adding CORS headers, adding cookies,
         or caching the result. If we implemented caching after middleware, we could then implement some 
         before middleware to check for a cached version of the resource before actually getting it from database.
         </li>

      </ol>





    </div>


</section>
<?php
//$controller->js_header = "
  // your header js code here
//";
?>