<?php
/**
 * PHP Template.
 SEE IF THERE IS A WAY TO ADD THESE THINGS TO GLOBAL VARIABLES??
 */
 
 class SlideController extends UnderControl{
         
     function index(){
         $o=new Slide;
         $this->slides=$o->find_by("all");
     }
     
     function show(){
         $o=new Slide;
         if(!isset($this->slide)) //hack, for when submit calls the page and there is no ID
            $this->slide=$o->find($_REQUEST["id"]);
         
         $this->subslides=$this->slide->subslides();
     }
     
     function edit(){
         $o=new Slide;
         $this->slide=$o->find($_REQUEST["id"]);
     }
     
     function create(){
         $this->slide = new Slide;
     }
     
     function submit(){
        $o=new Slide;
        
        if(isset($_REQUEST["id"])) //ie we are getting an edit submission
            $this->slide=$o->find($_REQUEST["id"]);
        else
            $this->slide=new Slide;
        
        $this->slide->auto_submit(); //update the new thing
        $this->show();
        $this->render_view = "show";
     }
     
     function destroy(){
        $o=new Slide;
        $this->slide=$o->find($_REQUEST["id"]);
        $this->slide->destroy();
        $this->index();
        $this->render_view = "index";
     }
 }
 
 $co= new SlideController; //co stands for Controller Object

?>
