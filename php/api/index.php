<?php

// index.php — roteador central
require_once __DIR__ . '/controller/ProdutoController.php';
require_once __DIR__ . '/controller/CategoriaController.php';
require_once __DIR__ . '/controller/UsuarioController.php';

$url = $_GET['url'] ?? '';
$url = explode('/', trim($url, '/'));
$metodo = $_SERVER['REQUEST_METHOD'];

$recurso = $url[0] ?? '';
$id = is_numeric($url[1] ?? '') ? (int) $url[1] : null;
$acao = $url[1] ?? '';

// ============================================================
// ROTAS DE PRODUTOS
// ============================================================
if ($recurso === 'produtos') {
    $controller = new ProdutoController();

    // GET /produtos
    if (empty($acao) && $metodo === 'GET') {
        $controller->listar();
    }
    // GET /produtos/buscar?campo=...&valor=...
    elseif ($acao === 'buscar' && $metodo === 'GET') {
        $controller->buscarPor();
    }
    // GET /produtos/{id}
    elseif ($id !== null && $metodo === 'GET') {
        $controller->buscar($id);
    }
    // POST /produtos
    elseif (empty($acao) && $metodo === 'POST') {
        $controller->criar();
    }
    // PUT /produtos/{id}
    elseif ($id !== null && $metodo === 'PUT') {
        $controller->atualizar($id);
    }
    // DELETE /produtos/{id}
    elseif ($id !== null && $metodo === 'DELETE') {
        $controller->excluir($id);
    }
    else {
        $controller->rotaNaoEncontrada();
    }
}

// ============================================================
// ROTAS DE CATEGORIAS (relacionamento 1:N com Produtos)
// ============================================================
elseif ($recurso === 'categorias') {
    $controller = new CategoriaController();

    // GET /categorias
    if (empty($acao) && $metodo === 'GET') {
        $controller->listar();
    }
    // GET /categorias/{id}
    elseif ($id !== null && $metodo === 'GET' && empty($url[2])) {
        $controller->buscar($id);
    }
    // GET /categorias/{id}/produtos
    elseif ($id !== null && ($url[2] ?? '') === 'produtos' && $metodo === 'GET') {
        $controller->listarProdutos($id);
    }
    // POST /categorias
    elseif (empty($acao) && $metodo === 'POST') {
        $controller->criar();
    }
    // PUT /categorias/{id}
    elseif ($id !== null && $metodo === 'PUT') {
        $controller->atualizar($id);
    }
    // DELETE /categorias/{id}
    elseif ($id !== null && $metodo === 'DELETE') {
        $controller->excluir($id);
    }
    else {
        $controller->rotaNaoEncontrada();
    }
}

// ============================================================
// ROTAS DE USUARIOS
// ============================================================
elseif ($recurso === 'usuarios') {
    $controller = new UsuarioController();

    // GET /usuarios
    if (empty($acao) && $metodo === 'GET') {
        $controller->listar();
    }
    // GET /usuarios/{id}
    elseif ($id !== null && $metodo === 'GET') {
        $controller->buscar($id);
    }
    // POST /usuarios
    elseif (empty($acao) && $metodo === 'POST') {
        $controller->criar();
    }
    // PUT /usuarios/{id}
    elseif ($id !== null && $metodo === 'PUT') {
        $controller->atualizar($id);
    }
    // DELETE /usuarios/{id}
    elseif ($id !== null && $metodo === 'DELETE') {
        $controller->excluir($id);
    }
    else {
        $controller->rotaNaoEncontrada();
    }
}

// ============================================================
// ROTA NAO ENCONTRADA
// ============================================================
else {
    $controller = new ProdutoController();
    $controller->rotaNaoEncontrada();
}
