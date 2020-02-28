<?php

class Pets5Controller
{
    private $_f3;
    private $_val;

    public function __construct($f3) {
        $this->_f3 = $f3;
    }

    public function home(){
        echo "<h1>My Pets</h1>";
        echo "<a href='order'>Order a Pet</a>";


//    $_SESSION['pet1'] = $pet1;
//    $_SESSION['dog1'] = $dog1;
//    $_SESSION['cat1'] = $cat1;
    }

    public function show($db)
    {

        //print_r($db->allPets());
        $this->_f3->set('pets5', $db->allPets());

        $template = new Template();
        echo $template->render('views/display-pets.html');
    }

    public function order1(){

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

                $this->_f3->reroute('/order2');
            }else{
                $this->_f3->set("errors['animal']", "Please enter an animal.");
            }
        }
        $template = new Template;
//    $views = new Template();
        echo $template->render('views/form1.html');

    }

    public function order2(){

        if (isset($_POST['color'])) {
            $color = $_POST['color'];
            if (validColor($color))
            {
                $_SESSION['pet1']->setColor("$color");
                $_SESSION['color']=$color;
                $name = $_POST['name'];
                $_SESSION['pet1']->setName("$name");
                $this->_f3->reroute('/results');
            }
            else {
                $this->_f3->set("errors['color']", "Please enter a color.");
            }
        }
        $views = new Template();
        echo $views->render('views/form2.html');
    }

    public function add($db, $pet)
    {
        $db->writePet($pet);
        $views = new Template();
        echo $views->render('views/results.html');

    }
}
