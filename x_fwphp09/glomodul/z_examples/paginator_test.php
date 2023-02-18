<?php
// http://dev1:8083/fwphp/glomodul/z_examples/paginator_caller.php

// http://dev1:8083/fwphp/glomodul/z_examples/paginator_caller.php?p=3
//    outputs: /fwphp/glomodul/z_examples/paginator_caller.php

require_once('Paginator.php') ;

$pgn = new Paginator($rows_found=50, $per_page=10) ;

echo 'Caller script path relative to webserver root dir ='. $pgn->get_rel_request_url() ;
//    outputs: /fwphp/glomodul/z_examples/paginator_caller.php

echo '<br />'. $pgn->get_offset_and_limit() ;

echo '</pre>'; print_r( $pgn->get_pagination_links() ) ; echo '</pre>';
