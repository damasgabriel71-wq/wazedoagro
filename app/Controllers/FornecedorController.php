<?php
class FornecedorController {

    private function verificarAdmin(): void {
        if (!isset($_SESSION['usuario_tipo']) || $_SESSION['usuario_tipo'] !== 'admin') {
            header('Location: /peres/wazedoagro/public/login');
            exit;
        }
    }

    public function index(): void {
        $this->verificarAdmin();
        require_once BASE_PATH . '/app/Models/Fornecedor.php';
        $fornecedores = (new Fornecedor())->todos();
        require BASE_PATH . '/app/Views/admin/fornecedores.php';
    }

    public function criar(): void {
        $this->verificarAdmin();
        require BASE_PATH . '/app/Views/admin/fornecedor_form.php';
    }

    public function salvar(): void {
        $this->verificarAdmin();
        $nome      = trim($_POST['nome']      ?? '');
        $email     = trim($_POST['email']     ?? '');
        $telefone  = trim($_POST['telefone']  ?? '');
        $endereco  = trim($_POST['endereco']  ?? '');

        if (empty($nome)) {
            $erro = 'O nome é obrigatório.';
            require BASE_PATH . '/app/Views/admin/fornecedor_form.php';
            return;
        }

        require_once BASE_PATH . '/app/Models/Fornecedor.php';
        (new Fornecedor())->criar($nome, $email, $telefone, $endereco);
        header('Location: /peres/wazedoagro/public/admin/fornecedores?criado=1');
        exit;
    }

    public function editar(): void {
        $this->verificarAdmin();
        $id = (int) ($_GET['id'] ?? 0);
        require_once BASE_PATH . '/app/Models/Fornecedor.php';
        $fornecedor = (new Fornecedor())->buscarPorId($id);
        if (!$fornecedor) { header('Location: /peres/wazedoagro/public/admin/fornecedores'); exit; }
        require BASE_PATH . '/app/Views/admin/fornecedor_form.php';
    }

    public function atualizar(): void {
        $this->verificarAdmin();
        $id       = (int) ($_POST['id']       ?? 0);
        $nome     = trim($_POST['nome']        ?? '');
        $email    = trim($_POST['email']       ?? '');
        $telefone = trim($_POST['telefone']    ?? '');
        $endereco = trim($_POST['endereco']    ?? '');

        require_once BASE_PATH . '/app/Models/Fornecedor.php';
        (new Fornecedor())->atualizar($id, $nome, $email, $telefone, $endereco);
        header('Location: /peres/wazedoagro/public/admin/fornecedores?atualizado=1');
        exit;
    }

    public function deletar(): void {
        $this->verificarAdmin();
        $id = (int) ($_GET['id'] ?? 0);
        if ($id) {
            require_once BASE_PATH . '/app/Models/Fornecedor.php';
            (new Fornecedor())->deletar($id);
        }
        header('Location: /peres/wazedoagro/public/admin/fornecedores?deletado=1');
        exit;
    }
}