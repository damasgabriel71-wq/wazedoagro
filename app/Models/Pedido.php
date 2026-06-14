<?php
class Pedido {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function criar(int $usuarioId, string $produto, int $quantidade, string $observacao = ''): bool {
        $stmt = $this->db->prepare(
            'INSERT INTO pedidos (usuario_id, produto, quantidade, observacao, criado_em) VALUES (?, ?, ?, ?, NOW())'
        );
        return $stmt->execute([$usuarioId, $produto, $quantidade, $observacao]);
    }

    public function buscarPorUsuario(int $usuarioId): array {
        $stmt = $this->db->prepare(
            'SELECT * FROM pedidos WHERE usuario_id = ? ORDER BY criado_em DESC'
        );
        $stmt->execute([$usuarioId]);
        return $stmt->fetchAll();
    }

    public function todos(): array {
        $stmt = $this->db->prepare(
            'SELECT p.*, u.nome as cliente FROM pedidos p 
             JOIN usuarios u ON u.id = p.usuario_id 
             ORDER BY p.criado_em DESC'
        );
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function atualizarStatus(int $id, string $status): bool {
        $stmt = $this->db->prepare('UPDATE pedidos SET status = ? WHERE id = ?');
        return $stmt->execute([$status, $id]);
    }

    public function deletar(int $id): bool {
        $stmt = $this->db->prepare('DELETE FROM pedidos WHERE id = ?');
        return $stmt->execute([$id]);
    }
}