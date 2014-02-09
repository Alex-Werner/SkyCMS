<?php
$db = new SK_Persist();
$t = $db->GetData("sk_modules","id,name,url,active");
$html = "";
foreach($t as $val)
{

$html.="<tr>";
    $html.="<td>".$val->id."</td>";
    $html.="<td>".$val->name."</td>";
    $html.="<td>".$val->url."</td>";
    if($val->active)
    {
        $html.="<td><a href='#' onclick=\"changeActiveStade(".$val->id.",0);return false;\">Desactivate</a></td>";

    }
    else
    {
        $html.="<td><a href='#' onclick=\"changeActiveStade(".$val->id.",1);return false;\">Activate</a></td>";

    }
  //  $html.="<td><a href='".$val->id."'>Edit</a> | <a href='#' onclick=\"if(confirm('Sure?')){deletePage(".$val->id.");}return false;\">Delete</a></td>";

    $html.="</tr>";
}
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    /**
     * If param = 0 desactivate, else activate
     * @param bool
     */
    function changeActiveStade(id,bool){
        $.post( "/modules/SK_Administrator/api/changeModuleState.php", { id:id, active: bool } )
            .done(function( data ) {
                location.reload();
            });
    }
</script>
<h1>Modules</h1>

<table>
    <thead class="first">
    <td>ID</td>
    <td>Title</td>
    <td>Url</td>
    <td>Actions</td>
    </thead>
    <?php echo $html; ?>

</table>
<?php