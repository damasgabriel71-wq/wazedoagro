<?php
class CategoriaController {

    private function verificarAdmin(): void {
        if (!isset($_SESSION['usuario_tipo']) || $_SESSION['usuario_tipo'] !== 'admin') {
            header('Location: /peres/wazedoagro/public/login');
            exit;
        }
    }

    public function index(): void {
        $this->verificarAdmin();
        require_once BASE_PATH . '/app/Models/Categoria.php';
        $categorias = (new Categoria())->todos();
        require BASE_PATH . '/app/Views/admin/categorias.php';
    }

    public function criar(): void {
        $this->verificarAdmin();
        require BASE_PATH . '/app/Views/admin/categoria_form.php';
    }

    public function salvar(): void {
        $this->verificarAdmin();
        $nome      = trim($_POST['nome']      ?? '');
        $descricao = trim($_POST['descricao'] ?? '');

        if (empty($nome)) {
            $erro = 'O nome é obrigatório.';
            require BASE_PATH . '/app/Views/admin/categoria_form.php';
            return;
        }

        require_once BASE_PATH . '/app/Models/Categoria.php';
        (new Categoria())->criar($nome, $descricao);
        header('Location: /peres/wazedoagro/public/admin/categorias?criado=1');
        exit;
    }

    public function editar(): void {
        $this->verificarAdmin();
        $id = (int) ($_GET['id'] ?? 0);
        require_once BASE_PATH . '/app/Models/Categoria.php';
        $categoria = (new Categoria())->buscarPorId($id);
        if (!$categoria) { header('Location: /peres/wazedoagro/public/admin/categorias'); exit; }
        require BASE_PATH . '/app/Views/admin/categoria_form.php';
    }

    public function atualizar(): void {
        $this->verificarAdmin();
        $id        = (int) ($_POST['id']        ?? 0);
        $nome      = trim($_POST['nome']         ?? '');
        $descricao = trim($_POST['descricao']    ?? '');

        require_once BASE_PATH . '/app/Models/Categoria.php';
        (new Categoria())->atualizar($id, $nome, $descricao);
        header('Location: /peres/wazedoagro/public/admin/categorias?atualizado=1');
        exit;
    }

    public function deletar(): void {
        $this->verificarAdmin();
        $id = (int) ($_GET['id'] ?? 0);
        if ($id) {
            require_once BASE_PATH . '/app/Models/Categoria.php';
            (new Categoria())->deletar($id);
        }
        header('Location: /peres/wazedoagro/public/admin/categorias?deletado=1');
        exit;
    }
}