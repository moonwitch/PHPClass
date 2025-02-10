<?php

class Cat {
    public $name;
    public $color;
    public $sound;
    public $age;

    // Constructor with default values.
    public function __construct($name = "Minoes", $color = "gray", $sound = "meow") {
        $this->name = $name;
        $this->color = $color;
        $this->sound = $sound;
        $this->age = rand(1, 18); // Random age between 1 and 18
    }

    // Method that introduces the cat.
    public function introduce() {
        return "Hello, I am " . $this->name . ", I am " . $this->age . " and my fur is " . $this->color . " and when I'm happy I say " . $this->sound . ".";
    }

    // Method show a nose
    public function showNose() {
        return "<br /><img src='https://picsum.photos/id/40/200' /><br />";
    }
}

// Push it
$cat = new Cat("Mike", "black", "woof");
echo $cat->introduce();
echo $cat->showNose();

$cat2 = new Cat("Sam", "tabby", "prr");
echo $cat2->introduce();
echo $cat2->showNose();

?>

