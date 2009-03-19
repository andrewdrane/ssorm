<?php
/**
 * PHP Template.
 */
 class Test{
     static $myclass="Test";
     var $has_many;
     var $belongs_to;
     
     function Test(){     
          $this->has_many=array("slides"=>"Slide");
          $this->belongs_to=array("courses"=>"Course");
          
     }
     
     public function __call($function, $args) {
         if(isset($this->has_many[$function])){
            echo "Has Many $function of class type ".$this->has_many[$function].".<br>";
         }elseif($this->belongs_to[$function]){
            echo "Belongs To $function of class type ".$this->belongs_to[$function].".<br>";
         }
     }
     
     public static function gc(){
         echo self::$myclass;
         echo "hi I am a function!";
     }
 }

$t=new Test;
$t->slides();

class SubTest extends Test{
    static $myclass="subTest";
    function subTest(){
       // echo __CLASS__;
    }
    
    public static function gc(){echo "You've been overwritten BITCHES!!!";}
}


?>
 <br><br>Yell, do tell?<br><BR><BR>
     <? $x=new SubTest; ?><BR>
     Should say subTest: <? SubTest::gc(); ?>