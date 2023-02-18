<!-- J:\awww\www\fwphp\glomodul\adrs\home.php -->
<div class="container">
    <h1>Homepage</h1>

    <p>You are in View: <?=__FILE__?></p>

    <p>$pp1->module_relpath below site root = <?=$pp1->module_relpath?></p>
    <p>$pp1->module_url=<?=$pp1->module_url?></p>
    
    <p>B12phpfw is diffrent from other (PHP) frameworks (menu and CRUD code skeletons) :</p>
    <ol>
    <li>Each module (is like Oracle Forms .fmb) is in own folder, not all modules in 3 dirs: M, V, C.
      <br>So J:\awww\www\fwphp\glomodul\adrs\~~~~~ MINI3 ADRS ~~~~~.NPPSES
      <br>contains scripts in only one adrs module folder : adrs.
      <br>Global scripts are in : J:\awww\www\vendor\b12phpfw\ folder.
    </p>
    <li>Namespaces are FUNCTIONAL, not POSITIONAL (not dir tree).
        <br>Eg namespace B12phpfw\site_home\www ; or namespace B12phpfw\module\adrs ; 
        <br>- B12phpfw\module is FUNCTIONAL part of namespace  - we may write here whatever we wish what script does
        <br>- adrs is folder in which script is (J:\awww\www\fwphp\glomodul\adrs\Home_ctr.php,  http://dev1:8083/fwphp/glomodul/adrs/)
    </ol>
    </p>


    <p>Site logo (if you wish) : in CSS background: url('data:image/png;base64,iVBORw0KGgoAA...QmCC');</p>
</div>
