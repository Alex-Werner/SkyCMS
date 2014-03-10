<?php
/**
 * Author: Alex-WERNER
 * Date: 20/02/14
 * Time: 19:37
 * Use:
 */

class SK_Object {
    function ResetObject() {
        foreach ($this as $key => $value) {
            unset($this->$key);
        }
    }
}