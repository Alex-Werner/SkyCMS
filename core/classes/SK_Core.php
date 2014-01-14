<?php
/**
 * Author: Alex-WERNER
 * Date: 14/01/14
 * Time: 15:43
 * Use:
 */

class SK_Core {

    function SK_Core($dir)
    {
        $this->SkDir = $dir;
        $this->themeName = "default";
    }

    /* LOGIN */
    function userIsLogged($login=NULL, $passwd=NULL)
    {
        return $this->userLogIn();
    }
    function userLogIn($login=NULL, $passwd=NULL)
    {
        $login = addslashes($login);
        $passwd = addslashes($passwd);
        return false;
    }
    /* THEME FUN STUFF */
    function loadTheme($file=null, $options=null)
    {
        //$opt = explode('_',$options);
        $filename=$this->SkDir.'/themes/'.$this->themeName.'/index.php';
        if(file_exists($filename))
        {
            //            include($filename);
            return file_get_contents($filename);
        }
        else
        {
            throw new Exception("Error while loading template");
        }
    }
    function processTheme($html)
    {
        phpinfo();
        //var_dump((new SK_Date())->display());
       // $arr = array('{{SERVER_TIME}}','{{PAGE_TITLE}}');
       // $arr2 = array(, 'Default TEMPLATE');
       // return str_replace($arr, $arr2, $html);
    }
    function displayTheme($html)
    {
        echo $html;
    }

    function skInit($_GET=null, $_POST=null)
    {

    }


}