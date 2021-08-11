<?php
// J:\awww\apl\dev1\z30GB\04knjige\02popel\ch7books_in_out\exp_B2_xml.php
/**
* Page lists all the books we have as an XML data structure
*/
                  //include('common.inc.php');
// Set the content type to be XML
header('Content-Type: application/xml');
// Get the books list
$books = Model::getDetailsWithMasters();


// Echo XML declaration and open root element
echo '<?xml version="1.0"?>', "\n";

echo "<books>\n";
    // ITERATE OVER EVERY BOOK AND DISPLAY IT
    while($b = $books->fetch())
    {
    ?>
        <book id="<?=$b->id?>">
        <isbn><?=$b->isbn?></isbn>
        <title><?=htmlspecialchars($b->title)?></title>
        <publisher><?=htmlspecialchars($b->publisher)?></publisher>
        <summary><?=htmlspecialchars($b->summary)?></summary>
        <author>
        <id><?=$b->author?></id>
        <lastName><?=$b->lastName?></lastName>
        <firstName><?=$b->firstName?></firstName>
        </author>
        </book>
    <?php
    }
echo '</books>';
?>