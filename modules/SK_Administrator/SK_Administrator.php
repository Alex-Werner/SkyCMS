<?php
/**
 * Author: Alex-WERNER
 * Date: 08/02/14
 * Time: 00:13
 * Use:
 */

class SK_Administrator {
    function SK_Administrator()
    {
        $this->content = $this->loadContent();

    }
    function loadTpl()
    {
        ob_start();
        include "modules/SK_Administrator/index.php";
        return ob_get_clean();

       //return file_get_contents("modules/SK_Administrator/index.php");
    }
    function loadContent()
    {
        //GET TPL
        return $this->loadTpl();
        //return "<div>INDEPENDANT PAGE LOADED !</div>";
    }
}