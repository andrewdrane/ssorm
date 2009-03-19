<form method="get" action="index.php">
    <? $co->subslide->auto_field("name"); ?>
    <? $co->subslide->select_menu("Slide", "slide_id", "slide", "id", $co->subslide->slide_id); ?><br>

<input type="hidden" name="model" value="subslide" />
<input type="hidden" name="action" value="submit" />
<input type="submit">
</form>
