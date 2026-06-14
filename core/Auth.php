<?php
namespace Core;

class Auth {
    public static function check(): bool {
        return isset($_SESSION['usuario_id']);
    }

    public static function usuario(): array {
        return [
            'id'   => $_SESSION['usuario_id']   ?? null,
            'nome' => $_SESSION['usuario_nome'] ?? null,
        ];
    }

    public static function exigirLogin(): void {
        if (!self::check()) {
            header('Location: /peres/wazedoagro/public/login');
            exit;
        }
    }
}