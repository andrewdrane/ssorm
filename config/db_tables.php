<?php
//omit the auto fields: id, updated_at, created_at.;
//make sure values are specified,  i.e. varchar(255), not just varchar!
//Also the default and other values go in this part as well.
require_once "../config/db_config.php";
require_once "../includes/global_functions.php";

$db_tables=array(
    "slides"=>array(
        "slide"=>"varchar(255)",
         "slidef"=>"varchar(255)",
         ),
    "subslides"=>array(
       "name"=>"varchar(255) NOT NULL",
       "description"=>"varchar(255) NOT NULL",
       "slide_id"=>"int(11) default NULL",
        ),
    "subslides2"=>array(
       "name"=>"varchar(255) NOT NULL",
       "slide_id"=>"int(11) default NULL",
        )
    );
    
    
    
    
function migrate(){
    global $db_tables;

    foreach($db_tables as $table=>$fields){
        if(table_exists($table)){
            //compare the field names of the table with the field names in the array
            //describe table
            $existing_fields=array();
            $field_names=array();
            
            $result = mysql_query("DESCRIBE ".$table);
            while($data = mysql_fetch_assoc($result)){
               array_push($existing_fields, $data["Field"]);
            }
            foreach($fields as $name=>$type){
               array_push($field_names, $name);
            }
            
            //get any fields that were not present. Subtract existing fields
            $field_names=array_diff($field_names, $existing_fields);
            
            if (sizeof($field_names)>0){ //if there is any difference between existing and expected tables
                foreach($field_names as $name){
                    $sql="ALTER TABLE `$table` ADD COLUMN `$name` ".$db_tables[$table][$name].";";
                    if(mysql_query($sql))
                        echo "<BR> Added column $name to $table <BR>";
                    else
                        echo "<BR> Failed to add $name to $table <BR>";
                }
            }else{echo "<BR>No missing fields in $table";}
            
        }else{ 
        //creates a new table with our default timestamps
            $sql="CREATE TABLE `$table` (
                  `id` int(11) NOT NULL auto_increment,
                  `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
                  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',";
              foreach($fields as $name=>$type){
                $sql.="`$name` $type,\n";
              }
            $sql.="PRIMARY KEY  (`id`)
                    ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1";

            if(mysql_query($sql))
                echo "<BR> Added table $table <BR>";
            else
                echo "<BR> Failed to add table $table <BR>";
        }
    }
    
}  
db_login();
migrate();
    
?>
