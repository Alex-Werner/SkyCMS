<?php
$db = new SK_Persist();
$t = $db->GetData("sk_pages","id,page_title,content,url");
$html = "";
foreach($t as $val)
{

$html.="<tr>";
$html.="<td>".$val->id."</td>";
$html.="<td>".$val->page_title."</td>";
$html.="<td>".$val->url."</td>";
$html.="<td><a href='".$val->id."'>Edit</a> | <a href='#' onclick=\"if(confirm('Sure?')){deletePage(".$val->id.");}return false;\">Delete</a></td>";

$html.="</tr>";
}

?>

<h1>Posts</h1><a href="http://letraderbitcoin.wordpress.com/wp-admin/post-new.php" class="add-new-h2">Add New</a>
<table>
    <thead class="first">
    <td><input type="checkbox" /></td>
    <td>Title</td>
    <td>Author</td>
    <td>Categories</td>
    <td>Date</td>
    </thead>
    <?php echo $html; ?>

</table>