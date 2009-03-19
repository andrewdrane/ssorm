<?php
/**
 * Controller Master Class
 */
 
 class UnderControl{
     
     //if a view override has been set
     function uc_get_view(){
        if(isset($this->render_view))
            return $this->render_view;
        else
            return $_REQUEST["action"];
     }
     

 }
?>
