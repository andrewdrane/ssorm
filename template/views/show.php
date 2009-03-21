<? // Show template for %C ?>
%C ID <?=$co->%c->id;?>
%C PUT SOME FIELDS HERE


<br><br>
<a href="<?= url_for(array("model"=>"%c", "action"=>"new")); ?>">NEW  %c</a><br>
    <a href="<?= url_for(array("model"=>"%c", "action"=>"edit", "id"=>$co->%c->id)); ?>">Edit this %c</a><br>
<a href="<?= url_for(array("model"=>"%c", "action"=>"index")); ?>">%c Index</a>
