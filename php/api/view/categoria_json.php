<?php

// view/categoria_json.php
// Responsavel apenas por formatar e exibir as respostas em JSON.

require_once __DIR__ . '/../controller/Controller.php';

class CategoriaJsonView extends Controller
{
    public function renderListar(array $categorias): void
    {
        $this->resposta(['sucesso' => true, 'dados' => $categorias]);
    }

    public function renderBuscar(object $categoria): void
    {
        $this->resposta(['sucesso' => true, 'dados' => $categoria]);
    }

    public function renderListarProdutos(array $produtos): void
    {
        $this->resposta(['sucesso' => true, 'dados' => $produtos]);
    }

    public function renderCriar(): void
    {
        $this->resposta([
            'sucesso' => true,
            'mensagem' => 'Categoria criada com sucesso',
        ], 201);
    }

    public function renderAtualizar(): void
    {
        $this->resposta([
            'sucesso' => true,
            'mensagem' => 'Categoria atualizada com sucesso',
        ]);
    }

    public function renderExcluir(): void
    {
        $this->resposta([
            'sucesso' => true,
            'mensagem' => 'Categoria excluida com sucesso',
        ]);
    }

    public function renderErro(string $erro, int $status = 400): void
    {
        $this->resposta([
            'sucesso' => false,
            'erro' => $erro,
        ], $status);
    }
}
