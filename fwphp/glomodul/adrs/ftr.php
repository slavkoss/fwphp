<!-- J:\awww\www\fwphp\glomodul\adrs\ftr.php -->
    <div class="footer">
        <a href="https://github.com/panique/mini3">MINI3 on GitHub</a>.
        If you like the project, support it by <a href="http://tracking.rackspace.com/SH1ES">using Rackspace</a> as your hoster [affiliate link].
    </div>

    <!-- j Q u e r y, loaded in the recommended protocol-less way 
    //code.j q uery.com/j query-1.11.1.min.js -->
    <!-- more http://www.paulirish.com/2010/the-protocol-relative-url/ -->
    <script src="/zinc/themes/bootstrap/js/jquery.min.js"></script>

    <!-- 
      define project's U R L 
      (to make AJAX calls possible, even when using this in sub-folders etc) 
      src="http://dev1:8083/fwphp/glomodul/adrs/module.js"
    -->
    <script>
        var MODULE_URL = "<?=$pp1->module_url?>";
    </script>

    <script src="<?=$pp1->shares_url?>util.js" type="text/javascript"></script>

    <!-- our JavaScript -->
    <script src="<?=$pp1->module_url?>module.js"></script>


</body>
</html>
