<?php

abstract class Animal {
    public abstract function voice(): string;
}

class Cat extends Animal {
    public function voice(): string {
        return 'meow';
    }
}

class Dog extends Animal {
    public function voice(): string {
        return 'woff';
    }
}

function whatDoesTheAnimalSay(Animal $x) {
    echo 'It says "' . $x->voice() . '".';
}

$cat = new Cat();
$dog = new Dog();

whatDoesTheAnimalSay($cat);
whatDoesTheAnimalSay($dog);
