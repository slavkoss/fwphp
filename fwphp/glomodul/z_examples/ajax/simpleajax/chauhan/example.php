<?php
  /**
   * http://dev1:8083/fwphp/glomodul/z_examples/ajax/simpleajax/example.php?aa=11
   *   ?aa=11 is not working
   * Example file J:\awww\www\fwphp\glomodul\z_examples\ajax\simpleajax\example.php
   */
  $paramNames = array('name', 'email', 'phone');
  $paramValues = array('Rochak Chauhan', 'rochakchauhan@gmail.com', '100');

  require_once('Ajax.php');
  $ajax = new Ajax('displResp_spanid');
?>
  <script src="ajax.js" type="text/javascript"></script>

  <script type="text/javascript" language="JavaScript">
     createRequestObject('displResp_spanid');
  </script>

<?php
  // without parametes  $ajax->sendRequest('serverfile.php');
  $ajax->sendRequest('serverfile.php', $paramNames, $paramValues);
?>
<span id="displResp_spanid">No response...</span>