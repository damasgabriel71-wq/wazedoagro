<?php
class AdminController {

    private function verificarAdmin(): void {
        if (!isset($_SESSION['usuario_tipo']) || $_SESSION['usuario_tipo'] !== 'admin') {
            header('Location: /peres/wazedoagro/public/login');
            exit;
        }
    }

    public function index(): void {
        $this->verificarAdmin();
        require_once BASE_PATH . '/app/Models/Usuario.php';
        $usuarios = (new Usuario())->todos();
        require BASE_PATH . '/app/Views/admin/index.php';
    }

    public function editarUsuario(): void {
        $this->verificarAdmin();
        $id = (int) ($_GET['id'] ?? 0);
        require_once BASE_PATH . '/app/Models/Usuario.php';
        $usuario = (new Usuario())->buscarPorId($id);
        if (!$usuario) { header('Location: /peres/wazedoagro/public/admin'); exit; }
        require BASE_PATH . '/app/Views/admin/editar_usuario.php';
    }

    public function atualizarUsuario(): void {
        $this->verificarAdmin();
        $id       = (int) ($_POST['id']       ?? 0);
        $nome     = trim($_POST['nome']        ?? '');
        $email    = trim($_POST['email']       ?? '');
        $telefone = trim($_POST['telefone']    ?? '');
        $tipo     = trim($_POST['tipo']        ?? 'cliente');

        require_once BASE_PATH . '/app/Models/Usuario.php';
        $model = new Usuario();

        if ($model->emailExiste($email, $id)) {
            $erro = 'Este e-mail já está em uso.';
            $usuario = $model->buscarPorId($id);
            require BASE_PATH . '/app/Views/admin/editar_usuario.php';
            return;
        }

        $model->atualizar($id, $nome, $email, $telefone, $tipo);
        header('Location: /peres/wazedoagro/public/admin?atualizado=1');
        exit;
    }

    public function deletarUsuario(): void {
        $this->verificarAdmin();
        $id = (int) ($_GET['id'] ?? 0);
        if ($id) { (new Usuario())->deletar($id); }
        header('Location: /peres/wazedoagro/public/admin?deletado=1');
        exit;
    }
}