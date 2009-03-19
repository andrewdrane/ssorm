<?php
class TheParent{
    //static $name = "TheParent";
    public static function my_class(){
        return self::$name;
    }

}

class TheChild extends TheParent{
    static $name = "TheChild";
}

echo "TheChild :: myclass ".TheChild::my_class()."<BR><BR><BR>";
echo "TheChild :: \$name ".TheChild::$name."<BR><BR><BR>";
?>
