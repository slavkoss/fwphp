<?php
  /**
   * Example file
   */
  $paramNames = array('name', 'email', 'phone');
  $paramValues = array('Rochak Chauhan', 'rochakchauhan@gmail.com', '100');

  require_once('Ajax.php');
  $ajax = new Ajax('displayResponse');
?>
  <script src="ajax.js" type="text/javascript"></script>
  <script type="text/javascript" language="JavaScript">
     createRequestObject('displayResponse');
  </script>
<?php
  // without parametes  $ajax->sendRequest('serverfile.php');
  $ajax->sendRequest('serverfile.php', $paramNames, $paramValues);
?>
<span id="displayResponse">No response...</span>