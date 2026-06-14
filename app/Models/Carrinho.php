<?php
class Carrinho {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function adicionar(int $usuarioId, int $produtoId, int $quantidade): bool {
        // Se já existe, atualiza quantidade
        $stmt = $this->db->prepare(
            'SELECT id, quantidade FROM carrinho WHERE usuario_id = ? AND produto_id = ?'
        );
        $stmt->execute([$usuarioId, $produtoId]);
        $item = $stmt->fetch();

        if ($item) {
            $stmt = $this->db->prepare(
                'UPDATE carrinho SET quantidade = quantidade + ? WHERE id = ?'
            );
            return $stmt->execute([$quantidade, $item['id']]);
        }

        $stmt = $this->db->prepare(
            'INSERT INTO carrinho (usuario_id, produto_id, quantidade, criado_em) VALUES (?, ?, ?, NOW())'
        );
        return $stmt->execute([$usuarioId, $produtoId, $quantidade]);
    }

    public function buscarPorUsuario(int $usuarioId): array {
        $stmt = $this->db->prepare(
            'SELECT c.*, p.nome, p.preco, p.estoque, p.categoria
             FROM carrinho c
             JOIN produtos p ON p.id = c.produto_id
             WHERE c.usuario_id = ?'
        );
        $stmt->execute([$usuarioId]);
        return $stmt->fetchAll();
    }

    public function remover(int $id, int $usuarioId): bool {
        $stmt = $this->db->prepare(
            'DELETE FROM carrinho WHERE id = ? AND usuario_id = ?'
        );
        return $stmt->execute([$id, $usuarioId]);
    }

    public function limpar(int $usuarioId): bool {
        $stmt = $this->db->prepare('DELETE FROM carrinho WHERE usuario_id = ?');
        return $stmt->execute([$usuarioId]);
    }

    public function total(int $usuarioId): float {
        $stmt = $this->db->prepare(
            'SELECT SUM(c.quantidade * p.preco) as total
             FROM carrinho c
             JOIN produtos p ON p.id = c.produto_id
             WHERE c.usuario_id = ?'
        );
        $stmt->execute([$usuarioId]);
        return (float) ($stmt->fetch()['total'] ?? 0);
    }

    public function contar(int $usuarioId): int {
        $stmt = $this->db->prepare(
            'SELECT SUM(quantidade) as total FROM carrinho WHERE usuario_id = ?'
        );
        $stmt->execute([$usuarioId]);
        return (int) ($stmt->fetch()['total'] ?? 0);
    }
}