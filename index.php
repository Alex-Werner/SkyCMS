<?php
session_start();
/**
 * SKYCMS : ENTRY POINT
 */
require('bootstrap.php');
?>
<!DOCTYPE html>
<html>
    <head>
    <?php echo $this->html->charset('UTF-8'); ?>
    <title><?php echo $this->title(); ?></title>
    <?php echo $this->html->loadCSS();?>
    <?php echo $this->html-loadJS();?>
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <?php echo $this->header(); ?>
            </div>
            <div id="content">
                <?php echo $this->content(); ?>
            </div>
            <div id="bottom">
                <?php echo $this->bottom(); ?>
            </div>
        </div>
    </body>
</html>