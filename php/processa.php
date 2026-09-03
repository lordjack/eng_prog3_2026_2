<?php

$nome = $_GET['nome'];
$email = $_GET['email'];

if ($nome === '' || $email === '') {
    echo 'Nome ou email vazio, por favor preencha os campos!';
} else {
    echo "<h3>Bem vindo, $nome Email: " . $email . '</h3>';
}
