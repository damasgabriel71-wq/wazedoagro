<?php
declare(strict_types=1);

namespace Core;

abstract class Controller
{
    /**
     * Renderiza uma view passando dados para ela
     */
    protected function render(string $view, array $data = []): void
    {
        // Disponibiliza as variáveis para a view
        extract($data);

        $viewPath = __DIR__ . '/../app/Views/' . $view . '.php';

        if (!file_exists($viewPath)) {
            http_response_code(404);
            die("View não encontrada: $view");
        }

        require_once $viewPath;
    }

    /**
     * Redireciona para uma URL
     */
    protected function redirect(string $url): void
    {
        header("Location: $url");
        exit;
    }

    /**
     * Retorna JSON (para endpoints de API)
     */
    protected function json(mixed $data, int $status = 200): void
    {
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}
