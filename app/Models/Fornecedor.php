<?php
class Fornecedor {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function todos(): array {
        return $this->db->query('SELECT * FROM fornecedores ORDER BY nome')->fetchAll();
    }

    public function buscarPorId(int $id): array|false {
        $stmt = $this->db->prepare('SELECT * FROM fornecedores WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function criar(string $nome, string $email, string $telefone, string $endereco): bool {
        $stmt = $this->db->prepare(
            'INSERT INTO fornecedores (nome, email, telefone, endereco, criado_em) VALUES (?, ?, ?, ?, NOW())'
        );
        return $stmt->execute([$nome, $email, $telefone, $endereco]);
    }

    public function atualizar(int $id, string $nome, string $email, string $telefone, string $endereco): bool {
        $stmt = $this->db->prepare(
            'UPDATE fornecedores SET nome = ?, email = ?, telefone = ?, endereco = ? WHERE id = ?'
        );
        return $stmt->execute([$nome, $email, $telefone, $endereco, $id]);
    }

    public function deletar(int $id): bool {
        $stmt = $this->db->prepare('DELETE FROM fornecedores WHERE id = ?');
        return $stmt->execute([$id]);
    }
}