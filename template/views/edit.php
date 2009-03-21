<? // Base Edit template for %C ?>
<form method="post" action="index.php">
	<?php
		$co->%c->auto_fields();
	?>
	<input type="submit">
</form>

<a href="<?= url_for(array("model"=>"%c", "action"=>"index")); ?>">Back</a>
