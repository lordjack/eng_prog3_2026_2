<?php

// index.php — roteador central
require_once 'controller/ProdutoController.php';

$url = $_GET['url'] ?? '';
$url = explode('/', trim($url, '/'));

$controller = new ProdutoController();

if ($url[0] === 'produtos' && empty($url[1])) {
    $controller->listar();
} elseif ($url[0] === 'produtos' && is_numeric($url[1])) {
    $controller->buscar((int) $url[1]);
} else {
    $controller->resposta(['erro' => 'Rota nao encontrada'], 404);
}
