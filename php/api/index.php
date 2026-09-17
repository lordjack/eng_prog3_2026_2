<?php

// index.php — roteador central
require_once 'controller/ProdutoController.php';

$url = $_GET['url'] ?? '';
$url = explode('/', trim($url, '/'));
$metodo = $_SERVER['REQUEST_METHOD'];

$controller = new ProdutoController();
$urlModel = 'produtos';

if ($url[0] === $urlModel && empty($url[1]) && $metodo == 'GET') {
    $controller->listar();

} elseif ($url[0] === $urlModel && is_numeric($url[1]) && $metodo == 'GET') {
    $controller->buscar((int) $url[1]);

} elseif ($url[0] === $urlModel && empty($url[1]) && $metodo == 'POST') {
    $controller->criar($controller->getData());

} elseif ($url[0] === $urlModel && empty($url[1]) && $metodo == 'PUT') {
    // var_dump($controller->getData());
    //  exit();
    $controller->atualizar($controller->getData());

} elseif ($url[0] === $urlModel && is_numeric($url[1]) && $metodo == 'DELETE') {
    $controller->excluir((int) $url[1]);
    
} else {
    $controller->resposta(['erro' => 'Rota nao encontrada'], 404);
}
