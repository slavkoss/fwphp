<!-- J:\awww\www\fwphp\glomodul\adrs\home.php -->

<head>
<style type="text/css">

</style>
</head>

<div class="container">
    <h1>Homepage</h1>

    <p>You are in View: <?=__FILE__?></p>
    
    <h3>Paths and URLs</h3>

    <p>This page URL is below Web server root path <?=$pp1->wsroot_path?> (=REQUEST_URI) :
      <b><?=$pp1->req_uri?></b>
    </p>

    <p>This is adrs module in same named folder (Oper. System adress) : <?=dirname(__FILE__)?></p>

   
  <table style="width: 100%">

  <tr>
    <td style="width: 426px">
    <pre>
              User (URL)


 U uses C                 1.U sees V


 Controller  controls V   View


 3.C manipulates&nbsp;M         2.M updates V


                   Model
     </pre>                              
  </td>

  <td>

    <h2>Principle of M-V data flow in CRUD module </h2>

    <p>1. USER SEES V in picture means : C assigns variables from URL (user request, ee from URL query after &quot;?&quot; ) telling V what user wants and calls V method or includes V or URL calls page (C controls V).</p>

    <p>2. M UPDATES V in picture means : V pulls data from M according C variables assigned in &quot;1. USER SEES V&quot;. </p>

    <p>3. C MANIPULATES M&nbsp;means : V (user request) may call C method for some state changes ordered in URL by user (USES&nbsp;in picture). Eg : table row update &quot;Approve user comment&quot; in msg module. User`s events are so handled in Controller class. View gets (singleton) or instantiates model object and pulls data from M. If we have user`s interactions (events) eg filter displayed rows (pagination is a type of filtering), than&nbsp;M-V data flow is only possible solution. </p>

  </td>
  </tr>
  </table>








    <h2>M-C-V data flow</h2>

    <p>Controller instantiates M and pushes M data to V. I do not see advantages compared to M-V data flow. </p>

    <p>Disadvantage is : for pagination M-V data flow is only possible solution, C is fat in large modules (lot of code). </p>

    <p>C in my msg (blog) module (M-V data flow ) has lot of code - routing, dispatching, but code is very simple.</p>

    <p>&nbsp;</p>
                    
    <p>&nbsp;</p>



    <h2>Flow of control and M-V data flow in 3tier DAO code (abstract interface)</h2>

    <p>
    <table>
    <tbody>
    <tr valign="top">

    <td>
    Step 1. <strong>Request</strong> is URL adress entered by user.
    <br><strong>Response</strong> is HTML from Home view.<br>
      </td>

      <td>Step 2.TIER 1 CV data flow is Presentation layer Controller and View<br>
      <strong>Config_allsites</strong>&nbsp;(utl, utilities)&nbsp;is reusable (<span lang="hr">includ-able</span>).<br>
      <br>
      <strong>Home_ctr</strong>&nbsp;class&nbsp;extends utl (<u>is utl = inheritance</u>) is &quot;ctrl+c,v reusable&quot;
      <br><br>
      <strong>Home</strong>&nbsp;is&nbsp;view&nbsp;class, is &quot;ctrl+c,v reusable&quot;.<br>
      </td>

      <td>Step 3.1 TIER 2 Model, Middle tier Business logic code layer.<br>
      <br>
      <strong>Tbl_crud</strong>&nbsp;is module&nbsp;DB&nbsp;adapter&nbsp;class, &quot;ctrl+c,v reusable DAO&quot;.
      <br><br>
      Tbl_crud <u>has, uses</u> Db_allsites or Db_allsites_ora or... <u>composition (over inheritance and over traits)</u>, dependency injection).
      </td>

      <td>Step 3.2 TIER 3 DAO Data Access layer<br>
      <strong>Db_allsites</strong>&nbsp;DB&nbsp;adapter&nbsp;class is&nbsp;shared, global&nbsp;<span lang="hr">on site level</span>, common,&nbsp;<span lang="hr">reusable (includ-able) Data Acess Object</span>.&nbsp;<span lang="hr">Implements</span><br>
      <strong>Db_allsites_Intf</strong>&nbsp;reusable&nbsp; (<span lang="hr">includ-able</span>) DAO.<br><br>
      01_DDL_mysql_blog.sql 01_DDL_oracle_blog.sql 01_DDL_moj_adrs_MINI3_mysql.sql <br>
      </td>
      </tr>
      </table>
      </p>






  <h3>How works R(ead) of cRud in B12phpfw (request and response)</h3>

  <ol>
  <li>Router code in Config_allsites __construct method called from Home_ctr returns to Home_ctr user's commands (interactivity) decoded from URL <b>request</b> (ee calls &quot;call_module_method&quot;).</li>
  
  <li>Home_ctr method &quot;call_module_method&quot; 
  dispatches request (URL parameters from URL query string after "?" sign) to other Home_ctr method 

  <li>other Home_ctr method calls own view method to read table rows using DAO's (two classes in Step 3.) and display table rows, ee <b>response</b> is HTML from Home view class.
  </ol>


  <p><b>DAO's</b> (two classes in Step 3.) : Tbl_crud and Db_allsites classes have same named CRUD methods cc, rr, uu, dd. Tbl_crud contains also business methods (business logic code is the largest and most complicated code, the only code which can not be standardized and implement interface - list of method names).</p>

  <p>Tbl_crud and Db_allsites classes are independent thanks to Db_allsites_Intf list of methods in Db_allsites class. Persistant storage object variable (in dependency injected property palete object $pp1) is parameter of Db_allsites CRUD methods. This means that cc, rr, uu, dd CRUD calls in Tbl_crud may access any persistant storage - MySQL, Oracle, OS texts...</p>

  <p>See&nbsp;&nbsp;<a href="https://github.com/nazonohito51/clean-architecture-sample" style="box-sizing: border-box; " target="_blank">https://github.com/nazonohito51/clean-architecture-sample</a>&nbsp; - good picture, but for me to complicated code.</p>

 <p><b>DAO's</b> (two classes in Step 3.) are adapters : implementations - classes or methods which depend on interfaces, not on each other (ee do not depend on other classes).
  </p>
  
  <p><b>Interfaces</b> are abstractions, functionalities, features, ports. Interfaces in PHP are like UML diagrams or Oracle PL/SQL package : lists of class methods. PHP class is like PL/SQL package body.
  </p>

  <p>DAO (Data Access Object) pattern (code skeleton pseudo code, uzorak, predložak) : separates a data resource's client interface (Tbl_crud) from its data access mechanisms (PDO in Db_allsites). 
  </p>
  
  <p>Ee DAO adapts a specific data resource's access API (PDO in Db_allsites) to a generic client interface (CRUD methods in Tbl_crud, not business methods which are to complicated, can not be generic, standardized !).
  </p>

  <p><b>CRUD program generators</b> (scaffolding or whatever they are called) are, in my opinion, unnecessary, sidetrack, almond operation from below because they cannot (and should not) generate Db_allsites nor Tbl_crud (business logic).</p>

  <p>&nbsp;</p>
  
  
  
  
  
  
  <h2>Links need globalization</h2>

  <p>Links in the addrs module are less transparent because they are not centralized - globalized -&gt; more difficult to maintain than the routing table (array) in Home_ctr in the msg (blog) module.</p>

 <p>Links show a lot about the code skeleton and about the programming technique. The following where links are, what they order to be done (not syntax) can be considered the standard for (web) programming. Syntax is specific for B12phpfw routing based on key-value pairs parameter_name-parameter_value. Eg : 
 <br>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; i/ex2/namep1/valparam1...&nbsp; (QS constant is &quot;?&quot;) <br>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Parameters &quot;i&quot; and &quot;namep1&quot; have values &quot;ex2&quot; and &quot;valparam1&quot;. The number of parameters is unlimited.<br>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; i means that ex2 (exsample 2) is method name in Home_ctr. Each module has only one controller (or more - not needed).</p>

 <ol>
 <li>In hdr.php eg &lt;a href=&quot;&lt;?=$pp1-&gt;module_url.QS?&gt;i/ex2/p1/param1/p2/param2/&quot;&gt;example2&lt;/a&gt;</li>
 <li>After delete row in Home_ctr : utl::Redirect_to($pp1-&gt;module_url.QS.'i/rrt/') 
    ; //to read_ tbl
    <br>
    Simmilar Redirect_to's&nbsp; in Tbl_crud in code &quot;behind&quot; user (Cre, Upd) interactions.
  </li>
 
  <li>
     In cre_row_frm.php call code &quot;behind&quot; : &lt;form action=&quot;&lt;?=$pp1-&gt;module_url.QS?&gt;i/cc/&quot; method=&quot;POST&quot;&gt;</li>
     <li>In read_tbl.php &lt;a href=&quot;&lt;?=$pp1-&gt;module_url.QS.'i/cc/'?&gt;&quot;&gt;Add row&lt;/a&gt;
     <br>
     &nbsp;&lt;td&gt;
     <br>
     &lt;a id=&quot;erase_row&quot; class=&quot;btn btn-danger&quot;<br>
     &nbsp;&nbsp;&nbsp; onclick=&quot;var yes ; yes = jsmsgyn('Erase row &lt;?=$id?&gt;?','') ;<br>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; if (yes == '1') { location.href= '&lt;?=$pp1-&gt;module_url.QS.'i/dd/t/song/id/'.$id?&gt;/'; }&quot;<br>
     &nbsp;&nbsp;&nbsp; title=&quot;Delete tbl row ID=&lt;?=$id?&gt;&quot;<br>
     &gt;&lt;b style=&quot;color: red&quot;&gt;Del&lt;/b&gt;<br>
     &lt;/a&gt;<br>
     &lt;/td&gt;<br>
     and<br>
     &lt;td&gt;&lt;a href=&quot;&lt;?=$pp1-&gt;module_url.QS.'i/uu/t/song/id/'.$id?&gt;&quot;&gt;Edit&lt;/a&gt;&lt;/td&gt;
  </li>
  <li>
    In&nbsp; upd_row_frm.php utl::Redirect_to($pp1-&gt;module_url.QS.'i/rrt/');<br>
    and&nbsp; &lt;form action=&quot;&lt;?=$pp1-&gt;module_url.QS?&gt;i/uu&quot; method=&quot;POST&quot;&gt;
  </li>
  <li>
    In&nbsp; Config_allsites.php public static function get_pgnnav($uriq, $rtbl = 0, $mtd_to_inc_view='/i/home/', $rblk=5)
  </li>
  <li>In&nbsp; Db_allsites (mysql) and Db_allsites (oracle) &nbsp;in method dd (delete row) :
    <br>
    &nbsp;if (isset($pp1-&gt;uriq-&gt;r)) {
    <br>
    self::Redirect_to(QS.'i/'. $pp1-&gt;uriq-&gt;r) ; <br>
                                        }
  </li>
  </ol>
  <p>&nbsp;</p>




   <h2>Why B12phpfw module dirs like Oracle Forms 6i fmb-s</h2>

   <p>For me framework&nbsp; (menu and CRUD code skeleton) is group of code snippets for ctrl+c, v.</p>

   <p>B12phpfw is diffrent from other (PHP) frameworks (menu and CRUD code skeletons) :</p>

  <ol>
  <li>Each module (is like Oracle Forms .fmb) is in own folder, 
    has&nbsp; one 
    controller (or 
    more - not 
    needed), not all modules in 3 dirs: M, V, C.
      <br>So my J:\awww\www\fwphp\glomodul\adrs\~~~~~ MINI3 ADRS ~~~~~.NPPSES
      <br>contains scripts in only one 
    adrs module folder : adrs.
      <br>Global scripts are in : J:\awww\www\vendor\b12phpfw\ folder. 
    Eg 
    J:\awww\www\vendor\b12phpfw\Autoload.php
  </li>
  <li>Namespaces are FUNCTIONAL, not POSITIONAL (not dir tree).
        <br>Eg namespace B12phpfw\site_home\www ; or namespace B12phpfw\module\adrs ; 
        <br>- B12phpfw\module is FUNCTIONAL part of namespace  - we may write here whatever we wish what script does
        <br>- adrs is folder in which script is (J:\awww\www\fwphp\glomodul\adrs\Home_ctr.php,  http://dev1:8083/fwphp/glomodul/adrs/)
  </li>
  <li>Many other reasons, see on GitHub <a href="https://github.com/slavkoss/fwphp">B12phpfw</a> and <a href="http://phporacle.eu5.net/fwphp/www/" target="_blank">demo</a> (especially flow of control and data).
  </li>
  </ol>
    



<p>&nbsp;</p><p>&nbsp;</p>
<p>
<a href="https://www.amitmerchant.com/reasons-use-composition-over-inheritance-php/">
https://www.amitmerchant.com/reasons-use-composition-over-inheritance-php/</a>
<br />
<a href="https://brainbell.com/php/composition-and-aggregation.html">
https://brainbell.com/php/composition-and-aggregation.html</a>
<br />
<a href="https://stackoverflow.com/questions/70780547/composition-vs-aggregation-in-php">
https://stackoverflow.com/questions/70780547/composition-vs-aggregation-in-php</a>
<br />
<a href="https://www.thepolyglotdeveloper.com/2018/09/inheritance-composition-php-application/">
https://www.thepolyglotdeveloper.com/2018/09/inheritance-composition-php-application/</a>
<br />
<a href="https://www.geeksforgeeks.org/multiple-inheritance-in-php/">
https://www.geeksforgeeks.org/multiple-inheritance-in-php/</a>
<br />
<a href="https://beamtic.com/dependency-injection-php">
https://beamtic.com/dependency-injection-php</a>
<br />
<a href="https://blog.devgenius.io/stop-using-extends-in-php-37c9da1cce83">
https://blog.devgenius.io/stop-using-extends-in-php-37c9da1cce83</a>
<br />
<a href="https://r.je/you-do-not-need-inheritance-oop">
https://r.je/you-do-not-need-inheritance-oop</a>
<br />
<a href="https://livebook.manning.com/book/php-in-action/chapter-5/64">
https://livebook.manning.com/book/php-in-action/chapter-5/64</a>
<br />
<a href="https://adriennedomingus.medium.com/oop-composition-inheritance-in-php-a54775be3374">
https://adriennedomingus.medium.com/oop-composition-inheritance-in-php-a54775be3374</a>
<br />
<a href="https://www.koderhq.com/tutorial/php/oop-composition/">
https://www.koderhq.com/tutorial/php/oop-composition/</a>
<br />
<a href="https://code.tutsplus.com/tutorials/basics-of-object-oriented-programming-in-php--cms-31910">
https://code.tutsplus.com/tutorials/basics-of-object-oriented-programming-in-php--cms-31910</a>
<br />
<a href="https://anastasionico.uk/blog/composition-over-inheritance-with-php-example">
https://anastasionico.uk/blog/composition-over-inheritance-with-php-example</a>
<br />
<a href="https://en.wikipedia.org/wiki/Composition_over_inheritance">
https://en.wikipedia.org/wiki/Composition_over_inheritance</a>
<br />
<a href="https://betterprogramming.pub/inheritance-vs-composition-2fa0cdd2f939">
https://betterprogramming.pub/inheritance-vs-composition-2fa0cdd2f939</a>
<br />
<a href="https://www.adservio.fr/post/composition-vs-inheritance">
https://www.adservio.fr/post/composition-vs-inheritance</a>
</p>
<p>
<a href="https://www.reddit.com/r/PHP/comments/ilsgt8/whats_your_current_opinion_on_traits/">
https://www.reddit.com/r/PHP/comments/ilsgt8/whats_your_current_opinion_on_traits/</a>
</p>
<p>
<a href="https://antonlytvynov.medium.com/php-immutable-objects-4b5e920dac2c">
https://antonlytvynov.medium.com/php-immutable-objects-4b5e920dac2c</a>
</p>


<p>
Site logo (if you wish) : in CSS background: url('data:image/png;base64,iVBORw0KGgoAA...QmCC');
<br><a href="https://www.base64-image.de/">https://www.base64-image.de/</a>
</p>



</div>
