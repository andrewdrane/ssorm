<? // Base index template for %C

foreach($co->%t as $obj){
    echo "$obj->id";
    echo "<a href='". url_for(array("model"=>"%c", "action"=>"edit", "id"=>$obj->id))."'>Edit</a> ";
    echo "<a href='". url_for(array("model"=>"%c", "action"=>"show", "id"=>$obj->id))."'>Show</a> ";
    echo "<a href='javascript:if(confirm(\"Are you sure?\")){window.location=\"". url_for(array("model"=>"%c", "action"=>"destroy", "id"=>$obj->id))."\";}'>Destroy</a><br>";
}
echo "<br><br>";

?>
<a href="<?=url_for(array("model"=>"%c", "action"=>"create")) ?>">NEW</a>
