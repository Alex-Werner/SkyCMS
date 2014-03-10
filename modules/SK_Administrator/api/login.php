<?php
session_start();

function __autoload($class)
{
    $filename = __DIR__ . "/../../../core/classes/" . $class . '.php';
    if (file_exists($filename)) {
        require_once $filename;
    }
}

class login
{
    function login($user = null, $pass = null)
    {
        $_SESSION['administrateur'] = "";

        if ($user == null || $pass == null) {
            $this->result = '{"result":"0"}';
            $_SESSION['administrateur'] = "nope";

        } else {


            $db = new SK_Persist();
            $getRootCred = $db->GetFirstData('sk_mod_skadministrator', 'value', "entity='users'");

            $rootCred = json_decode($getRootCred->value);
            foreach ($rootCred->admins as $usr) {
                if ($usr->user == $user && $usr->pass == $pass) {
                    $this->result = '{"result":"1","level":"'.$usr->level.'"}';
                    $_SESSION['administrateur'] = $usr->level;
                }
            }

        }
        if ($_SESSION['administrateur'] == "nope" || $_SESSION['administrateur'] == ""    )
        {
            $this->result = '{"result":"0"}';
            $_SESSION['administrateur'] = "nope";
        }
    }
}

if (isset($_GET['pseudo']) && isset($_GET['pass'])) {
    $login = new login($_GET['pseudo'], $_GET['pass']);
} else {
    $login = new login();
}
echo $login->result;