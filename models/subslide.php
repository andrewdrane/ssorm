<?php
/**
 * PHP Template.
 */
 
 class Subslide extends Manageable{
     var $table='subslides';
     var $belongs_to = array("slide"=>"Slide");
     
     // custom functions and methods
     function output_links(){
         echo"subslide $this->id - $this->name <br>";
     }

 }

?>