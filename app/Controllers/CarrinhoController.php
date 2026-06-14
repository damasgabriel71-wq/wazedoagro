<?php
class CarrinhoController {

    public function adicionar(): void {
        $produtoId  = (int) ($_POST['produto_id'] ?? 0);
        $quantidade = (int) ($_POST['quantidade'] ?? 1);

        // Se não está logado, salva na sessão e redireciona para login
        if (!isset($_SESSION['usuario_id'])) {
            $_SESSION['carrinho_pendente'] = [
                'produto_id' => $produtoId,
                'quantidade' => $quantidade,
            ];
            header('Location: /peres/wazedoagro/public/login?redirect=carrinho');
            exit;
        }

        require_once BASE_PATH . '/app/Models/Carrinho.php';
        require_once BASE_PATH . '/app/Models/Produto.php';

        $produto = (new Produto())->buscarPorId($produtoId);
        if (!$produto || $produto['estoque'] < $quantidade) {
            header('Location: /peres/wazedoagro/public/carrinho?erro=estoque');
            exit;
        }

        (new Carrinho())->adicionar($_SESSION['usuario_id'], $produtoId, $quantidade);
        header('Location: /peres/wazedoagro/public/carrinho?adicionado=1');
        exit;
    }

    public function index(): void {
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: /peres/wazedoagro/public/login?redirect=carrinho');
            exit;
        }

        // Processa carrinho pendente (veio da página inicial sem login)
        if (isset($_SESSION['carrinho_pendente'])) {
            require_once BASE_PATH . '/app/Models/Carrinho.php';
            require_once BASE_PATH . '/app/Models/Produto.php';
            $p = $_SESSION['carrinho_pendente'];
            $produto = (new Produto())->buscarPorId($p['produto_id']);
            if ($produto && $produto['estoque'] >= $p['quantidade']) {
                (new Carrinho())->adicionar($_SESSION['usuario_id'], $p['produto_id'], $p['quantidade']);
            }
            unset($_SESSION['carrinho_pendente']);
        }

        require_once BASE_PATH . '/app/Models/Carrinho.php';
        $carrinho = new Carrinho();
        $itens    = $carrinho->buscarPorUsuario($_SESSION['usuario_id']);
        $total    = $carrinho->total($_SESSION['usuario_id']);
        require BASE_PATH . '/app/Views/carrinho/index.php';
    }

    public function remover(): void {
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: /peres/wazedoagro/public/login');
            exit;
        }
        $id = (int) ($_GET['id'] ?? 0);
        require_once BASE_PATH . '/app/Models/Carrinho.php';
        (new Carrinho())->remover($id, $_SESSION['usuario_id']);
        header('Location: /peres/wazedoagro/public/carrinho');
        exit;
    }

    public function finalizar(): void {
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: /peres/wazedoagro/public/login?redirect=carrinho');
            exit;
        }

        require_once BASE_PATH . '/app/Models/Carrinho.php';
        require_once BASE_PATH . '/app/Models/Pedido.php';
        require_once BASE_PATH . '/app/Models/Produto.php';

        $carrinho = new Carrinho();
        $itens    = $carrinho->buscarPorUsuario($_SESSION['usuario_id']);

        if (empty($itens)) {
            header('Location: /peres/wazedoagro/public/carrinho?erro=vazio');
            exit;
        }

        $modelProduto = new Produto();
        $modelPedido  = new Pedido();

        foreach ($itens as $item) {
            $produto = $modelProduto->buscarPorId($item['produto_id']);
            if ($produto && $produto['estoque'] >= $item['quantidade']) {
                $modelPedido->criar(
                    $_SESSION['usuario_id'],
                    $item['nome'],
                    $item['quantidade'],
                    ''
                );
                $modelProduto->descontarEstoque($item['produto_id'], $item['quantidade']);
            }
        }

        $carrinho->limpar($_SESSION['usuario_id']);
        header('Location: /peres/wazedoagro/public/pedidos?sucesso=1');
        exit;
    }
}