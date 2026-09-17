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

    public function criar($dados): void
    {
        $this->db->store($dados);
    }

    public function atualizar($dados): void
    {
        $this->db->update($dados['id'], $dados);
    }

    public function excluir(int $id): void
    {
        $this->db->delete($id);
    }
}
