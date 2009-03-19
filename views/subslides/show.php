Sub Slide Name: <strong><?=$co->subslide->name;?></strong><br>
Sub Slide Description: <strong><?=$co->subslide->description;?></strong><br>
Belongs to slide: <strong><?=$co->slide->slide;?></strong><br><br><br>
    

<br><br>
<a href="<?= url_for(array("model"=>"subslide", "action"=>"create")); ?>">NEW Sub Slide</a><br>
    <a href="<?= url_for(array("model"=>"subslide", "action"=>"edit", "id"=>$co->subslide->id)); ?>">Edit this Sub Slide</a><br>
<a href="<?= url_for(array("model"=>"subslide", "action"=>"index")); ?>">Index</a>