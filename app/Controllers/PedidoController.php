<?php
class PedidoController {

    private function verificarLogin(): void {
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: /peres/wazedoagro/public/login');
            exit;
        }
    }

    public function index(): void {
        $this->verificarLogin();
        require_once BASE_PATH . '/app/Models/Pedido.php';
        $pedidos = (new Pedido())->buscarPorUsuario($_SESSION['usuario_id']);
        require BASE_PATH . '/app/Views/pedidos/index.php';
    }

    public function criar(): void {
        $this->verificarLogin();
        require_once BASE_PATH . '/app/Models/Produto.php';
        require BASE_PATH . '/app/Views/pedidos/criar.php';
    }

    public function salvar(): void {
        $this->verificarLogin();
        $produtoId  = (int) ($_POST['produto_id'] ?? 0);
        $quantidade = (int) ($_POST['quantidade'] ?? 1);
        $observacao = trim($_POST['observacao'] ?? '');

        if (!$produtoId) {
            $erro = 'Selecione um produto.';
            require_once BASE_PATH . '/app/Models/Produto.php';
            require BASE_PATH . '/app/Views/pedidos/criar.php';
            return;
        }

        require_once BASE_PATH . '/app/Models/Produto.php';
        require_once BASE_PATH . '/app/Models/Pedido.php';

        $modelProduto = new Produto();
        $produto = $modelProduto->buscarPorId($produtoId);

        if (!$produto || $produto['estoque'] < $quantidade) {
            $erro = 'Produto indisponível ou estoque insuficiente.';
            require BASE_PATH . '/app/Views/pedidos/criar.php';
            return;
        }

        (new Pedido())->criar($_SESSION['usuario_id'], $produto['nome'], $quantidade, $observacao);
        $modelProduto->descontarEstoque($produtoId, $quantidade);

        header('Location: /peres/wazedoagro/public/pedidos?sucesso=1');
        exit;
    }

    public function adminIndex(): void {
        if ($_SESSION['usuario_tipo'] !== 'admin') {
            header('Location: /peres/wazedoagro/public/login');
            exit;
        }
        require_once BASE_PATH . '/app/Models/Pedido.php';
        $pedidos = (new Pedido())->todos();
        require BASE_PATH . '/app/Views/admin/pedidos.php';
    }

    public function atualizarStatus(): void {
        if ($_SESSION['usuario_tipo'] !== 'admin') {
            header('Location: /peres/wazedoagro/public/login');
            exit;
        }
        $id     = (int) ($_POST['id']     ?? 0);
        $status = trim($_POST['status']   ?? '');
        require_once BASE_PATH . '/app/Models/Pedido.php';
        (new Pedido())->atualizarStatus($id, $status);
        header('Location: /peres/wazedoagro/public/admin/pedidos?atualizado=1');
        exit;
    }
}