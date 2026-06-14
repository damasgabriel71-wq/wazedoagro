<?php
class Produto {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function todos(bool $apenasAtivos = true): array {
        $sql = 'SELECT * FROM produtos';
        if ($apenasAtivos) $sql .= ' WHERE ativo = 1';
        $sql .= ' ORDER BY categoria, nome';
        return $this->db->query($sql)->fetchAll();
    }

    public function buscar(string $termo): array {
        $stmt = $this->db->prepare(
            'SELECT * FROM produtos WHERE ativo = 1 AND (nome LIKE ? OR descricao LIKE ?) ORDER BY categoria, nome'
        );
        $stmt->execute(["%$termo%", "%$termo%"]);
        return $stmt->fetchAll();
    }

    public function buscarPorId(int $id): array|false {
        $stmt = $this->db->prepare('SELECT * FROM produtos WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function criar(string $nome, string $categoria, float $preco, int $estoque, string $descricao): bool {
        $stmt = $this->db->prepare(
            'INSERT INTO produtos (nome, categoria, preco, estoque, descricao, criado_em) VALUES (?, ?, ?, ?, ?, NOW())'
        );
        return $stmt->execute([$nome, $categoria, $preco, $estoque, $descricao]);
    }

    public function atualizar(int $id, string $nome, string $categoria, float $preco, int $estoque, string $descricao, int $ativo): bool {
        $stmt = $this->db->prepare(
            'UPDATE produtos SET nome = ?, categoria = ?, preco = ?, estoque = ?, descricao = ?, ativo = ? WHERE id = ?'
        );
        return $stmt->execute([$nome, $categoria, $preco, $estoque, $descricao, $ativo, $id]);
    }

    public function descontarEstoque(int $id, int $quantidade): bool {
        $stmt = $this->db->prepare(
            'UPDATE produtos SET estoque = estoque - ? WHERE id = ? AND estoque >= ?'
        );
        return $stmt->execute([$quantidade, $id, $quantidade]);
    }

    public function deletar(int $id): bool {
        $stmt = $this->db->prepare('DELETE FROM produtos WHERE id = ?');
        return $stmt->execute([$id]);
    }
}

