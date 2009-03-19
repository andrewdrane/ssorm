<?php
//test wheter or not a table exists

include_once "test_include.php";
$table="slides";

//mrootkdir("mydir", 0700);
$dir = $_SERVER["DOCUMENT_ROOT"]."ssorm/ssorm/models/";
if ( ( $dh = opendir( $dir ) ) !== false )
{
    while ( ( $entry = readdir( $dh ) ) !== false )
    {
        if ( $entry != "." && $entry != ".." )
        {
            if ( is_file( $dir.$entry ) )
            {
                //require( $dir.$entry );
                
                echo $dir.$entry;
            }
        }
    }
}

closedir( $dh );

function table_exists($table){
    global $config_db;
    
    $result = mysql_query("SHOW TABLES FROM ".$config_db["database"]." LIKE '$table';" );

    //returns true or false depending on whether or not a result is found
    return $data = mysql_fetch_assoc($result);
}

$result = mysql_query("SHOW TABLES FROM ".$config_db["database"]." LIKE '$table';" );
print_r($result);

if($data = mysql_fetch_assoc($result)){
    echo "table exists";
}else{
    echo "BAD! EVIL! HELL! Table does NOT exist!!!!!!!";
}

?>
