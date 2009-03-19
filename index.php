
<? require_once "includes/master_include.php";?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <title></title>
    <style>
        label {display:block;}
        body {text-align:center; background-color:black; font-family:Helvetica, arial, sans-serif;}
        #main{text-align:left; width:800px; margin:10px auto; background-color:white; padding:10px;}
        #menu{ margin-bottom:20px; border-bottom:1px solid red; height:70px; }
            #menu a{font-weight: bold; color:#009900; display: block; float: left; padding:3px; border:1px solid black;}
            #menu a:hover{color:00ff00;}
    </style> 
  </head>
  <body>
     <div id="main">
         <div id="menu">
             <a href="<?= url_for(array("model"=>"slide", "action"=>"index")); ?>">View Slides</a>
             <a href="<?= url_for(array("model"=>"subslide", "action"=>"index")); ?>">View Sub Slides</a>
             <br style="clear:both;">
         </div>
         <?if(isset($_REQUEST["model"])){ ?>
            <? yeild();?>
         <?}else{?>
         <h2>Welcome to SSORM - the Super Simple Object Relational Mapper for PHP</h2>
         <p>Please click one of the links above to edit slides and subslides!</p>
         <? } ?>
    </div>
  </body>
</html>
