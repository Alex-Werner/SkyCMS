<?php session_start();

function __autoload($class)
{
    $filename = __DIR__."/core/classes/".$class.'.php';
    if(file_exists($filename))
    {
        require_once $filename;
    }
}
function test()
{
    var_dump("HEY !");
}

$app = new SK_Core(__DIR__);
$app->skInit($_GET);
//Display template
$app->displayTheme($app->processTheme($app->loadTheme()));
//var_dump($app->loadTheme());
//$app->processTheme();