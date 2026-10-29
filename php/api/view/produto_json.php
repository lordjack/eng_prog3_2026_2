<?php

// view/produto_json.php
// Responsavel apenas por formatar e exibir as respostas em JSON.

require_once __DIR__ . '/../controller/JSON.php';

class ProdutoJsonView extends JSON
{
    public function renderListar(array $produtos): void
    {
        $this->resposta(['sucesso' => true, 'dados' => $produtos]);
    }

    public function renderBuscar(object $produto): void
    {
        $this->resposta(['sucesso' => true, 'dados' => $produto]);
    }

    public function renderCriar(): void
    {
        $this->resposta([
            'sucesso' => true,
            'mensagem' => 'Produto criado com sucesso',
        ], 201);
    }

    public function renderAtualizar(): void
    {
        $this->resposta([
            'sucesso' => true,
            'mensagem' => 'Produto atualizado com sucesso',
        ]);
    }

    public function renderExcluir(): void
    {
        $this->resposta([
            'sucesso' => true,
            'mensagem' => 'Produto excluido com sucesso',
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
