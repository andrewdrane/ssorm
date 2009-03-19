<?php
/**
 * Logs into the database
 */
function xlogin() {
    global $config_db;
    $database=$config_db["database"];
    $host=$config_db["host"];
    $uname=$config_db["uname"];
    $pass=$config_db["password"];
    $connection= mysql_connect($host,$uname,$pass);
    $db= mysql_select_db($database);

    if(!$connection || !$db){
        die ("We're sorry - there was a problem connnecting");
    }
}

?>
