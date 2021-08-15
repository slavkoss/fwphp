<html><head>
<title>{$title}</title>
{literal}
<style>
table.entries {
    font-size: 12px;
}
table.entries td {
    padding-bottom: 7px;
}
.headline {
    font-size: 14px;
    font-weight: bold;
}
</style>
{/literal}
</head>
<body>
<a href="blog_index.php">my blog</a>
{if $category}
    <br />
    Category: {$category}
{/if}
<br />
<table class="entries">
{section name=i loop=$blog_items}
<tr><td>
  <span class="headline">
   <a href="blog_display.php?ID={$blog_items[i].ID}">{$blog_items[i].title}</a>
  </span>
  <br />
  {$blog_items[i].date}<br />
  {$blog_items[i].teaser}<br />
  Category: <a href="blog_index.php?category={$blog_items[i].category_parm}">
	       {$blog_items[i].category}
	    </a>
</td></tr>
{/section}
</table>
</body>
</html>
