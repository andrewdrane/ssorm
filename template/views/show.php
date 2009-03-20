<? // Show template for %C ?>
%C ID <%=$co->%c->id;?>
%C PUT SOME FIELDS HERE


<br><br>
<a href="<?= url_for(array("model"=>"%c", "action"=>"new")); ?>">NEW Slide</a><br>
    <a href="<?= url_for(array("model"=>"%c", "action"=>"edit", "id"=>$co->%c->id)); ?>">Edit this slide</a><br>
<a href="<?= url_for(array("model"=>"%c", "action"=>"index")); ?>">Index</a>
