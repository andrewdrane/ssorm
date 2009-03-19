<?php
/**
 * PHP Template.
 SEE IF THERE IS A WAY TO ADD THESE THINGS TO GLOBAL VARIABLES??
 */
 
 class SubslideController extends UnderControl{

     function index(){
         $o=new Subslide;
         $this->subslides=$o->find_by("all");
     }
     
     function show(){
         $o=new Subslide;
         if(!isset($this->subslide)) //hack, for when submit calls the page and there is no ID
            $this->subslide=$o->find($_REQUEST["id"]);
         $this->slide=new Slide;
         $this->slide=$this->subslide->slide();//->find($this->subslide->slide_id);//the slide that this belongs to
     }
     
     function edit(){
         $o=new Subslide;       
         $this->subslide = $o->find($_REQUEST["id"]);
     }
     
     function create(){
         $this->subslide = new Subslide;
     }
     
     function submit(){
        $o=new Subslide;
        
        if(isset($_REQUEST["id"])) //ie we are getting an edit submission
            $this->subslide=$o->find($_REQUEST["id"]);
        else
            $this->subslide=new Subslide;
        
        $this->subslide->auto_submit(); //update the new thing
        $this->show();
        $this->render_view = "show";
     }
     
     function destroy(){
        $o=new Subslide;
        $this->subslide=$o->find($_REQUEST["id"]);
        $this->subslide->destroy();
        $this->index();
        $this->render_view = "index";
     }
 }
 
 $co= new SubslideController; //co stands for Controller Object

?>
