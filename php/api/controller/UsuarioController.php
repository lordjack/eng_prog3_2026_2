<?php

// controllers/UsuarioController.php

require_once 'model/Usuario.php';
require_once 'JSON.php';

class UsuarioController extends JSON
{
    private Usuario $model;

    public function __construct()
    {
        $this->model = new Usuario();
    }

    public function criar(): void
    {
        try {
            $dados = $this->getData();

            if (
                empty($dados['nome']) ||
                !isset($dados['email']) ||
                !isset($dados['telefone'])
            ) {
                $this->respostaError(
                    'Campos obrigatórios: nome, preço, quantidade',
                    400
                );
                return;
            }

            $this->model->criar($dados);

            $this->resposta([
                'sucesso' => true,
                'dados' => 'Criado com sucesso!',
            ]);
        } catch (Exception $e) {
            $this->respostaError($e->getMessage());
        }
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
        $usuarios = $this->model->listar();
        $this->resposta(['sucesso' => true, 'dados' => $usuarios]);
    }

    public function buscarPor(): void
    {
        $campo = $_GET['campo'];
        $valor = $_GET['valor'];

        $usuario = $this->model->buscarPor($campo, $valor);

        if ($usuario) {
            $this->resposta(['sucesso' => true, 'dados' => $usuario]);
        } else {
            $this->resposta(
                [
                    'sucesso' => false,
                    'erro' => 'Usuario nao encontrado',
                ],
                404
            );
        }
    }

    public function buscar(int $id): void
    {
        $usuario = $this->model->buscar($id);
        if ($usuario) {
            $this->resposta(['sucesso' => true, 'dados' => $usuario]);
        } else {
            $this->resposta(
                [
                    'sucesso' => false,
                    'erro' => 'Usuario nao encontrado',
                ],
                404
            );
        }
    }
}
