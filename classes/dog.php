<?php

class Dog extends Pet
{
    //
    function fetch()
    {
        echo "<p>" . $this->getName() . " is fetching. </p>";
    }

    function talk()
    {
        echo $this->getName() . " is barking<br>";
        /*parent::talk(); // TODO: Change the autogenerated stub*/
    }

//    function breed()
//    {
//        echo $this->getType() . " is a Poddle<br>";
//    }
}// end of dog class
