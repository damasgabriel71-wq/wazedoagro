<?php
declare(strict_types=1);

namespace App\Models;

use Core\Model;

class Piquete extends Model
{
    protected string $table = 'piquetes';

    public function findByFazenda(int $fazendaId): array
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM {$this->table} WHERE fazenda_id = ? ORDER BY nome"
        );
        $stmt->execute([$fazendaId]);
        return $stmt->fetchAll();
    }

    public function criar(array $dados): int|false
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO {$this->table} (nome, area_hectares, fazenda_id, created_at)
             VALUES (:nome, :area, :fazenda_id, NOW())"
        );
        $stmt->execute([
            ':nome'       => $dados['nome'],
            ':area'       => $dados['area_hectares'],
            ':fazenda_id' => $dados['fazenda_id'],
        ]);
        return (int) $this->pdo->lastInsertId();
    }
}
