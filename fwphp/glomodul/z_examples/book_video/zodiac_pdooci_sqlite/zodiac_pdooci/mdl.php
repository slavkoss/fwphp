<?php
function build_query($db, $key_field, $fields, $table) {
    $values = array();
    if (! empty($_POST[$key_field])) {
        $update_fields = array();
        foreach ($fields as $field) {
            $update_fields[] = "$field = ?";
            // Assume data is coming from a form
            $values[] = $_POST[$field];
        }
        // Add the key field's value to the $values array
        $values[] = $_POST[$key_field];
        $st = $db->prepare("UPDATE $table SET " .
                   implode(',', $update_fields) .
                   "WHERE $key_field = ?");
    } else {
        // Start values off with a unique ID
        // If your DB is set to generate this value, use NULL instead
        $values[] = md5(uniqid());
        $placeholders = array('?');
        foreach ($fields as $field) {
            // One placeholder per field
            $placeholders[] = '?';
            // Assume the data is coming from a form
            $values[] = $_POST[$field];
        }
        $st = $db->prepare(
           "INSERT INTO $table ($key_field," .
              implode(',',$fields) . ') VALUES ('.
              implode(',',$placeholders) .')');
    }
    $st->execute($values);
    return $st;
}

function print_link($inactive,$text,$offset='') {
    if ($inactive) {
        print "<span class='inactive'>$text</span>";
    } else {
        print "<span class='active'>".
              "<a href='" . htmlentities($_SERVER['PHP_SELF']) .
              "?offset=$offset'>$text</a></span>";
    }
}

function indexed_links($total,$offset,$per_page) {
    $separator = ' | ';
    // 
    print_link($offset == 1, '<< Preth', max(1, $offset - $per_page));
    // print all groupings except last one
    for ($start = 1, $end = $per_page;
         $end < $total;
         $start += $per_page, $end += $per_page) {
             print $separator;
             print_link($offset == $start, "$start-$end", $start);
    }
    /* print the last grouping -
     * at this point, $start points to the element at the beginning
     * of the last grouping
     */
    /* the text should only contain a range if there's more than
     * one element on the last page. For example, the last grouping
     * of 11 elements with 5 per page should just say "11", not "11-11"
     */
    $end = ($total > $start) ? "-$total" : '';
    print $separator;
    print_link($offset == $start, "$start$end", $start);
    // 
    print $separator;
    print_link($offset == $start, 'Sljed >>',$offset + $per_page);
}