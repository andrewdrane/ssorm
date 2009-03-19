Slide Name: <strong><?=$co->slide->slide;?></strong><br>
Slide Minutes: <strong><?=$co->slide->minutes;?></strong><br>
Slide Seconds: <strong><?=$co->slide->seconds;?></strong><br><br><br>
<b>Subslides:</b><br>

<ul>
<? foreach($co->subslides as $oSS){ ?>
    <li>
    <?= $oSS->name; ?>
    <a href="<?= url_for(array("model"=>"subslide", "action"=>"edit", "id"=>$oSS->id)); ?>">Edit</a><br>
    </li>
<? } ?>
</ul>

<br><br>
<a href="<?= url_for(array("model"=>"slide", "action"=>"new")); ?>">NEW Slide</a><br>
    <a href="<?= url_for(array("model"=>"slide", "action"=>"edit", "id"=>$co->slide->id)); ?>">Edit this slide</a><br>
<a href="<?= url_for(array("model"=>"slide", "action"=>"index")); ?>">Index</a>