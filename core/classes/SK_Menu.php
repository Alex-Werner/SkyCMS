<?php

class SK_Menu{

    function SK_Menu($actualPage="home")
    {
        $this->root = "http://www.skycms.loc/";
        $this->actualPage = $actualPage;
    }
    function getHtml()
    {
        $db = new SK_Persist();
        $t = $db->GetData("sk_menu","id,displayed_title,url");
        $html = "<ul class='nav'><li class='divider-vertical'></li>";
        foreach($t as $val)
        {
            //echo $val->displayed_title;
            if($val->url == $this->actualPage)
            {
                $cl_active = "active";
            }
            else
            {
                $cl_active=" ";
            }
            $html .= "<li class='".$cl_active."'><a href='".$this->root.$val->url."'>".$val->displayed_title."</a></li>
                    <li class='divider-vertical'></li>";
        }

         $html .= "</ul>";

        return  $html;


    }
}