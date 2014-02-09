<?php session_start();

function __autoload($class)
{
    $filename = __DIR__."/core/classes/".$class.'.php';
    if(file_exists($filename))
    {
        require_once $filename;
    }
}
function __loadModule($modname)
{
    $filename= __DIR__."/modules/".$modname."/".$modname.".php";
    if(file_exists($filename))
    {
        require_once $filename;
    }
}

$app = new SK_Core(__DIR__);
$app->skInit($_GET);
//$app->displaySrvInfo();

//Display template
$app->displayTheme();