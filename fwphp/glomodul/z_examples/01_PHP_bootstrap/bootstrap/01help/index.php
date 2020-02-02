<?php
/*<!--
  J:\awww\www\fwphp\glomodul4\help_sw\test\bootstrap\
  http://dev1:8083/fwphp/glomodul4/help_sw/test/bootstrap/
--> */

require $wsroot_path.$path_rel_examples .'01_PHP_bootstrap/bootstrap/inc_adresses.php' ;
//require '../inc_adresses.php' ;
require $wsroot_path.$path_rel_examples .'01_PHP_bootstrap/bootstrap/inc_hdr_ftr.php' ;
//require '../inc_hdr_ftr.php' ;
hdr_pge($module_arr, 'Bootstrap4', '/'.$module_arr['module_relpath'].'/01help/style.css');
?>

    <!-- 1. N A V I G A T I O N  B A R -->
    <!--nav class="navbar navbar-dark bg-dark navbar-expand-sm sticky-top"-->
    <nav class="navbar navbar-light bg-light navbar-expand-sm sticky-top">
        <div class="container">
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" 
              data-target="#topnav"><span class="navbar-toggler-icon"></span></button>
            
            <div class="collapse navbar-collapse" id="topnav">
                <ul class="nav navbar-nav ml-auto">
                    <li><a href="#home" class="nav-link">Home</a></li>
                    <li><a href="#about" class="nav-link">About</a></li>
                    <li><a href="#products" class="nav-link">Data flow</a></li>
                    <li><a href="#contact" class="nav-link">Contact</a></li>
                </ul>
            </div>
            
        </div>
    </nav>
    
    <!-- 2. H E A D E R  S E C T I O N = basic intro to page -->
    <header class="section">
        <div class="container">
            <div class="jumbotron">
                <h1>MVC and Bootstrap 4 (basic intro to page)</h1>
                
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis,</p>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis,</p>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis,</p>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis,</p>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis,</p>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis,</p>
                
                <p><a href="#about" class="btn btn-primary">Learn more</a></p>
            </div>
        </div>
    </header>
    
    
    <section class="section" id="home">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="h2">MVC (MVWathever) CRUD data flow</div>
                    <h5>in "Msg share" module J:\awww\www\fwphp\glomodul4\msg_share\index.php (users messages or events)</h5>
                    
                    <p>(1) Module controller classs Home_C (which extends abstract class Controller) instantiates $viewmodel = new Home_M(); and displays view page so:
                    <br />$this-&gt;includeView($viewmodel->Index()); //param is dbrows or only return;
                    </p>
                    
                    <p>So this is really M-&gt;C-&gt;V data flow, but controller does not know about model data (view knows). LINK TO CONTROLLER CLASS METHOD IN VIEW has info which model method to call, so CONTROLLER is only glue (whatever) for V and M.</p>

                    <p>(2) View page eg J:\awww\www\fwphp\glomodul4\event\eventpge_lst.php has LINK TO Event_C CONTROLLER CLASS (event), METHOD (add) :
                    <br />href="&lt;?=$module_url.QS?&gt;event/add"&gt;Share URL (Create row).
                    <br />where  $module_url = $this->module_arr['module_url'] ; 
                    </p>
                    
                    <p>(3) Read table : PAGINATED RECORD BLOCK STRING CREATED BY TABLE MODEL CLASS METHOD eg get_paginated_block() called by ... and puts it in template variable not knowing what get_paginated_block() does.</p>

                </div>
                <!--div class="col"> <img src="http://via.placeholder.com/1050x650" class="img-fluid"> </div-->
                <div class="col"> <br /><img src="<?=$module_arr['wsroot_url']?>zinc/img/mvc_Laravel.jpg" class="img-fluid"> 
                    <p>We also can use <b>view class</b> to call model class method, which is same thing and is "pure" M-&gt;V data flow (I tested this but do not use it). It seems to me that view class is overkill (till somebody prove oposite). View scripts are simple regarding data & code flow.</p>
                    
                    <p>See image #2 below.</p>
                </div>
                
            </div>
        </div>
    </section>
    
    
    <section class="section" id="about">
        <div class="container">
            
            <div class="row">
            
                <div class="col bg-primary">
                   <div class="h2">About MVC</div>
                    <p>See image #2 below and MVC (MVWathever) CRUD data flow above.</p>
                </div>

                <div class="col bg-success"> 
                <div class="h3">MVC M-&gt;V data flow</div>
                <!--img src="http://via.placeholder.com/250x150" class="img-fluid rounded float-left img-thumbnail m-1"-->
                <img src="<?=$module_arr['wsroot_url']?>zinc/img/MVC_M_V.jpg" class="img-fluid rounded float-left img-thumbnail m-1">
                See also background image. 
                </div>

                <div class="col bg-danger">
                    <div class="h2">About BootStrap</div>
                    <ul class="list-group">
                        <li class="list-group-item">NavBar</li>
                        <li class="list-group-item">Responsive Image</li>
                        <li class="list-group-item">BootStrap Grid</li>
                        <li class="list-group-item">BootStrap Buttons</li>
                    </ul>
                </div>


            </div>
            
            
            <div class="row">
                <div class="col">
                    <p>This is footer text of section about. Multiple view submodules for different display environments are not needed with BootStrap  - see background image.</p>
                </div>
            </div>
        </div>
    </section>
    
    
    
    <section class="section" id="products">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="card">
                        <!--div class="card-header">Featured</div> <img class="card-img-top" src="http://via.placeholder.com/650x350/FF0000/FFFFFF/?text=Image+1"-->
                        <div class="card-header">Featured</div> <img class="card-img-top" 
                             src="<?=$module_arr['wsroot_url']?>zinc/img/mvc_M_V.jpg">
                        <div class="card-body">
                            <div class="card-title">MVC M-&gt;V data flow</div>
                            <div class="card-text">M-&gt;V data flow is original idea.</div> <a href="#" class="btn btn-primary">Buy #1</a> </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card">
                        <div class="card-header">Featured</div> <img class="card-img-top" src="<?=$module_arr['wsroot_url']?>zinc/img/mvc_Laravel2.jpg">
                        <div class="card-body">
                            <div class="card-title">MVC M-&gt;C-&gt;V data flow</div>
                            <div class="card-text">Some believe M-&gt;C-&gt;V data flow is much better than M-&gt;V data flow, I think it is same thing, important is to achieve <b>simplest, fastest code and controller should not know about data</b>, it shoud join (glue) M and V. Consequence is : M is largest and most complicated MVC part, C is smallest and simplest, V is simple but large routine programming. V sends its command to M through C or directly.</div> <a href="#" class="btn btn-primary">Buy #2</a> </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card">
                        <div class="card-header">Featured</div> <img class="card-img-top" src="http://via.placeholder.com/650x350/00FF00/FFFFFF/?text=Image+3">
                        <div class="card-body">
                            <div class="card-title">Product #3</div>
                            <div class="card-text">Amet, consectetuer adipiscing.</div> <a href="#" class="btn btn-primary">Buy #3</a> </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card">
                        <div class="card-header">Featured</div> <img class="card-img-top" src="http://via.placeholder.com/650x350/00FFFF/FFFFFF/?text=Image+4">
                        <div class="card-body">
                            <div class="card-title">Product #4</div>
                            <div class="card-text">Amet, consectetuer adipiscing.</div> <a href="#" class="btn btn-primary">Buy #4</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
    
    <section class="section" id="contact">
        <div class="container">
            <form>
                <div class="form-group row">
                    <label for="fullName" class="col-sm-2 col-form-label">Full Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="fullName" placeholder="Full Name"> </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" placeholder="Email"> </div>
                </div>
                <div class="form-group row">
                    <label for="message" class="col-sm-2 col-form-label">Message</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="message" rows="5"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>
    </section>
    <footer class="bg-dark ">
        <div class="container">
            <div class="text-center text-light p-3">Copyright (c) Company contact address .... </div>
        </div>
    </footer>

    
    
    <!--script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script-->
    <!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script-->
    
    <!--NOT WORKING script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script-->
    <!--script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script-->
    
    <!--NOT WORKING script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script-->

<?php ftr_pge($module_arr, 'jquery.min.js', '/'.$module_arr['module_relpath'].'/navbar-fixed.js'); ?>

    <script>
        $('.nav li a').on('click', function (event) {
            event.preventDefault();
            var target = $(this).attr('href');
            var offsetTop = $(target).offset().top;
            $('html, body').animate({
                scrollTop: offsetTop
            }, 1000);
        })
    </script>


</body></html>