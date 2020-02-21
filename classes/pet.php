<?php
class Pet
{
    private $_name;
    private $_color;
    private $_type;

    //Default constructor
    /*function __construct()
    {
        $this->_name = "unknown";
        $this->_color = "?";
    }*/

    //Parameterized constructor
    function __construct($_name= "unknown", $_color ="?", $_type = "pet")
    {
        $this->_name = $_name;
        $this->_color = $_color;
        $this->_type = $_type;
    }

    function eat()
    {
        echo $this->_name . " is eating.<br>";
    }

    function talk()
    {
        echo $this->_name . " is talking<br>";
    }

    function getName()
    {
        return $this->_name;
    }

    function setName($name)
    {
        $this->_name = $name;
    }

    function getColor()
    {
        return $this->_color;

    }

    function  setColor($color)
    {
        $this->_color = $color;
    }

    function getType()
    {
        return $this->_type;
    }

    function setType ($type)
    {
        $this->_type = $type;
    }
//
//    function breed()
//    {
//        echo $this->_type . " is a Pet<br>";
//    }

}