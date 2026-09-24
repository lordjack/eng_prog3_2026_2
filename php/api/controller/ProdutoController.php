<?php

// controller/ProdutoController.php

require_once __DIR__ . '/../model/Produto.php';
require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../view/produto_json.php';

class ProdutoController extends Controller
{
    // campos permitidos na busca, para evitar SQL injection via nome de coluna
    private const CAMPOS_BUSCA_PERMITIDOS = ['nome', 'preco', 'quantidade'];

    private Produto $model;
    private ProdutoJsonView $view;

    public function __construct()
    {
        $this->model = new Produto();
        $this->view = new ProdutoJsonView();
    }

    // GET /produtos
    public function listar(): void
    {
        $produtos = $this->model->listar();
        $this->view->renderListar($produtos);
    }

    // GET /produtos/{id}
    public function buscar(int $id): void
    {
        $produto = $this->model->buscar($id);
        if ($produto) {
            $this->view->renderBuscar($produto);
        } else {
            $this->view->renderErro('Produto nao encontrado', 404);
        }
    }

    // GET /produtos/buscar?campo=nome&valor=Camisa
    public function buscarPor(): void
    {
        $campo = $_GET['campo'] ?? '';
        $valor = $_GET['valor'] ?? '';

        if (!in_array($campo, self::CAMPOS_BUSCA_PERMITIDOS, true)) {
            $this->view->renderErro('Campo de busca invalido. Use: ' . implode(', ', self::CAMPOS_BUSCA_PERMITIDOS), 400);
            return;
        }
        if ($valor === '') {
            $this->view->renderErro('Informe o parametro valor', 400);
            return;
        }

        $produtos = $this->model->buscarPor($campo, $valor);
        if (count($produtos) > 0) {
            $this->view->renderListar($produtos);
        } else {
            $this->view->renderErro('Nenhum produto encontrado', 404);
        }
    }

    // POST /produtos
    public function criar(): void
    {
        $dados = $this->getDadosRequisicao();

        if (empty($dados['nome']) || !isset($dados['preco']) || !isset($dados['quantidade'])) {
            $this->view->renderErro('Campos obrigatorios: nome, preco, quantidade', 400);
            return;
        }

        try {
            $this->model->criar([
                'nome' => $dados['nome'],
                'preco' => (float) $dados['preco'],
                'quantidade' => (int) $dados['quantidade'],
            ]);
            $this->view->renderCriar();
        } catch (Exception $e) {
            $this->view->renderErro($e->getMessage(), 500);
        }
    }

    // PUT /produtos/{id}
    public function atualizar(int $id): void
    {
        if (!$this->model->buscar($id)) {
            $this->view->renderErro('Produto nao encontrado', 404);
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

    // DELETE /produtos/{id}
    public function excluir(int $id): void
    {
        if (!$this->model->buscar($id)) {
            $this->view->renderErro('Produto nao encontrado', 404);
            return;
        }

        try {
            $this->model->excluir($id);
            $this->view->renderExcluir();
        } catch (Exception $e) {
            $this->view->renderErro($e->getMessage(), 500);
        }
    }

    public function rotaNaoEncontrada(): void
    {
        $this->view->renderErro('Rota nao encontrada', 404);
    }

    private function getDadosRequisicao(): array
    {
        $json = file_get_contents('php://input');
        $dados = json_decode($json, true);
        return is_array($dados) ? $dados : [];
    }
}
