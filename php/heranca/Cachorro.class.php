<?php
include_once 'Animal.class.php';

class Cachorro extends Animal
{
    public function falar()
    {
        return "$this->nome, au au...<br>";
    }

    public function latir()
    {
        echo 'Au au....<br>';
    }
}
