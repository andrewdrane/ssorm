Editing subslide <?=$co->subslide->name;?><br><br>

<form method="post" action="index.php" >
    <? $co->subslide->auto_field("name"); ?>
    <? $co->subslide->auto_field("description"); ?>
    <? $co->subslide->select_menu("Slide", "slide_id", "slide", "id", $co->subslide->slide_id); ?><br>
    <? $co->subslide->hidden_fields(); ?>
    <input type="submit">
</form>

<a href="<?= url_for(array("model"=>"subslide", "action"=>"index")); ?>">Index</a>
