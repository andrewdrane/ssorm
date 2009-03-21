<table>
<? // Base index template for %C

//check if any %t exist yet
if($co->%t){
    echo $co->%t[0]->auto_display_headers();
    foreach($co->%t as $obj){
        echo $obj->auto_display_functions();
    }
    echo "<br><br>";
}else{
    echo "There are no records in %t. Click NEW to add one!";
}
?>
</table>
<a href="<?=url_for(array("model"=>"%c", "action"=>"create")) ?>">NEW</a>
