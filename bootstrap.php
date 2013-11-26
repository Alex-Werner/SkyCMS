<?php

class bootstrap{

    var $js;
    var $css;

    function bootstrap(){
        require('conf/global.php');
        if(sk_debug){error_reporting(E_ALL);}
        $this->css=array();
        $this->js=array();
    }
    function loadCSS($pathname){
        if(file_exists($pathname))
            $this->css[]=$pathname;
    }
    function loadJS($pathname){
        if(file_exists($pathname))
            $this->js[]=$pathname;
    }
    function loadThemes($themeName){
        $themeDir = "/themes/default/";
        $this->css[]=$themeDir."/css/general.css";
        $this->js[]=$themeDir."/core/js/global.js";
    }
    function __autoload($class)
    {
        if(strpos($class,'SK') !==false)
        {
            if(file_exists('/classes/'.$class.'.php'))
                require_once '/classes/'.$class.'.php';
        }
    }


}






