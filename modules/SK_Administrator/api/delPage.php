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
class delPage
{
    function delPage($id=null)
    {
        if($id==null)
        {
            $this->result= '{"result":"0"}';
        }
        else
        {
            $this->id.=$id;

            $this->doDelete();
            $this->result= '{"result":"1"}';
        }
    }
    function doDelete()
    {
        $db = new SK_Persist();
        $db->DeleteData("sk_pages","id='".$this->id."'");
    }
}
if(isset($_POST['id']))
{
    $delPage = new delPage($_POST['id']);
}
else
{
    $delPage = new delPage();
}
echo $delPage->result;