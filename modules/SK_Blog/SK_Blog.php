<?php
/**
 * Author: Alex-WERNER
 * Date: 08/02/14
 * Time: 00:28
 * Use:
 */

class SK_Blog {
    function SK_Blog()
    {
        $this->content = $this->loadBlog();
    }
    function loadBlog()
    {
        return  <<<HTML
    BLOG
HTML;
    }

}