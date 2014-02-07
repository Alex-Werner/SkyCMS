<?php session_start();
//var_dump($_GET);

function __autoload($class)
{
    $filename = __DIR__."/core/classes/".$class.'.php';
    if(file_exists($filename))
    {
        require_once $filename;
    }
}

$app = new SK_Core(__DIR__);
$app->skInit($_GET);
//$app->displaySrvInfo();
//Display template
$app->displayTheme($app->processTheme($app->loadTheme()));
//var_dump($app->loadTheme());
//$app->processTheme();
//$app->loadPage($app->landingPage());