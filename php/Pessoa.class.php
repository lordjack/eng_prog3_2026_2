<?php

class Pessoa
{
    public $nome;
    public $idade;

    public function __construct(string $nome, int $idade)
    {
        $this->nome = $nome;
        $this->idade = $idade;
    }

    function apresentar()
    {
        echo "Olá, meu nome $this->nome e tenho idade: $this->idade<br>";
    }
}
