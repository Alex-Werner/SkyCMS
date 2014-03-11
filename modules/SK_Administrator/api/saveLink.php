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
class saveLink
{
    function saveLink($title=null, $url=null)
    {
        if($title==null || $url ==null)
        {
            $this->result= '{"result":"0"}';
        }
        else
        {
            $this->title=$title;
            $this->url=$url;

            $this->doSave();
            $this->result= '{"result":"1"}';
        }
    }
    function doSave()
    {
        $db = new SK_Persist();
        $keys = "`id` ,`displayed_title` ,`url` ,`order`";
        $values = "NULL ,  '".$this->title."',  '".$this->url."',  -1";
        $db->InsertData("sk_menu",$keys,$values);

    }
}
if(isset($_POST['title']) && isset($_POST['url']))
{
    $saveLink = new saveLink($_POST['title'],$_POST['url']);
}
else
{
    $saveLink = new saveLink();
}
echo $saveLink->result;