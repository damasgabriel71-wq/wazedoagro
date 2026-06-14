<?php
class AuthController {

    public function login(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $senha = trim($_POST['senha'] ?? '');

            if (empty($email) || empty($senha)) {
                $erro = 'Preencha todos os campos.';
                require BASE_PATH . '/app/Views/auth/login.php';
                return;
            }

            require_once BASE_PATH . '/core/Database.php';
            require_once BASE_PATH . '/app/Models/Usuario.php';

            $usuario = new Usuario();
            $dados = $usuario->buscarPorEmail($email);

            if ($dados && password_verify($senha, $dados['senha'])) {
                $_SESSION['usuario_id']   = $dados['id'];
                $_SESSION['usuario_nome'] = $dados['nome'];
                $_SESSION['usuario_tipo'] = $dados['tipo'];

                if ($dados['tipo'] === 'admin') {
                    header('Location: /peres/wazedoagro/public/admin');
                } else {
                    header('Location: /peres/wazedoagro/public/dashboard');
                }
                exit;
            }

            $erro = 'E-mail ou senha incorretos.';
            require BASE_PATH . '/app/Views/auth/login.php';
            return;
        }

        require BASE_PATH . '/app/Views/auth/login.php';
    }

    public function cadastro(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome     = trim($_POST['nome']     ?? '');
            $email    = trim($_POST['email']    ?? '');
            $telefone = trim($_POST['telefone'] ?? '');
            $senha    = trim($_POST['senha']    ?? '');
            $confirma = trim($_POST['confirma'] ?? '');

            if (empty($nome) || empty($email) || empty($senha)) {
                $erro = 'Preencha todos os campos obrigatórios.';
                require BASE_PATH . '/app/Views/auth/cadastro.php';
                return;
            }

            if ($senha !== $confirma) {
                $erro = 'As senhas não coincidem.';
                require BASE_PATH . '/app/Views/auth/cadastro.php';
                return;
            }

            require_once BASE_PATH . '/core/Database.php';
            require_once BASE_PATH . '/app/Models/Usuario.php';

            $usuario = new Usuario();

            if ($usuario->emailExiste($email)) {
                $erro = 'Este e-mail já está cadastrado.';
                require BASE_PATH . '/app/Views/auth/cadastro.php';
                return;
            }

            $usuario->criar($nome, $email, $telefone, $senha);
            header('Location: /peres/wazedoagro/public/login?cadastro=sucesso');
            exit;
        }

        require BASE_PATH . '/app/Views/auth/cadastro.php';
    }

    public function logout(): void {
        session_destroy();
        header('Location: /peres/wazedoagro/public');
        exit;
    }
}