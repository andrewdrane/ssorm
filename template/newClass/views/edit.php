
<form method="get" action="index.php">
<?php
$co->slide->auto_fields();

?>
<input type="hidden" name="model" value="slide" />
<input type="hidden" name="action" value="submit" />
<input type="submit">
</form>

<a href="<?= url_for(array("model"=>"slide", "action"=>"index")); ?>">Index</a>
