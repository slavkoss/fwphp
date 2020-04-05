<html><head>
<title>{$title}</title>
{literal}
<style>
h1 {
    font-family: sans-serif;
    font-size: 20px;
}
table.inputfields {
    font-family: sans-serif;
    font-size: 12px;
}
table.inputfields td {
    vertical-align: top;
}
</style>
{/literal}
</head>
<body>
<h1>New Blog Entry</h1>
<form method="post" action="blog_edit.php">
<table class="inputfields">
<tr> <td>Title:</td><td><input name="title" type="text" /></td> </tr>
<tr> <td>Body:</td>
     <td><textarea name="content" rows="15" cols="40"></textarea></td>
</tr>
<tr> <td>Category:</td><td><input name="category" type="text" /> </tr>
<tr> <td /><td><input name="submit" type="submit" value="Post" /></td> </tr>
</table>
</form>
</body>
</html>
