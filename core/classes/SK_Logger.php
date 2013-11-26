<?php
/**
 * Author: Alex-WERNER
 * Date: 26/11/13
 * Time: 17:06
 * Use:
 */

class SK_Logger {

    var $file = "/log/log.txt";

    function SK_Logger(){
        //TODO : Crée un fichier si il n'existe pas.
        $this::LogAppend("We just opened it !");
    }
    function LogAppend($text){

        $fh = fopen($this->file, 'w') or die("File can't be opened");
        fwrite($fh, $text.'\n');
        fclose($fh);
    }
}