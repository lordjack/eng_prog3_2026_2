<?php

// view/usuario_json.php
// Responsavel apenas por formatar e exibir as respostas em JSON.

require_once __DIR__ . '/../controller/Controller.php';

class UsuarioJsonView extends Controller
{
    public function renderListar(array $usuarios): void
    {
        $this->resposta(['sucesso' => true, 'dados' => $usuarios]);
    }

    public function renderBuscar(object $usuario): void
    {
        $this->resposta(['sucesso' => true, 'dados' => $usuario]);
    }

    public function renderCriar(): void
    {
        $this->resposta([
            'sucesso' => true,
            'mensagem' => 'Usuario criado com sucesso',
        ], 201);
    }

    public function renderAtualizar(): void
    {
        $this->resposta([
            'sucesso' => true,
            'mensagem' => 'Usuario atualizado com sucesso',
        ]);
    }

    public function renderExcluir(): void
    {
        $this->resposta([
            'sucesso' => true,
            'mensagem' => 'Usuario excluido com sucesso',
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
