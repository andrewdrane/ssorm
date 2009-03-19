<?php
//Log into the database
db_login();
/**
* Manageable - a light weight ORM for PHP
* by Andrew Drane - Andrew [at] andrewdrane [dot] com
* Contains finder and other object functions
* Creates objects based on Rows of the database
* Functions mimic Rails in some way - this is intended to make the management
of 1 to many attributes very easy. Page load times should be quick since there isn't
very much overhead. This is NOT intended to be as robust - there's CAKE php for that
and JOOMLA too. Just a stripped down ORM. 
**/
class Manageable{
    var $fields=array();
    var $table;
    var $has_many;
    var $belongs_to;
        
    
    //these are the values that should not be user modified
    var $auto_values = array("id", "created_at", "updated_at");
    
    //CONSTRUCTORS
        function Manageable(){
            $this->get_fields();
        }
        
        // Loads the $fields array for the object. This will contain all the 
        // object's data propert names.
        function get_fields(){
            $result = mysql_query("DESCRIBE ".$this->table);
            while($data = mysql_fetch_assoc($result)){
               $this->fields[$data["Field"]]=$this->$data["Type"];
            }
        }
        
    //FINDERS
        //returns an object of the given ID
        function find($id){
            return $this->find_one_by("id", $id);
        }
        
        //finds a single instance
        function find_one_by($field, $value){
            //create a new class called $me. This will be of the calling class type
            //TODO find a way to use static typing so we can say Class::find(1) etc.
            eval("\$me=new ".get_class($this).";");
            
            //Create the sql. Grab result as array if it is valid
            $result = mysql_query("SELECT * FROM ".$this->table." WHERE ".$field." = ".$value);
            if($result)
                $data = mysql_fetch_array($result);
                
            //go thru the field values and assign the values to the new object
            foreach($this->fields as $field=>$value)
                $me->$field=$data[$field];
            
            return $me;
        }
        
        //find multiple instances by passing in a string. Returns an array
        function find_by($conditions){
            eval("\$me=new ".get_class($this).";");
            $objects=array();
            //build the query
            $sql="SELECT * FROM ".$this->table;

            if($conditions!="all")
                $sql=$sql." WHERE ".$conditions;
            
            $sql=$sql." ORDER BY id ASC";
            
            $result = mysql_query($sql);
            
            while($data = mysql_fetch_array($result)){
                foreach($this->fields as $field=>$value)
                    $me->$field=$data[$field];
                
                array_push($objects, clone $me);
            };
                        
            print_r($results);
            return $objects;
        }
        
    //SAVERS    
        //save will either update or insert - depending on whether the object ha an ID field
        function save(){
            if(isset($this->id))
                $this->update();
            else
                $this->insert();
        }
            //updates an existing record
            function update(){
                $values=array();
                //go through the fields and values and build a SQL query
                foreach($this->fields as $field=>$value){
                    if($field=="updated_at")
                        array_push($values, $field." = NOW()");
                    elseif($field =="id" || $field=="created_at")
                        ; //do not update id or created_at
                    else
                        array_push($values, $field." = '".$this->$field."'");
                }
                //combine the values
                $sql="UPDATE ".$this->table." SET "
                    .implode(", ", $values)
                    ." WHERE id = '".$this->id."';";

                //returns true or false;
                return mysql_query($sql);
            }
            
            function insert(){
                //start the query
                $fields=array();
                $values=array();
                
                //build the fields and value arrays
                foreach($this->fields as $field=>$value){
                    if($field =="id" || $field=="created_at"){
                        ; //do nothing for ID or created_at. mySql handles them nicely.
                    }else{
                        array_push($fields, $field);//build the field array
                        if($field=="updated_at")
                            array_push($values, "NOW()");
                        else 
                            array_push($values, "'".$this->$field."'");
                    }
                }
                
                //build the values list
                $sql="INSERT INTO ".$this->table." ("
                    .implode(", ", $fields).") VALUES ("
                    .implode(", ", $values).");";

                //will return true or false. If true, then assign the new ID to the object
                if( mysql_query($sql)){
                    $sql = "SELECT MAX(id) FROM ".$this->table;
                    $result = mysql_query($sql);
                    $row = mysql_fetch_row($result);
                    $this->id = $row[0];
                }else{
                    return false;
                }
                //echo $sql;
            }
            
