<?php

// controller/UsuarioController.php

require_once __DIR__ . '/../model/Usuario.php';
require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../view/usuario_json.php';

class UsuarioController extends Controller
{
    private Usuario $model;
    private UsuarioJsonView $view;

    public function __construct()
    {
        $this->model = new Usuario();
        $this->view = new UsuarioJsonView();
    }

    // GET /usuarios
    public function listar(): void
    {
        $usuarios = $this->model->listar();
        $this->view->renderListar($usuarios);
    }

    // GET /usuarios/{id}
    public function buscar(int $id): void
    {
        $usuario = $this->model->buscar($id);
        if ($usuario) {
            $this->view->renderBuscar($usuario);
        } else {
            $this->view->renderErro('Usuario nao encontrado', 404);
        }
    }

    // POST /usuarios
    public function criar(): void
    {
        $dados = $this->getDadosRequisicao();

        if (empty($dados['nome']) || empty($dados['email'])) {
            $this->view->renderErro('Campos obrigatorios: nome, email', 400);
            return;
        }

        if (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
            $this->view->renderErro('Email invalido', 400);
            return;
        }

        try {
            $this->model->criar([
                'nome' => $dados['nome'],
                'email' => $dados['email'],
                'telefone' => $dados['telefone'] ?? null,
                'ativo' => isset($dados['ativo']) ? (int) $dados['ativo'] : 1,
            ]);
            $this->view->renderCriar();
        } catch (Exception $e) {
            $this->view->renderErro($e->getMessage(), 500);
        }
    }

    // PUT /usuarios/{id}
    public function atualizar(int $id): void
    {
        if (!$this->model->buscar($id)) {
            $this->view->renderErro('Usuario nao encontrado', 404);
            return;
        }

        $dados = $this->getDadosRequisicao();

        if (empty($dados)) {
            $this->view->renderErro('Nenhum dado enviado para atualizacao', 400);
            return;
        }

        if (isset($dados['email']) && !filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
            $this->view->renderErro('Email invalido', 400);
            return;
        }

        try {
            if (isset($dados['ativo'])) {
                $dados['ativo'] = (int) $dados['ativo'];
            }
            $this->model->atualizar($id, $dados);
            $this->view->renderAtualizar();
        } catch (Exception $e) {
            $this->view->renderErro($e->getMessage(), 500);
        }
    }

    // DELETE /usuarios/{id}
    public function excluir(int $id): void
    {
        if (!$this->model->buscar($id)) {
            $this->view->renderErro('Usuario nao encontrado', 404);
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
