<table>
<? // Base index template for %C

echo $co->%t[0]->auto_display_headers();
foreach($co->%t as $obj){
    echo $obj->auto_display_functions();
}
echo "<br><br>";

?>
</table>
<a href="<?=url_for(array("model"=>"%c", "action"=>"create")) ?>">NEW</a>
