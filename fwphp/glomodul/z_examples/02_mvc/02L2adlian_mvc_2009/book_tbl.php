<html>
<head></head>

<body>

  <table>
    <tbody><tr><td>Title</td><td>Author</td><td>Description</td></tr></tbody>
    <?php
        foreach ($books as $title => $book)
        {
          echo '<tr><td><a href="?book='.$book->title.'">'.$book->title.'</a></td><td>'.$book->author.'</td><td>'.$book->description.'</td></tr>';
        }
    ?>
  </table>

<!--
index.php?book=
 formating data received from model
data can come in different formats from M :
  simple objects( sometimes called Value Objects), xml structures, json, …

V should not be confused to the template mechanism. Sometimes they work in the same manner and address similar issues.

For example operation “display account” will be associated to a “display account” view. The view layer can use a template system to render the html pages. The template mechanism can reuse specific parts of the page: header, menus, footer, lists and tables, …. Speaking in the context of the MVC pattern
-->
</body>
</html>