<?php

include 'Cachorro.class.php';
include 'Gato.class.php';

$c1 = new Cachorro('Bob');
echo $c1->falar();
$c1->latir();


$g1 = new Gato('Felix');
$g1->falar();
$g1->miar();
