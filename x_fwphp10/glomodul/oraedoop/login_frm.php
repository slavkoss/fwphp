<!--
  J:\awww\www\fwphp\glomodul\z_examples\oraedoop\login_frm.php
  PAGE 1 : 26.  l o g i n . f o r m  - p rijava na bazu   page 1 head : 
-->
<table class="headerline">
<!--table class="layout"-->
   <tr>
      <td colspan="2"><span class="logo"></span>
        <h3>Pregled/promjene Oracle DB tablica</h3>
      </td>
   </tr>
</table>

<?php

//if ($requirements_ok) //see i ndex.php    $_SERVER[ 'PHP_SELF' ]
//{ ?>
  <!-- // page 1 Login f orm : -->
  <form name="login_frm" method="post" action="<?=$this->pp1->login?>">
    <input type="hidden" name="sid" value="<?php echo '$sid'; ?>" />
    <!--table class="selectform"-->
    <table class="layout">
    <tr>
      <td style="width: 30%;">Korisnik hr (dvoklik za izbornik): </td>
      <td><input type="text" name="cncts[username]"
                 value="<?php 
                    $tmp = isset($_SESSION['cncts']->username)?:'hr';
                    echo htmlspecialchars($tmp);
                 ?>"
                 title="Unesite Oracle korisnièko ime" />
      </td>
      <script type="text/javascript">
        document.forms[ 'form1' ].elements[ 'cncts[usernsme]' ].focus(); //pazi!!!
      </script>
    </tr>

    <tr>
      <td style="width: 30%;">Lozinka hr : </td>
      <td>
        <input type="password" name="cncts[password]"
               value="hr" title="" /></td>
    </tr>
    <tr>
      <td style="width: 30%;">Servis //SSPC2/XE or //localhost/XE (neobavezan podatak): </td>
      <td><input type="text" name="cncts[service]"
                 value="<?php 
                    $tmp = isset($_SESSION['cncts']->service)?:'//SSPC2/XE';
                    echo htmlspecialchars($tmp);
                 ?>"
                 title="prazno za lokalnu DB ili tnsnames.ora identifikator" /></td>
    </tr>
    <tr>
      <td align="left">  <!-- colspan="2" -->
                <input type="submit"
                 value="Prijava za rad sa Oracle tablicama korisnika"
                 accesskey="c"
                 title="Klik za prijavu [c]" />
      </td>
      <td></td>
    </tr>
    </table>
  </form>
  <?php

//}