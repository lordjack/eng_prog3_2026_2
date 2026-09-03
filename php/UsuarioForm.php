<?php
include 'db.class.php';

$db = new db('usuarios');

if (!empty($_GET['id'])) {
    $dado = $db->find($_GET['id']);
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h1>Formulário Usuario</h1>

        <form action="processa.php" method="post">
            <input type="hidden" name="id" value="<?= !empty($dado->id) ? $dado->id :'' ?>" />
            <label>Nome</label>
            <input type="text" name="nome" value="<?= !empty($dado->nome) ? $dado->nome :'' ?>" />
            <br>
            <label>Email</label>
            <input type="email" name="email" value="<?= !empty($dado->email) ? $dado->email :'' ?>"/>
            <br>
            <label>Senha</label>
            <input type="password" name="senha_hash" />
            <br>
            <button type="submit">Salvar</button>
        </form>
    </body>
</html>