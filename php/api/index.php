<?php

// index.php — roteador central
require_once 'controller/ProdutoController.php';
require_once 'controller/UsuarioController.php';

$url = $_GET['url'] ?? '';
$url = explode('/', trim($url, '/'));
$metodo = $_SERVER['REQUEST_METHOD'];
$urlModel = $url[0] ?? '';

if ($url[0] == 'produtos') {
    $controller = new ProdutoController();
} elseif ($url[0] == 'usuarios') {
    $controller = new UsuarioController();
} else {
    $controller->resposta(['erro' => 'Rota nao encontrada'], 404);
}

//GET produtos
if ($url[0] === $urlModel && empty($url[1]) && $metodo == 'GET') {
    $controller->listar();

    //GET produtos/{id}
} elseif ($url[0] === $urlModel && is_numeric($url[1]) && $metodo == 'GET') {
    $controller->buscar((int) $url[1]);

    //GET produtos/buscar?campo...&valor=...
} elseif ($url[0] === $urlModel && $url[1] === 'buscar' && $metodo == 'GET') {
    $controller->buscarPor();

    //POST produtos
} elseif ($url[0] === $urlModel && empty($url[1]) && $metodo == 'POST') {
    $controller->criar();

    //PUT produtos/{id}
} elseif ($url[0] === $urlModel && empty($url[1]) && $metodo == 'PUT') {
    // var_dump($controller->getData());
    //  exit();
    $controller->atualizar();
} elseif ($url[0] === $urlModel && is_numeric($url[1]) && $metodo == 'DELETE') {
    $controller->excluir((int) $url[1]);
} else {
    $controller->resposta(['erro' => 'Rota nao encontrada'], 404);
}
