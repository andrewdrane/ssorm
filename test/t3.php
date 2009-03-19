<?php
/**
 * PHP Template.
 */
 function test($a, $b){
     if($b)
         echo "you have set B: ".$b;
     else
         echo "NO B HAS BEEN SET";
 }
 
 test("a", false);
 echo "<Br><BR><BR>";
 test("a", "THIS IS A MESSAGE");

?>
