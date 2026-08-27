<?php

include 'Pessoa.class.php';
include 'Aluno.class.php';

$p1 = new Pessoa('Jackson', 38);
//$p1->nome ="Jackson";
//$p1->idade =38;

$p1->apresentar();

$p2 = new Pessoa('Chaves', 16);
$p2->apresentar();

$a1 = new Aluno('Jackson', 10);
//$a1->setNome('Jackson');
//$a1->setNota(10);
//$a1->matricula = 55555;

echo '<br>O nome é: ' . $a1->getNome() . ' - Nota: ' . $a1->getNota();
echo '<br>Matricula: ' . $a1->matricula;

?>
