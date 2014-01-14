<?php
session_start();
/**
 * SKYCMS : ENTRY POINT
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <!--
    <?php //echo $this->html->charset('UTF-8'); ?>
    <title><?php //echo $this->title(); ?></title>
    <?php //echo $this->html->loadCSS();?>
    <?php// echo $this->html-loadJS();?>
    -->
    </head>
    <body>
        <?php

        function __autoload($class)
        {
            $filename = __DIR__."/core/classes/".$class.'.php';
            if(file_exists($filename))
            {
                require_once $filename;
            }
        }

        $this->bootstrap = new SK_Bootstrap();
        $this->core = new SK_Core();
        $this->html = new SK_Html();
        $this->header = new SK_Header();
        $this->content = new SK_Content();
        $this->bottom = new SK_Bottom();
        ?>
        <div id="wrapper">
            <div id="header">
                <?php
                //echo $this->header(); ?>
            </div>
            <div id="content">
                <?php
                //echo $this->content(); ?>
            </div>
            <div id="bottom">
                <?php
                //echo $this->bottom(); ?>
            </div>
        </div>
    </body>
</html>