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

//Define a default route
$f3->route("GET /", function (){
    echo "<h1>My Pets</h1>";
    echo "<a href='order'>Order a Pet</a>";


//    $_SESSION['pet1'] = $pet1;
//    $_SESSION['dog1'] = $dog1;
//    $_SESSION['cat1'] = $cat1;
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

    $_SESSION = array();
    $pet1 = new Pet();
    $dog1 = new Dog();
    $cat1 = new Cat();
    $bird1 = new Bird();
    if(isset($_POST['animal'])){
        $animal = $_POST['animal'];
        if(validAnimal($animal))
        {
            if (strtolower($animal) == "dog" ){
                $pet1 = new Dog($dog1);
            }
            elseif (strtolower($animal) == "cat"){
                $pet1 = new Cat($cat1);
            }
            elseif (strtolower($animal) == "bird"){
                $pet1 = new Bird($bird1);
            }
            else{
                $pet1 = new Pet($pet1);
            }
            $_SESSION['animal'] = $animal;
            $_SESSION['pet1'] = $pet1;
            $_SESSION['dog1'] = $dog1;
            $_SESSION['cat1'] = $cat1;
            $_SESSION['bird'] = $bird1;

            $f3->reroute('/order2');
        }else{
            $f3->set("errors['animal']", "Please enter an animal.");
        }
    }
    $template = new Template;
//    $views = new Template();
    echo $template->render('views/form1.html');

});

$f3->route("GET|POST /order2", function($f3) {
    /*//var_dump($_POST);
    $_SESSION['animal'] = $_POST['animal'];
    //var_dump($_SESSION);*/
    if (isset($_POST['color'])) {
        $color = $_POST['color'];
        if (validColor($color))
        {
            $_SESSION['pet1']->setColor("$color");
            $_SESSION['color']=$color;
            $name = $_POST['name'];
            $_SESSION['pet1']->setName("$name");
            $f3->reroute('/results');
        }
        else {
            $f3->set("errors['color']", "Please enter a color.");
        }
    }
    $views = new Template();
    echo $views->render('views/form2.html');

});

$f3->route("GET|POST /results", function() {
    //var_dump($_POST);
    $views = new Template();
    echo $views->render('views/results.html');
});

//Run f3
$f3->run();