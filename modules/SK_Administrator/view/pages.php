<style>
    input{
        width: 100%;
    }
</style>
<?php
/* IF WE HAVE DEFINED A CONTEXT*/
if(isset($_GET['k']))
{
    $k = $_GET['k'];

    /* IF WE CREATE A NEW PAGE */
    if($k=="new")
    {
        ?>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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
            function savePage(){
                $.post( "/modules/SK_Administrator/api/savePage.php", { title:$('#title').val(), content:$('#editor').val(),url:$('#url').val() } )
                    .done(function( data ) {
                        alert( "Serveur answer :" + data );
                    });
            }
        </script>
        <h1>Create a new page</h1>
        <input type="text" name="title" id="title" value="" placeholder="Your title">
        TODO: Verifier que l'url entrée est unique.
        Ps : respecter la forme suivant : /mon-url/, avec les "/". La page sera donc accessible via http://monsite.fr/mon-url/
        <input type="text" name="url" id="url" value="" placeholder="The entry-point url">

        <textarea cols="80" id="editor" name="editor" rows="10">
        </textarea>
        <p><button onclick="savePage()">Valider</button></p>

    <?php
    }
    /* IF WE EDIT A PAGE*/
    else
    {
        $db = new SK_Persist();
        $t = $db->GetFirstData("sk_pages","page_title,content","id='".$_GET['k']."'");
        $title = $t->page_title;
        $content = $t->content;
        ?>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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
            function editText(){
                $.post( "/modules/SK_Administrator/api/editPage.php", { id: $('#id_page').val(), title:$('#title').val(), content:$('#editor').val() } )
                    .done(function( data ) {
                        alert( "Serveur answer :" + data );
                    });

            }
        </script>
        <h1>Edit page</h1>

        <input type="text" name="title" id="title" value="<?php echo $title; ?>">
        <input type="hidden" name="id_page" id="id_page" value="<?php echo $_GET['k'] ?>">
        <textarea cols="80" id="editor" name="editor" rows="10">
            <?php echo $content; ?>
        </textarea>
        <p><button onclick="editText()">Valider</button></p>

    <?php
    }

}
/* ELSE WE JUST DISPLAY THE LIST OF EXISTING PAGES */
else
{
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        function deletePage(num){
            $.post( "/modules/SK_Administrator/api/delPage.php", { id: num } )
                .done(function( data ) {
                    alert( "Deleted. Server Answer :" + data );
                    location.reload();
                });
        }
    </script>
    <h1>Pages</h1>

    <p></p>
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