<?
//This is your migration file!
//It has all of the table info
//omit the auto fields: id, updated_at, created_at.;
//make sure values are specified,  i.e. varchar(255), not just varchar!
//Also the default and other values go in this part as well.
require_once "migrate.php";

//NOTE! These are the starter tables for the slides and subslides
$db_tables=array(
    "slides"=>array(
        "slide"=>"varchar(255)",
         ),
    "subslides"=>array(
       "name"=>"varchar(255) NOT NULL",
       "description"=>"varchar(255) NOT NULL",
       "slide_id"=>"int(11) default NULL",
        ),
    "boxes"=>array(
        "name"=>"varchar(255) NOT NULL",
        "description"=>"text"
        ),
    "cars"=>array(
        "name"=>"varchar(255) NOT NULL",
        "description"=>"text"
        ),
    "cats"=>array(
        "name"=>"varchar(255) NOT NULL",
        "vexation"=>"text"
        ),
    );
    
migrate();
    
?>
