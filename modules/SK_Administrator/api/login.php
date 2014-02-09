<?php
session_start();

class login
{
    function login($user=null,$pass=null)
    {
        if($user==null || $pass==null)
        {
            $this->result= '{"result":"0"}';
            $_SESSION['administrateur'] = "nope";

        }
        else
        {
            $this->result= '{"result":"1"}';
            $_SESSION['administrateur'] = "42";
        }
    }
}
if(isset($_GET['pseudo']) && isset($_GET['pass']))
{
    $login = new login($_GET['pseudo'],$_GET['pass']);
}
else
{
    $login = new login();
}
echo $login->result;