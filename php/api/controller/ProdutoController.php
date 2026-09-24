<?php

// controllers/ProdutoController.php

require_once 'model/Produto.php';
require_once 'JSON.php';

class ProdutoController extends JSON
{
    private Produto $model;

    public function __construct()
    {
        $this->model = new Produto();
    }

    public function criar(): void
    {
        $dados = $this->getData();

        $this->model->criar($dados);

        $this->resposta(['sucesso' => true, 'dados' => 'Criado com sucesso!']);
    }

    public function atualizar(): void
    {
        $dados = $this->getData();

        $this->model->atualizar($dados);

        $this->resposta([
            'sucesso' => true,
            'dados' => 'Atualizado com sucesso!',
        ]);
    }

    public function excluir($id): void
    {
        $this->model->excluir($id);

        $this->resposta([
            'sucesso' => true,
            'dados' => 'Excluido com sucesso!',
        ]);
    }

    public function listar(): void
    {
        $produtos = $this->model->listar();
        $this->resposta(['sucesso' => true, 'dados' => $produtos]);
    }

    public function buscarPor(): void
    {
        $campo = $_GET['campo'];
        $valor = $_GET['valor'];

    
        $produto = $this->model->buscarPor($campo, $valor);

        if ($produto) {
            $this->resposta(['sucesso' => true, 'dados' => $produto]);
        } else {
            $this->resposta(
                [
                    'sucesso' => false,
                    'erro' => 'Produto nao encontrado',
                ],
                404
            );
        }
    }

    public function buscar(int $id): void
    {
        $produto = $this->model->buscar($id);
        if ($produto) {
            $this->resposta(['sucesso' => true, 'dados' => $produto]);
        } else {
            $this->resposta(
                [
                    'sucesso' => false,
                    'erro' => 'Produto nao encontrado',
                ],
                404
            );
        }
    }
}
