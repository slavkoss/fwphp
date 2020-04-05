<html><head>
<title>{$title}</title>
{literal}
<style>
h1 {
    font-family: sans-serif;
    font-size: 20px;
}
h4 {
    font-family: sans-serif;
    font-size: 12px;
}
.content {
    font-family: sans-serif;
    font-size: 12px;
}
</style>
<script>
function show_cform() {
    o = document.getElementById("comment_form");
    if (o) { o.style.display = ""; }
    o = document.getElementById("comment_link");
    if (o) { o.style.display = "none"; }
}
</script>
{/literal}
</head>
<body>
<span class="content">
<a href="blog_index.php">my blog</a>
<h1>{$title}</h1>
{$date}
<p>
{$content}
</p>
Category: {$category}<br />
<br />
<h4>Comments</h4>

{section name=i loop=$comments}
  <b>{$comments[i].name}</b> ({$comments[i].time})<br />
  {$comments[i].comment}
  <br /><br />
{/section}

<div id="comment_link">
  <a href="javascript:show_cform();">Add a Comment</a>
</div>
<div id="comment_form" style="display: none;">
<form method="post" action="blog_comment.php">
<input type="hidden" name="ID" value="{$id}">
Your name:<br />
<input name="name" type="text" />
<br /><br />
Comment:<br />
<textarea name="comment" rows="8" cols="40"></textarea>
<br />
<input type="submit" value="Post comment">
</form>
</div>
</span>
</body>
</html>
