<style>
    input{
        width: 100%;
    }
</style>
<?php
if(isset($_GET['k']))
{
    $db = new SK_Persist();
    $t = $db->GetFirstData("sk_pages","page_title,content","id='".$_GET['k']."'");
    $title = $t->page_title;
    $content = $t->content;
    ?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="/libs/ckeditor/ckeditor.js"></script>
    <script src="/libs/ckeditor/adapters/jquery.js"></script>
    <script>
        CKEDITOR.disableAutoInline = true;

        $( document ).ready( function() {
            $( '#editor' ).ckeditor(); // Use CKEDITOR.replace() if element is <textarea>.
        } );

        function setValue() {
            $( '#editor1' ).val( $( 'input#val' ).val() );
        }
    </script>
    <h1>Edit page</h1>
    <input type="text" name="title" id="title" value="<?php echo $title; ?>">
    <textarea cols="80" id="editor" name="editor" rows="10">
        <?php echo $content; ?>
    </textarea>
<?php
}
else
{
    $db = new SK_Persist();
    $t = $db->GetData("sk_menu","id,displayed_title,url");
    $html = "";
    foreach($t as $val)
    {

        $html.="<tr>";
        $html.="<td>".$val->id."</td>";
        $html.="<td>".$val->displayed_title."</td>";
        $html.="<td>".$val->url."</td>";
        $html.="<td><a href='".$val->id."'>Edit</a> | Del</td>";
        $html.="</tr>";
    }
    ?>
    <h1>Pages</h1>

    <p><button>Créer une page</button></p>
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
}
?>