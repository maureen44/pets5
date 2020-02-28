<?php
// Turn on error reporting -- this is critical!
ini_set('display_errors',1);
error_reporting(E_ALL);

//Require autoload file
require("vendor/autoload.php");
require_once ('model/validation-functions.php');

//start session
session_start();
//Instantiate F3
$f3 = Base::Instance();

//set debug level
$f3->set('DEBUG', 3);

//define an array of colors
$f3->set('colors', array('pink', 'green', 'blue'));

//define controller
$controller = new Pets5Controller($f3);

// define database
$db = new Pets5Database();

//Define a default route
$f3->route("GET /", function (){
    global $controller;
    $controller->home();
});

$f3->route("GET /@animal", function($f3, $params) {
    $animal = $params['animal'];
    switch ($animal) {
        case 'chicken':
            echo "Cluck!";
            break;
        case 'dog':
            echo "Woof!";
            break;
        case 'cat':
            echo "Meow!";
            break;
        case 'horse':
            echo "Nay!";
            break;
        case 'cow':
            echo "Moo!";
            break;
        default:
            $f3->error(404);
    }
});

$f3->route("GET|POST /order", function($f3) {

    global $controller;
    $controller->order1();

});

$f3->route("GET|POST /order2", function() {
    global $controller;
    $controller->order2();

});
//Define route show
$f3->route("GET /show", function($f3) {
    global $controller;
    global $db;


    $controller->show($db);
   // $GLOBALS['controller']->show();
});

$f3->route("GET|POST /results", function() {

    //var_dump($_POST);
    global $db;
    global $controller;
    $controller->add($db, $_SESSION['pet1']);

});


//session_destroy();
//Run f3
$f3->run();