<?php

// controllers/ProdutoController.php

require_once 'model/Produto.php';
require_once 'Controller.php';

class ProdutoController extends Controller
{
    private Produto $model;

    public function __construct()
    {
        $this->model = new Produto();
    }

    public function listar(): void
    {
        $produtos = $this->model->listar();
        $this->resposta(['sucesso' => true, 'dados' => $produtos]);
    }

    public function buscar(int $id): void
    {
        $produto = $this->model->buscar($id);
        if ($produto) {
            $this->resposta(['sucesso' => true, 'dados' => $produto]);
        } else {
            $this->resposta([
                'sucesso' => false,
                'erro' => 'Produto nao encontrado',
            ], 404);
        }
    }
}
