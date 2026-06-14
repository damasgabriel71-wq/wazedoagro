<?php
class Categoria {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function todos(): array {
        return $this->db->query('SELECT * FROM categorias ORDER BY nome')->fetchAll();
    }

    public function buscarPorId(int $id): array|false {
        $stmt = $this->db->prepare('SELECT * FROM categorias WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function criar(string $nome, string $descricao): bool {
        $stmt = $this->db->prepare(
            'INSERT INTO categorias (nome, descricao, criado_em) VALUES (?, ?, NOW())'
        );
        return $stmt->execute([$nome, $descricao]);
    }

    public function atualizar(int $id, string $nome, string $descricao): bool {
        $stmt = $this->db->prepare(
            'UPDATE categorias SET nome = ?, descricao = ? WHERE id = ?'
        );
        return $stmt->execute([$nome, $descricao, $id]);
    }

    public function deletar(int $id): bool {
        $stmt = $this->db->prepare('DELETE FROM categorias WHERE id = ?');
        return $stmt->execute([$id]);
    }
}