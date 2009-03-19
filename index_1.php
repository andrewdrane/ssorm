
<? require "models/slide.php"; ?>
<? require "models/subslide.php"; ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <title></title>
    <style>
        label {display:block;}
    </style>
  </head>
  <body>
    <?php 
        function spacers(){
            echo "<br><BR><BR><BR>";
        }
    /**
        $val = array();
        $result = mysql_query("DESCRIBE slides");
       // $result = mysql_query("INSERT INTO slides (slide) VALUES ('abc')");
           while($data = mysql_fetch_assoc($result)){
           $val[$data["Field"]]=$data["Type"];
            print_r($data);
        }
        print_r($val);
      **/  
      $s=new Slide;
      //echo $s->slide;
      //$y=Slide::find(1); // this returns an error when it looks for it's own class';
      //Slide::me();
      $y=$s->find(1);
      //echo "<br><BR><BR><BR> HERE IS Y";
         // print_r($y);
      //echo "<br><BR><BR><BR> My name is:". $y->slide;
      spacers();
      $y->slide="yahoo!!.php";
      $y->save();
     
      $z=$s->find_by("id = 2");
      
      echo "here are some objects:<BR>";
      foreach($z as $o){
          //echo $o->id." ".$o->slide."<br>";
          $o->output_xml();
      }
      //$y->auto_fields();
      
      //$y->has("Subslide");
      
      
      $y->select_menu("Slide", "slide_id", "slide", "id", "2");

    ?>  
  </body>
</html>
