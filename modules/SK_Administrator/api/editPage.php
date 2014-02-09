<?php
session_start();

function __autoload($class)
{
    $filename = __DIR__."/../../../core/classes/".$class.'.php';
    if(file_exists($filename))
    {
        require_once $filename;
    }
}
class editPage
{
    function editPage($id=null,$title=null,$content=null)
    {
        if($id==null || $title==null || $content==null)
        {
            $this->result= '{"result":"0"}';
        }
        else
        {
            $this->id.=$id;
            $this->title.=$title;
            $this->content.=$content;

            $this->doEdit();
            $this->result= '{"result":"1"}';
        }
    }
    function doEdit()
    {
        $db = new SK_Persist();
        $db->SetData("sk_pages","page_title",$this->title,"id='".$this->id."'");
        $db->SetData("sk_pages","content",$this->content,"id='".$this->id."'");

        /*
        $t = $db->GetFirstData("sk_pages","page_title,content","id='".$_GET['k']."'");
        $title = $t->page_title;
        $content = $t->content;*/
    }
}
if(isset($_POST['id']) && isset($_POST['title']) && isset($_POST['content']))
{
    $editPage = new editPage($_POST['id'],$_POST['title'],$_POST['content']);
}
else
{
    $editPage = new editPage();
}
echo $editPage->result;