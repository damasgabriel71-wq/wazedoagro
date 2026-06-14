<?php
class DashboardController {
    public function index(): void {
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: /peres/wazedoagro/public/login');
            exit;
        }
        $nome = $_SESSION['usuario_nome'];
        require_once BASE_PATH . '/app/Views/dashboard/index.php';
    }
}