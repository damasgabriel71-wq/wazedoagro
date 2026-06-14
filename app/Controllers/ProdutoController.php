<?php
class ProdutoController {

    private function verificarAdmin(): void {
        if (!isset($_SESSION['usuario_tipo']) || $_SESSION['usuario_tipo'] !== 'admin') {
            header('Location: /peres/wazedoagro/public/login');
            exit;
        }
    }

    public function index(): void {
        $this->verificarAdmin();
        require_once BASE_PATH . '/app/Models/Produto.php';
        $produtos = (new Produto())->todos(false);
        require BASE_PATH . '/app/Views/admin/produtos.php';
    }

    public function criar(): void {
        $this->verificarAdmin();
        require BASE_PATH . '/app/Views/admin/produto_form.php';
    }

    public function salvar(): void {
        $this->verificarAdmin();
        $nome      = trim($_POST['nome']      ?? '');
        $categoria = trim($_POST['categoria'] ?? '');
        $preco     = (float) str_replace(',', '.', $_POST['preco'] ?? 0);
        $estoque   = (int) ($_POST['estoque']   ?? 0);
        $descricao = trim($_POST['descricao'] ?? '');

        if (empty($nome) || empty($categoria)) {
            $erro = 'Preencha todos os campos obrigatórios.';
            require BASE_PATH . '/app/Views/admin/produto_form.php';
            return;
        }

        require_once BASE_PATH . '/app/Models/Produto.php';
        (new Produto())->criar($nome, $categoria, $preco, $estoque, $descricao);
        header('Location: /peres/wazedoagro/public/admin/produtos?criado=1');
        exit;
    }

    public function editar(): void {
        $this->verificarAdmin();
        $id = (int) ($_GET['id'] ?? 0);
        require_once BASE_PATH . '/app/Models/Produto.php';
        $produto = (new Produto())->buscarPorId($id);
        if (!$produto) { header('Location: /peres/wazedoagro/public/admin/produtos'); exit; }
        require BASE_PATH . '/app/Views/admin/produto_form.php';
    }

    public function atualizar(): void {
        $this->verificarAdmin();
        $id        = (int) ($_POST['id']        ?? 0);
        $nome      = trim($_POST['nome']         ?? '');
        $categoria = trim($_POST['categoria']    ?? '');
        $preco     = (float) str_replace(',', '.', $_POST['preco'] ?? 0);
        $estoque   = (int) ($_POST['estoque']    ?? 0);
        $descricao = trim($_POST['descricao']    ?? '');
        $ativo     = (int) ($_POST['ativo']      ?? 1);

        require_once BASE_PATH . '/app/Models/Produto.php';
        (new Produto())->atualizar($id, $nome, $categoria, $preco, $estoque, $descricao, $ativo);
        header('Location: /peres/wazedoagro/public/admin/produtos?atualizado=1');
        exit;
    }

    public function deletar(): void {
        $this->verificarAdmin();
        $id = (int) ($_GET['id'] ?? 0);
        if ($id) {
            require_once BASE_PATH . '/app/Models/Produto.php';
            (new Produto())->deletar($id);
        }
        header('Location: /peres/wazedoagro/public/admin/produtos?deletado=1');
        exit;
    }
}