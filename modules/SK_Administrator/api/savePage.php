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
class savePage
{
    function savePage($title=null,$content=null, $url=null)
    {
        if($title==null || $content==null || $url ==null)
        {
            $this->result= '{"result":"0"}';
        }
        else
        {
            $this->title=$title;
            $this->content=$content;
            $this->url=$url;

            $this->doSave();
            $this->result= '{"result":"1"}';
        }
    }
    function doSave()
    {
        $db = new SK_Persist();
        $keys = "`id` ,`page_title` ,`content` ,`url`";
        $values = "NULL ,  '".$this->title."',  '".$this->content."',  '".$this->url."'";
        $db->InsertData("sk_pages",$keys,$values);

    }
}
if(isset($_POST['title']) && isset($_POST['content']) && isset($_POST['url']))
{
    $savePage = new savePage($_POST['title'],$_POST['content'],$_POST['url']);
}
else
{
    $savePage = new savePage();
}
echo $savePage->result;