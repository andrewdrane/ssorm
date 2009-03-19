<?php
/**
 * PHP Template.
 */

foreach($co->subslides as $obj){
    echo $obj->id." ".$obj->name." belongs to slide: <b>".$obj->slide()->id." ".$obj->slide()->slide."</b> &nbsp;&nbsp;";
    echo "<a href='". url_for(array("model"=>"subslide", "action"=>"edit", "id"=>$obj->id))."'>Edit</a> ";
    echo "<a href='". url_for(array("model"=>"subslide", "action"=>"show", "id"=>$obj->id))."'>Show</a> ";
    echo "<a href='javascript:if(confirm(\"Are you sure?\")){window.location=\"". url_for(array("model"=>"subslide", "action"=>"destroy", "id"=>$obj->id))."\";}'>Destroy</a> ";
    echo "<a href='". url_for(array("model"=>"slide", "action"=>"show", "id"=>$obj->slide_id))."'>Show Slide</a> ";
    echo "<br>";
}
echo "<br><br>";

?>
<a href="<?=url_for(array("model"=>"subslide", "action"=>"create")) ?>">NEW</a>