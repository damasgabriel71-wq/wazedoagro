<?php
declare(strict_types=1);

namespace App\Models;

use Core\Model;

class Fazenda extends Model
{
    protected string $table = 'fazendas';

    private string $nome;
    private array $piquetes = [];

    public function __construct()
    {
        parent::__construct();
    }

    public function findByUsuario(int $userId): array
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM {$this->table} WHERE usuario_id = ? ORDER BY nome"
        );
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }

    public function criar(string $nome, int $userId): int|false
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO {$this->table} (nome, usuario_id, created_at)
             VALUES (?, ?, NOW())"
        );
        $stmt->execute([$nome, $userId]);
        return (int) $this->pdo->lastInsertId();
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function adicionarPiquete(\App\Models\Piquete $piquete): void
    {
        $this->piquetes[] = $piquete;
    }

    public function getPiquetes(): array
    {
        return $this->piquetes;
    }
}
