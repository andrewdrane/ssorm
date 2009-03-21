<?php
/**
 * Controller Template
 * Add or modify actions
 */
 
 class %CController extends UnderControl{
         
     function index(){
         $o=new %C;
         $this->%t=$o->find_by("all");
     }
     
     function show(){
         $o=new %C;
         if(!isset($this->%c)) //hack, for when submit calls the page and there is no ID
            $this->%c=$o->find($_REQUEST["id"]);
     }
     
     function edit(){
         $o=new %C;
         $this->%c=$o->find($_REQUEST["id"]);
     }
     
     function create(){
         $this->%c = new %C;
     }
     
     function submit(){
        $o=new %C;
        
        if(isset($_REQUEST["id"])) //ie we are getting an edit submission rather than create.
            $this->%c=$o->find($_REQUEST["id"]);
        else
            $this->%c=new %C;
        
        $this->%c->auto_submit(); //update the new thing
        $this->show();
        $this->render_view = "show";
     }
     
     function destroy(){
        $o=new %C;
        $this->%c=$o->find($_REQUEST["id"]);
        $this->%c->destroy();
        $this->index();
        $this->render_view = "index";
     }
 }
 
 $co= new %CController; //co stands for Controller Object

?>
