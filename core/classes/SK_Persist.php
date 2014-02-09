<?php
/**
 * Author: Alex-WERNER
 * Date: 03/02/14
 * Time: 12:03
 * Use:
 */

class SK_Persist {
    function SK_Persist()
    {
        $this->host="localhost";
        $this->dbname="SKCms";
        $this->user = "root";
        $this->pass = "root";

    }
    function Connect()
    {
        return new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    }

    /**
     * @param $table La table correspondante en base de donnée
     * @param $key la/les clée à recherché "id"/"id, name, firstname"
     * @param string $where (optional) Clause de recherche ((where) id=1 )
     * @return Objets contenant les résultats
     */

    function GetData($table, $key, $where="1=1")
    {
        $db = $this->Connect();
        $result=$db->query("SELECT ".$key." FROM ".$table." WHERE ".$where);

        //var_dump("SELECT ".$key." FROM ".$table." WHERE ".$ress->quote($where, PDO::PARAM_STR));
        $result->setFetchMode(PDO::FETCH_OBJ);

        if($result->rowCount()=="0")
            return 0;
        return $result->fetchAll();
    }
    function GetFirstData($table, $key, $where="1=1")
    {
        $db = $this->Connect();
        $result=$db->query("SELECT ".$key." FROM ".$table." WHERE ".$where);

        //var_dump("SELECT ".$key." FROM ".$table." WHERE ".$ress->quote($where, PDO::PARAM_STR));
        $result->setFetchMode(PDO::FETCH_OBJ);

        if($result->rowCount()=="0")
            return 0;
        return $result->fetch();
    }
    function InsertData($table,$keys,$values)
    {
        $db= $this->Connect();
        $db->query("INSERT INTO ".$table." (".$keys.") VALUES (".$values.")");
    }
    function DeleteData($table,$where)
    {
        $db = $this->Connect();
        $db->exec("DELETE FROM ".$table." WHERE ".$where);
    }
    function SetData($table,$key,$value,$where)
    {
        $db = $this->Connect();
        $db->exec("UPDATE ".$table." SET ".$key."='".$value."' WHERE ".$where);
    }
    //TODO : CLASS CONFIG MAY BE ?
    function GetConfigValueFromKey($key)
    {

        $db = $this->Connect();
        $result=$db->query("SELECT value FROM sk_config WHERE entity='".$key."'");

        $result->setFetchMode(PDO::FETCH_OBJ);

        return $result->fetch()->value;
    }
}
/*
 *  functon SK_Persist()
    {
    $this->host="";
    $this->dbname="";
    $this->user = "";
    $this->pass = "";
    $connexion = new PDO("mysql:host=$PARAM_hote;dbname=$PARAM_nom_bd", $PARAM_utilisateur, $PARAM_mot_passe); // connexion à la BDD

    $RessourceDeConnection = new PDO(...); // ouverture d'une connection
    $RessourceDeConnection->query("SELECT id_membre FROM membres WHERE nom = ".$RessourceDeConnection->quote($nom, PDO::PARAM_STR));

    }

 */