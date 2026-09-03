<?php
include 'db.class.php';

$db = new db('usuarios');

if (!empty($_GET['id'])) {
    $db->delete($_GET['id']);
    $dados = $db->all();
}
if (!empty($_POST)) {
    $dados = $db->search('nome', $_POST['nome']);
} else {
    $dados = $db->all();
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
    <h3>Listagem de Usuario</h3>

    <form action="UsuarioList.php" method="post">
        <label>Nome</label>
        <input type="text" name="nome" />
        <button type="submit">Buscar</button>
        <a href='UsuarioForm.php'>Novo</a>
    </form>
    <table border="1">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ativo</th>
                <th>Ação</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dados as $item) {
                echo "<tr>
                        <td>$item->id</td>
                        <td>$item->nome</td>
                        <td>$item->email</td>
                        <td>$item->ativo</td>
                        <td><a href='UsuarioForm.php?id=$item->id'>Editar</a></td>
                        <td><a onclick='return confirm(\"Deseja deletar \")'
                             href='UsuarioList.php?id=$item->id'>Deletar</a></td>
                    </tr>";
            } ?>
        </tbody>
</table>


</body>
</html>