            function destroy(){
                if(isset($this->id)){
                    $sql="DELETE FROM ".$this->table." WHERE id = ".$this->id;
                    return mysql_query($sql);
                }
            }
            
     //FORMS
     function auto_field($field){
        $type=$this->trim_parens($this->fields[$field]); //this is int, varchar etc.
        $cn=get_class($this); //cn = class name. Clever, eh?
        $val=$this->$field;
        echo "<p><label for='".$cn."_".$field."'>$field</label>";
        echo"<input type='text' name='".$field."' id='".$cn."_".$field."' value='$val'></p>";
        if(isset($_REQUEST["id"])){
            //echo "<input type='hidden' name='id' value='".$_REQUEST["id"]."'>";
        }
     }
     
     function auto_fields(){
         foreach($this->fields as $field=>$value){
            if(in_array($field, $this->auto_values)){
                ;
            }else{
                $this->auto_field($field);
            }
         }
         $this->hidden_fields();
     }
     //Print the hidden fields for the object. Pass in
     function hidden_fields(){
         $this->id_field();
         echo "<input type='hidden' name='model' value='".strtolower(get_class($this))."' />";
         echo "<input type='hidden' name='action' value='submit' />";
     }
     //prints ID field if there is one.
     function id_field(){
        if(isset($_REQUEST["id"])){
            echo "<input type='hidden' name='id' value='".$_REQUEST["id"]."'>";
        }
     }
     //class name, name attribute ,  display name, value="" for option, the selected value
     function select_menu($class, $name, $display, $selector, $value){
        //echo "<select id='$name' name='$name'>";
        $options="";
            eval("\$me=new ".$class.";");
            $list = $me->find_by("all");
           // print_r($list);
            
            foreach($list as $obj){
                if($obj->$selector==$value)
                    $sel=" selected";
                else
                    $sel="";
 
                $options.= $this->ss_rep(array($obj->$selector, $sel, $obj->$display), _SSORM_OPTION);
            }
        echo $this->ss_rep(array($name, $name, $options), _SSORM_SELECT);
     }
     
     //Post or get saver. Will add an id if one is present...
     function auto_submit(){
       foreach($_REQUEST as $field=>$value){
            if(in_array($field, $this->auto_values)){
                if($field=="id")
                    $this->id=$value;
            }else{
                $this->$field=$value;
            }
        }

         $this->save();
         //print_r($this);
     }
     
     
     //Helper Methods
     
        //removes the size from the field type. INT(11) BECOMES INT
         function trim_parens($str){
             $x=explode("(", $str);
                 return $x[0];
         }
         
    //SUPER CALL - dynamic functions happen here - The HAS_MANY and BELONGS_TO happen here!!!
    //TO DO add finder capabilities.
    function __call($function, $args) {
        global $config_classes;
        //HAS MANY, called like: Parent->children()
         if(isset($this->has_many[$function])){
            eval("\$q=new ".$this->has_many[$function].";");
            return $q->find_by(strtolower(get_class($this))."_id = ".$this->id);   
         //Belongs to, called like: Child->parent();
         }elseif(isset($this->belongs_to[$function])){
            eval("\$q=new ".$this->belongs_to[$function].";");
            $tmp=$function."_id";
            return $q->find($this->$tmp);  
         }
     }
     
     //PRIVATE HELPER FUNCTIONS
     
     //generates a Replacement Array that looks like this: array("#1", "#2"... etc
     private function ra($q){
         $arr=array();
         
         for($i=1;$i<=$q;$i++)
            $arr[]="#$i";
         
         return $arr;
     }
     
     //super simple replacement. Generates an array etc.
     private function ss_rep($arr, $const){
       return str_replace($this->ra(sizeof($arr)), $arr, $const);
     }

        
}

?>
