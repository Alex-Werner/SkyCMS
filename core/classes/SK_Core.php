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
        $this->timeFormat = 'd-m-Y H:i';
        $this->SkDir = $dir;
        $this->themeName = "default";
        $this->actualPage="";
        $this->db = new SK_Persist();
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
    function setActualTheme()
    {
        $this->themeName = $this->db->GetFirstData("sk_themes","name","active=1")->name;
    }
    function loadTheme($file=null, $options=null)
    {
        //$opt = explode('_',$options);
        $this->setActualTheme();
        $filename=$this->SkDir.'/themes/'.$this->themeName.'/index.php';
        if(file_exists($filename))
        {
            return file_get_contents($filename);
        }
        else
        {
            throw new Exception("Error while loading template");
        }
    }
    function processTheme($html)
    {
        $t = new SK_Date();
        //var_dump($t);
        $arr = array('{{RESS=LOGO}}','{{SERVER_TIME}}','{{PAGE_TITLE}}','{{CONTENT_PAGE}}','{{CONTENT_MENU}}');
        //var_dump($t->format($this->timeFormat));
        $arr2 = array('<img src="/ressources/image/logo_overwhite.png"> ','11', 'Default TEMPLATE',$this->getActualPageContent(),$this->getActualMenuContent());
        return str_replace($arr, $arr2, $html);
    }
    function displayTheme()
    {
        //IF WE LOAD A MODULE
        if($this->db->GetData("sk_modules","active","url='/".$this->actualPage."/' AND active=1 AND independant_tpl=1"))
        {
            $class = $this->db->GetFirstData("sk_modules","name","url='/".$this->actualPage."/' AND active=1")->name;
            __loadModule($class);
            $module = new $class();
            echo $module->content;
        }
        //IF WE LOAD A PAGE
        else
        {

            echo $this->processTheme($this->loadTheme());
        }
    }

    function loadModuleTemplate($modName)
    {
        $this->setActualTheme();
        $filename=$this->SkDir.'/modules/'.$modName.'/index.php';
        if(file_exists($filename))
        {
            return file_get_contents($filename);
        }
        else
        {
            throw new Exception("Error while loading module template");
        }
    }
     /* CORE FUNNIER STUFF */

    function displaySrvInfo()
    {
        phpinfo();
    }
    function skInit($_GET=null, $_POST=null)
    {
        if($_GET==null && $_POST==null)
        {
            $this->actualPage=$this->db->GetConfigValueFromKey("landing_page");
        }
        else
        {
            $this->actualPage=$_GET['v'];
        }

    }
    function getActualMenuContent()
    {
        $menu = new SK_Menu($this->actualPage);
        return $menu->getHtml();
    }
    function getActualPageContent()
    {
        //Is there any modules installed looking for this entry point ?

        if($this->db->GetData("sk_modules","active","url='/".$this->actualPage."/' AND active=1"))
        {

            $class = $this->db->GetFirstData("sk_modules","name","url='/".$this->actualPage."/' AND active=1")->name;
            __loadModule($class);
            $module = new $class();
            return $module->content;

        }
        //If not, is there a normal page ?
        elseif($this->db->GetData("sk_pages","content","url ='/".$this->actualPage."/'"))
        {
            return $this->db->GetFirstData("sk_pages","content","url ='/".$this->actualPage."/'")->content;
        }
        //Then let's just bring our user in a error page
        else
        {
            if($this->db->GetConfigValueFromKey("allow_redirect_404"))
            {
                return $this->db->GetFirstData("sk_pages","content","url ='/".$this->db->GetConfigValueFromKey("allow_redirect_404_url")."/'")->content;

            }
            else
            {
                return $this->db->GetFirstData("sk_pages","content","url ='/404/'")->content;
            }

        //if config say we open.
            //$this->GetConfigValueFromKey("allow_redirect_404");
            //var_dump($this->GetData('sk_config','allow_redirect_404'));
            //Get 404 page screen
            //$this->GetData("");

        }

        //return $this->actualPage;
    }

}