<?php

header('Content-Type: application/json; charset=utf-8');

class Controller
{
    public function resposta(array $dados, int $status = 200): void
    {
        http_response_code($status);
        echo json_encode($dados, JSON_PRETTY_PRINT);
    }
}
