<?php

// models/Produto.php
require_once 'config/db.class.php';

class Produto
{
    private db $db;
    private $table_name = 'produtos';

    public function __construct()
    {
        $this->db = new db($this->table_name);
    }

    public function listar(): array
    {
        return $this->db->all();
    }

    public function buscar(int $id): ?object
    {
        $dados = $this->db->find($id);
        return $dados ?: null;
    }

    public function criar(string $nome, float $preco, int $qtd): void
    {
        $this->db->store([
            'nome' => $nome,
            'preco' => $preco,
            'quantidade' => $qtd,
        ]);
    }

    public function excluir(int $id): void
    {
        $this->db->delete($id);
    }
}
