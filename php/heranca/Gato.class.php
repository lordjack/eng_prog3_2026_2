<?php
include_once 'Animal.class.php';

class Gato extends Animal
{
    public function falar()
    {
        return "$this->nome, miau miau...<br>";
    }

    public function miar()
    {
        echo 'Miau miau....<br>';
    }
}
