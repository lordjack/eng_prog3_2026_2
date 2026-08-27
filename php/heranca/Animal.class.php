<?php

class Animal
{
    public string $nome;
    public string $raca;

    public function __construct($nome)
    {
        $this->nome = $nome;
    }

    public function falar()
    {
        return '...';
    }
}
