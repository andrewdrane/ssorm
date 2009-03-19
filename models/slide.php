<?php
/**
 * PHP Template.
 */
 
 class Slide extends Manageable{
     var $table='slides';
     var $has_many = array("subslides"=>"Subslide");
     
     
     //JUNK!!!
     // custom functions and methods
     function output_xml(){
         echo"xml $this->minutes - $this->seconds - $this->slide <br>";
     }

 }

?>
