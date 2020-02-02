<?php
$wsroot_url = ( (isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://' )
        // 2. URL_DOM AIN = dev1:8083 :
      . filter_var( $_SERVER['HTTP_HOST'] . '/', FILTER_SANITIZE_URL ) ;

$imgrelpath = '/zinc/img/img_big/oop_help/';
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8" />

  <title>OOP tutorial B12phpfwdoc</title>

  <link rel="stylesheet" href="<?=$wsroot_url?>zinc/img_gallery_flex.css" />
  <link rel="stylesheet" href="<?=$wsroot_url?>zinc/exp_collapse.css">
  <style></style>

</head>


<body>
<main>

<article id="content">

<h2>01 OOP PHP PDO course</h2>
OOP means Object Oriented Programming, PDO means PHP Data Objects data base interface code

<h3>Content and WHAT (course overview) - theme 001 of 131...</h3>
<?php displ_breadcrumbs('content');?>




<table>
<thead><tr><th>Themes group<th>Theme<th>Explanation, subtheme</thead>

<tbody>
<tr><td colspan="3"><b>1. Basics themes 002-037</b>

<tr><td>02 <a href="#intro">Introduction</a> <td>002<td> OOP plusses and minuses, Procedural code 

<tr><td>03 <a href="#basics">Basics</a> of OOP<td>003_012<td>003 OOPClasses and objects - different color, kitchen_appliances. 004 Properties And Methods. 005,006,008,009,010 Creating, Reading (accessing), Upd, Del cls,obj,prop,method 007 print_r, var_dump whole obj

<tr><td>04 <a href="#visibility">Visibility</a><td>013_014<td>acess <b>cls member (prop, method)</b>: public is default, protected, private

<tr><td>05 Class <a href="#class_constants">Constants</a><td>015_016<td> for configuration option, various sizes... Outside class we access class constant (and static property) so: Clsname::CNSTNAME, inside class self::CNSTNAME

<tr><td>06 <a href="#data_encapsulation">Data Encapsulation</a><td>017_018<td>If everyone is using your class with public properties, and one day you suddenly make properties private and switch to <b>public getters, setters</b> to refactor code which deals with properties - so you break everyones code which can not access private prop. or/and did this what now do getter, setter.







<tr><td>
<b>07 Inheritance</b>
<br /><br />07.1 <a href="#inheritance">Inheritance (ISA rel. subcls-supercls)</a><td>019_023<td>We're saved from <b>re-typing</b> in Home_ctr class (IS A Config_allsites) all of code in parent classes :  Config_allsites (IS A Db_allsites), Db_allsites (IS A Dbconn_allsites) and Dbconn_allsites. 

<b>Record types</b> are eg Vehicle class child clses TransportationVehicle and PassengerVehicle below . 

<br />HASA rel. subcls-supercls is not inheritance but <b>composition</b> (object contains another object) eg sink should be a property in kitchen class and sink itself can be a class because it has some properties and methods. 

<tr><td>07.2 <a href="#overriding">Overriding</a><td>024_026<td>
Bike : its accelerate and break behavior is different from car, truck and van.

<tr><td>07.3 <a href="#final_keyword">Final </a>keyword<td> 027_028<td>
Blocking classs Inheritance and method Overrides with final keyword.

<tr><td>07.4 <a href="#abstract">Abstract</a> class and method<td>029_030<td>
Abstract eg vehicle object : is it van or truck or car or bike or... ? No sense to create an object of <b>record type class (sifrarnik vrste prema bitnoj osobini - kategorija)</b>. We use them for inheritance to avoid code redundancy.

<tr><td>07.5 <a href="#interfaces">Interface</a><td>031_033<td>
Commands us what method names and parameters we must have - for team development. Also is way of communicating between two unlike objects which have some similar behaviour. Similar to an abstract class, that allows you to declare zero or more methods without providing implementation (method body). PHP is a single parent language ee CLASS CAN HAVE ONLY ONE PARENT CLASS. This relationship doesn't exist with interfaces.







<tr><td>08 <a href="#constr_destr">Constructor and Destructor</a><td>034_037<td>

        <tr><td colspan="3">&nbsp;
<tr><td colspan="3"><b>2. Static, magic, error, autoload themes 038_083</b>
<tr><td>09 <a href="#static">Static</a> Properties And Methods<td>038_040

<tr><td>10 <a href="#magic">Magic</a> Methods<td>041_047

<tr><td>11 <a href="#errors">Errors</a> and exceptions in PHP<td>048_075

<tr><td>12 <a href="#autoloading">Autoloading</a><td> 076_083

         <tr><td colspan="3">&nbsp;
<tr><td colspan="3"><b>3. Serializ, cloning, hinting, comparing, overload themes 084-0112</b>
<tr><td>13 Object <a href="#serialization">Serialization</a><td> 084_087

<tr><td>14 Object <a href="#cloning">Cloning</a><td> 088_094

<tr><td>15 Type <a href="#hinting">Hinting</a><td> 095_106

<tr><td>16 <a href="#comparing">Comparing</a> Objects<td> 107_108

<tr><td>17 <a href="#overloading">Overloading</a><td> 109_112

        <tr><td colspan="3">&nbsp;
<tr><td colspan="3"><b>4. Traits, binding, iteration themes 113-131</b>
<tr><td>18 <a href="#traits">Traits</a><td> 113_121

<tr><td>19 Late Static <a href="#binding">Binding</a><td> 122_125

<tr><td>20 Object <a href="#iteration">Iteration</a><td> 126_131


</tbody>
</table>
</article>


  <!--
  http://localhost:8083/v_book/oop_code/011Dress1.php
  http://localhost:8083/fwphp/glomodul/lsweb/Lsweb.php/?cmd=J:/xampp/htdocs/v_book/oop_help

  font-family: arial, tahoma !important; 
  "Myriad Pro", Myriad, "Liberation Sans", "Nimbus Sans L", "Helvetica"
   Neue" !important;
  "ubuntu mono", monospace 
  -->