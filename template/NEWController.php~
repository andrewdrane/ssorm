<?php
/**
 * PHP Template.
Replace #C# with your class name
 */
 
 class #C#Controller extends UnderControl{
         
     function index(){
         $o=new #C#;
         $this->#C#s=$o->find_by("all");
     }
     
     function show(){
         $o=new #C#;
         if(!isset($this->#C#)) //hack, for when submit calls the page and there is no ID
            $this->#C#=$o->find($_REQUEST["id"]);
     }
     
     function edit(){
         $o=new #C#;
         $this->#C#=$o->find($_REQUEST["id"]);
     }
     
     function create(){
         $this->#C# = new #C#;
     }
     
     function submit(){
        $o=new #C#;
        
        if(isset($_REQUEST["id"])) //ie we are getting an edit submission rather than create.
            $this->#C#=$o->find($_REQUEST["id"]);
        else
            $this->#C#=new #C#;
        
        $this->#C#->auto_submit(); //update the new thing
        $this->show();
        $this->render_view = "show";
     }
     
     function destroy(){
        $o=new #C#;
        $this->#C#=$o->find($_REQUEST["id"]);
        $this->#C#->destroy();
        $this->index();
        $this->render_view = "index";
     }
 }
 
 $co= new #C#Controller; //co stands for Controller Object

?>
