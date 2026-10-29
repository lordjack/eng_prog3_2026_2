<?php

header('Content-Type: application/json; charset=utf-8');

class JSON
{
    public function resposta(array $dados, int $status = 200): void
    {
        http_response_code($status);
        echo json_encode($dados, JSON_PRETTY_PRINT);
    }

    public function respostaError(string $erro, int $status = 400): void
    {
        $this->resposta(
            [
                'sucesso' => false,
                'erro' => $erro,
            ],
            $status
        );
    }

    public function getData()
    {
        $json = file_get_contents('php://input');
        $dados = json_decode($json, true);
        return is_array($dados) ? $dados : [];
    }
}
