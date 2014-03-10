<?php var_dump($_GET); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Administration</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" ></script>
</head>
<style>
    body {
        font-family: "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
    }
    #wrapper{

    }
    a, a:visited {
        color: #000;
        text-decoration: none;
        text-shadow: 0px 1px 0px #fff;
    }

    a:hover {
        border-bottom: 1px dotted #fff;
    }
</style>
<body>
<div id="wrapper">
<?php
    if(isset($_GET['a'])){
        if(file_exists("modules/SK_Administrator/view/".$_GET['a'].".php"))
        {
            $a = $_GET['a'];
        }
        else
            $a = "overview";
    }

    else
        $a = "overview";

    ob_start();
    include "modules/SK_Administrator/view/index.php";
    $wrapper = ob_get_clean();


    ob_start();
    include "modules/SK_Administrator/view/".$a.".php";
    $content = ob_get_clean();


    echo str_replace("{{CONTENT}}", $content, $wrapper);

//
//    ob_start();
//    include "modules/SK_Administrator/view/index.php";
//
//    echo str_replace("{{CONTENT}}", "TEST", ob_get_clean());


    //include "modules/SK_Administrator/view/".$a.".php";
    //echo ob_get_clean();
?>
</div>
</body>
</html>