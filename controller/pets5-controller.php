<?php

class Pets5Controller
{
    private $_f3;
    private $_val;

    public function __construct($f3) {
        $this->_f3 = $f3;
    }

    public function show()
    {
        $pets5 = $GLOBALS['db']->AllPets();

        $this->_f3->set('pets5', $pets5);

        $template = new Template();
        echo $template->render('views/display-pets.html');
    }
}
