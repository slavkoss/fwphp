<!-- // Display export settings form -->
<table class="selectform">
<tr>
   <td align="left">
      Export format:
      <?php $i = 0; foreach ($exportformats as $value => $config) { $i++; ?>
      <label><input type="radio" name="export[format]"
          value="<?php echo $value; ?>"
          <?php echo ($value ==
              $_SESSION['states']->exportformat ? 'checked="checked" ' : '');
          ?>/>
              <?php echo htmlspecialchars($config[ 0 ]); ?>
      </label>
      <?php } ?>
   </td>
</tr>
<tr>
   <td align="left">
      Record limit:
      <select name="export[limit]" 
              title="Select the maximum number of rows to be exported">
         <option value="100" selected="selected">100</option>
         <option value="1000">1000</option>
         <option value="0">Unlimited (Are you sure?)</option>
      </select>
   </td>
</tr>
<tr>
   <td align="left">
      <input type="submit" name="export[doit]" value="Export now" accesskey="n" 
             title="Click here to download the export file now [n]" />
      <input type="button" value="Cancel"
      accesskey="c" onClick=
    "location.href='<?php echo $_SERVER[ 'PHP_SELF' ] . '?sid=' . '$sid'; ?>'"
        title="Click here to go back, cancel exporting [c]" />
      <?php echo htmlspecialchars($export_errormsg); ?>
   </td>
</tr>
</table>

<?php
