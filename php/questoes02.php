<?php
/*]
1. Funcoes
Crie uma funcao media(array $notas): float
que recebe um array de notas e retorna a media.
*/

function media($notas): float
{
    $soma = 0;
    foreach ($notas as $nota) {
        echo 'Notas: ' . $nota . '<br>';
        $soma += $nota;
    }
    return $soma / count($notas);
}
$notas = [5, 2, 3, 2, 6];

$media = media($notas);
echo "A média é: $media<br>";

if ($media >= 6) {
    echo 'Aprovado';
} else {
    echo 'Reprovado';
}
echo '<br><br>';
/*
2. Arrays Monte um array associativo para um "produto" (nome, preco, estoque)
 e outro array com 3 produtos (multidimensional). Imprima com foreach
*/

$produto = [
    ['nome' => 'Pão Frances', 'preco' => 12, 'estoque' => 200]
];

foreach ($produto as $item) {
    echo $item['nome'] . ' - ' . $item['preco'] . ' - ' . $item['estoque'];
}
echo '<br><br>';
$produtos = [
    ['nome' => 'Pão Frances', 'preco' => 12, 'estoque' => 200],
    ['nome' => 'Pão de Milho', 'preco' => 7, 'estoque' => 20],
    ['nome' => 'Pão de Forma', 'preco' => 6, 'estoque' => 45],
];

foreach ($produtos as $item) {
    echo $item['nome'] . ' - ' . $item['preco'] . ' - ' . $item['estoque']."<br>";
}

//echo 'Teste';
