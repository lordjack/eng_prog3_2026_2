<?php
include 'db.class.php';

//var_dump($_POST);
//exit;

if ($_POST['nome'] === '' || $_POST['email'] === '') {
    echo 'Nome ou email vazio, por favor preencha os campos!';
} else {
    echo "<h3>Bem vindo,". $_POST['nome']." Email: " . $_POST['email'] . '</h3>';
}

$db = new db('usuarios');

if (empty($_POST['id'])) {
     $db->store($_POST);
} else {
    $db->update($_POST['id'], $_POST);
}

header("Location: UsuarioList.php");
