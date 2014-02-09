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
class changeModuleState
{
    function changeModuleState($id=null,$active=null)
    {
        if($id==null || $active==null)
        {
            $this->result= '{"result":"0"}';
        }
        else
        {
            $this->id=$id;
            $this->active=$active;
            $this->doChangeState();
            $this->result= '{"result":"1"}';
        }
    }
    function doChangeState()
    {
        $db = new SK_Persist();
        $db->SetData("sk_modules","active",$this->active,"id='".$this->id."'");
    }
}
if(isset($_POST['active']) && isset($_POST['id']))
{
    $changeModuleState = new changeModuleState($_POST['id'],$_POST['active']);
}
else
{
    $changeModuleState = new changeModuleState();
}
echo $changeModuleState->result;