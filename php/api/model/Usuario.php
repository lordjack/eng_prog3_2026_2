<?php

// model/Usuario.php
require_once __DIR__ . '/../config/db.class.php';

class Usuario
{
    private db $db;
    private $table_name = 'usuario';

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

    public function buscarPorEmail(string $email): ?object
    {
        $dados = $this->db->findBy('email', $email);
        return $dados[0] ?? null;
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
}
