<?php
/**
 * Author: Alex-WERNER
 * Date: 09/03/14
 * Time: 19:50
 * Use:
 */

class SK_Blog_Admin {
    function SK_Blog_Admin()
    {
        $this->content = $this->loadContent();
    }
    function loadTpl()
    {
        ob_start();
        include "modules/SK_Blog_Admin/index.php";
        $wrapper = ob_get_clean();
        return $wrapper;

        //return file_get_contents("modules/SK_Administrator/index.php");
    }
    function loadContent()
    {
        //GET TPL
        return $this->loadTpl();
        //return "<div>INDEPENDANT PAGE LOADED !</div>";
    }
}