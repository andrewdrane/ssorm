<?php
/**
 * PHP Template.
 */

foreach($co->slides as $obj){
    echo "$obj->id $obj->slide ";
    echo "<a href='". url_for(array("model"=>"slide", "action"=>"edit", "id"=>$obj->id))."'>Edit</a> ";
    echo "<a href='". url_for(array("model"=>"slide", "action"=>"show", "id"=>$obj->id))."'>Show</a> ";
    echo "<a href='javascript:if(confirm(\"Are you sure?\")){window.location=\"". url_for(array("model"=>"slide", "action"=>"destroy", "id"=>$obj->id))."\";}'>Destroy</a><br>";
}
echo "<br><br>";

?>
<a href="<?=url_for(array("model"=>"slide", "action"=>"create")) ?>">NEW</a>