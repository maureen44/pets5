<?php

class Bird extends Pet
{
    function fetch()
    {
        echo "<p>" . $this->getName() . " is fetching.</p>";
    }

    function fly()
    {
        echo "<p>" . $this->getName() . " is flying.</p>";
    }

    function talk()
    {
        echo $this->getName() . " is twitting</br>";
    }
}