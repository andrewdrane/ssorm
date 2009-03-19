
<form method="post" action="index.php">
<?php
$co->slide->auto_fields();

?>
<input type="submit">
</form>

<a href="<?= url_for(array("model"=>"slide", "action"=>"index")); ?>">Index</a>
