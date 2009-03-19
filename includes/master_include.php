<?php
require_once "constants.php";

//The order is important, so don't change please :);
require_once _SSORM_ROOT."config/db_config.php";

//require_once _SSORM_ROOT."includes/commonfiles.php";
require_once _SSORM_ROOT."includes/global_functions.php";
require_once _SSORM_ROOT."includes/ssorm.php";

//includes all the models
include_dir( _SSORM_ROOT."models/");

require_once _SSORM_ROOT."includes/underControl.php";


//INCLUDE related functions
 //includes all the files from a directory
    function include_dir($dir){
        if ( ( $dh = opendir( $dir ) ) !== false ){
            while ( ( $entry = readdir( $dh ) ) !== false ){
                if ( $entry != "." && $entry != ".." ){
                    if ( is_file( $dir.$entry ) ){
                        require_once ( $dir.$entry );
                    }
                }
            }
        }else{
            echo "BAD DIRECTORY";
        }
    }
?>
