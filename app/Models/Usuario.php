<?php
class Usuario {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function buscarPorEmail(string $email): array|false {
        $stmt = $this->db->prepare('SELECT * FROM usuarios WHERE email = ?');
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    public function buscarPorId(int $id): array|false {
        $stmt = $this->db->prepare('SELECT * FROM usuarios WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function todos(): array {
        return $this->db->query('SELECT * FROM usuarios ORDER BY criado_em DESC')->fetchAll();
    }

    public function criar(string $nome, string $email, string $telefone, string $senha, string $tipo = 'cliente'): bool {
        $hash = password_hash($senha, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare(
            'INSERT INTO usuarios (nome, email, telefone, senha, tipo, criado_em) VALUES (?, ?, ?, ?, ?, NOW())'
        );
        return $stmt->execute([$nome, $email, $telefone, $hash, $tipo]);
    }

    public function atualizar(int $id, string $nome, string $email, string $telefone, string $tipo): bool {
        $stmt = $this->db->prepare(
            'UPDATE usuarios SET nome = ?, email = ?, telefone = ?, tipo = ? WHERE id = ?'
        );
        return $stmt->execute([$nome, $email, $telefone, $tipo, $id]);
    }

    public function deletar(int $id): bool {
        $stmt = $this->db->prepare('DELETE FROM usuarios WHERE id = ?');
        return $stmt->execute([$id]);
    }

    public function emailExiste(string $email, ?int $ignorarId = null): bool {
        if ($ignorarId) {
            $stmt = $this->db->prepare('SELECT id FROM usuarios WHERE email = ? AND id != ?');
            $stmt->execute([$email, $ignorarId]);
        } else {
            $stmt = $this->db->prepare('SELECT id FROM usuarios WHERE email = ?');
            $stmt->execute([$email]);
        }
        return (bool) $stmt->fetch();
    }
}