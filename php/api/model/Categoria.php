<?php

// model/Categoria.php
require_once __DIR__ . '/../config/db.class.php';

class Categoria
{
    private db $db;
    private $table_name = 'categorias';

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

    public function criar(array $dados): void
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

    // Relacionamento 1:N — lista todos os produtos de uma categoria
    public function listarProdutos(int $categoriaId): array
    {
        $sql = "SELECT * FROM produtos WHERE categoria_id = ?";
        $stmt = $this->db->getConn()->prepare($sql);
        $stmt->execute([$categoriaId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
