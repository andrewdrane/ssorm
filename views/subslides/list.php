<?php
require $_SERVER["DOCUMENT_ROOT"]."ssorm/ssorm/models/all_models.php";
/**
 * PHP Template.
 */
 
 $o=new Subslide;
 $list=$o->find_by("all");

foreach($list as $obj){
    echo "$obj->id $obj->name $obj->slide_id ";
    echo "<a href='edit.php?id=$obj->id'>Edit</a> <br>";

}
echo "<br><br>";

?>
<a href="edit.php">NEW</a>