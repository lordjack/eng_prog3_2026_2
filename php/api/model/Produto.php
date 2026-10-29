<?php

// model/Produto.php
require_once __DIR__ . '/../config/db.class.php';

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

    public function buscarPor(string $campo, string $valor): array
    {
        return $this->db->findBy($campo, $valor);
    }

    public function criar($dados): void
    {
        $this->db->store($dados);
    }

    public function atualizar(int $id, array $dados): void
    {
        $this->db->update($id, $dados);
    }

    public function excluir(int $id): void
    {
        $this->db->delete($id);
    }
}
