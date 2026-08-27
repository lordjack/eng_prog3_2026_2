<?php

class Aluno
{
    private string $nome;
    private float $nota;
    public readonly string $matricula;

    public function __construct($nome,$nota){
        $this->nome = $nome;
        $this->nota = $nota;
        $this->matricula = 123456;

    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNota()
    {
        return $this->nota;
    }
    public function setNota($nota)
    {
        if ($nota < 0 && $nota > 10) {
            echo 'Não aceita notas menores que zero e maior que 10';
        } else {
            $this->nota = $nota;
        }
    }
}
