<?php
/**
 * Global functions for the SSORM manager
 */
 
 //Draws the required files using the URL
 function yeild(){
     if(isset($_REQUEST["model"])){
         $mod=$_REQUEST["model"];
       
         //load the requisite controller and fire the action
         require_once _SSORM_ROOT."controllers/".$mod."Controller.php";
         eval("\$co->".$_REQUEST["action"]."();");
         
         //load the view
         require_once _SSORM_ROOT."views/".$mod."s/".$co->uc_get_view().".php";
      }
 }
 
 //URL HELPERS
 function url_for($vars){
     $arr=array();
     foreach($vars as $var=>$value){
        array_push($arr, "$var=$value");
     }
     
     $url=implode("&", $arr);
     $url="index.php?".$url;
     
     return $url;
 }
 //loggs into the database using the $config_db array set in config/db_config
 function db_login() {
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

function table_exists($table){
    global $config_db;
    
    $result = mysql_query("SHOW TABLES FROM ".$config_db["database"]." LIKE '$table';" );

    //returns true or false depending on whether or not a result is found
    return $data = mysql_fetch_assoc($result);
}

?>
