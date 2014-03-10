<?php
session_start();

function __autoload($class)
{
    $filename = __DIR__ . "/../../../core/classes/" . $class . '.php';
    if (file_exists($filename)) {
        require_once $filename;
    }
}

class changesettings
{
    function changesettings($entity, $value){


        $db = new SK_Persist();
        $t = $db->SetValueFromEntity("sk_config", $entity, $value);
        $this->result= "ok !";
    }
}

if (isset($_SESSION['administrateur']) && $_SESSION['administrator']=42) {
    $change = new changesettings($_POST['entity'],$_POST['val']);
} else {
    $change = die("Nope");
}
echo $change->result;