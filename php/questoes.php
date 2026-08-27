<?php
/*
1. Variaveis e operadores
Crie variaveis para nome, idade e uma nota. Calcule a media de 3 notas e exiba com
echo
.
*/

$nome = 'Jackson Meires';
$idade = 38;
$nota01 = 5;
$nota02 = '5';
$nota03 = 9;

$media = ($nota01 + $nota02 + $nota03) / 3;
echo "Nome: $nome<br> Idade: $idade<br> A média é: $media<br>";

/*
2. Condicionais
a) Escreva um script que classifica uma nota em "Aprovado" (>= 6) ou "Reprovado".
b) Use match para converter um numero de 1 a 7 no nome do dia da semana.
*/

if ($nota02 >= 6) {
    echo 'APROVADO';
} else {
    echo 'REPROVADO';
}
echo '<br>';
if ($nota02 === 5) {
    echo "Nota 02: $nota02 é igual a 5";
}
print_r($nota01);
var_dump($nota02, $nota03);
echo '-------------------------<br>';

?>

