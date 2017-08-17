<?php
class Users{

    function isUserExsit($username)
    {
        require_once("db.php");
        require("config.php");
        //--------------------
        $DB = sqlite_open($DB_PATH);
        $sql = "SELECT COUNT(*) as count FROM users WHERE usr_name = '$username';";
        //echo $sql;
        $result = sqlite_query($DB,$sql);
        $out = sqlite_fetch_array($result);
        return $out["count"];

    }
    

}

?>
