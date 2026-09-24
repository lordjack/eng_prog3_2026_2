<?php

// controller/CategoriaController.php

require_once __DIR__ . '/../model/Categoria.php';
require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../view/categoria_json.php';

class CategoriaController extends Controller
{
    private Categoria $model;
    private CategoriaJsonView $view;

    public function __construct()
    {
        $this->model = new Categoria();
        $this->view = new CategoriaJsonView();
    }

    // GET /categorias
    public function listar(): void
    {
        $categorias = $this->model->listar();
        $this->view->renderListar($categorias);
    }

    // GET /categorias/{id}
    public function buscar(int $id): void
    {
        $categoria = $this->model->buscar($id);
        if ($categoria) {
            $this->view->renderBuscar($categoria);
        } else {
            $this->view->renderErro('Categoria nao encontrada', 404);
        }
    }

    // GET /categorias/{id}/produtos
    public function listarProdutos(int $id): void
    {
        if (!$this->model->buscar($id)) {
            $this->view->renderErro('Categoria nao encontrada', 404);
            return;
        }

        $produtos = $this->model->listarProdutos($id);
        $this->view->renderListarProdutos($produtos);
    }

    // POST /categorias
    public function criar(): void
    {
        $dados = $this->getDadosRequisicao();

        if (empty($dados['nome'])) {
            $this->view->renderErro('Campo obrigatorio: nome', 400);
            return;
        }

        try {
            $this->model->criar([
                'nome' => $dados['nome'],
                'descricao' => $dados['descricao'] ?? null,
            ]);
            $this->view->renderCriar();
        } catch (Exception $e) {
            $this->view->renderErro($e->getMessage(), 500);
        }
    }

    // PUT /categorias/{id}
    public function atualizar(int $id): void
    {
        if (!$this->model->buscar($id)) {
            $this->view->renderErro('Categoria nao encontrada', 404);
            return;
        }

        $dados = $this->getDadosRequisicao();

        if (empty($dados)) {
            $this->view->renderErro('Nenhum dado enviado para atualizacao', 400);
            return;
        }

        try {
            $this->model->atualizar($id, $dados);
            $this->view->renderAtualizar();
        } catch (Exception $e) {
            $this->view->renderErro($e->getMessage(), 500);
        }
    }

    // DELETE /categorias/{id}
    public function excluir(int $id): void
    {
        if (!$this->model->buscar($id)) {
            $this->view->renderErro('Categoria nao encontrada', 404);
            return;
        }

        try {
            $this->model->excluir($id);
            $this->view->renderExcluir();
        } catch (Exception $e) {
            $this->view->renderErro($e->getMessage(), 500);
        }
    }

    protected function getDadosRequisicao(): array
    {
        $json = file_get_contents('php://input');
        return json_decode($json, true) ?? [];
    }

    public function rotaNaoEncontrada(): void
    {
        $this->view->renderErro('Rota nao encontrada', 404);
    }
}
