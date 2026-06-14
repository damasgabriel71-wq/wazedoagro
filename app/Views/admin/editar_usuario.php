<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário — Agro Power</title>
    <link rel="stylesheet" href="/peres/wazedoagro/public/css/style.css">
</head>
<body style="background: #0a1a0a; color: #f0fdf4;">

<header style="background: #060f06; border-bottom: 1px solid rgba(74,222,128,0.1); padding: 15px 0;">
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 20px; display: flex; justify-content: space-between; align-items: center;">
        <div style="font-size: 1.3rem; font-weight: 800;">
            🌱 <span style="color: #4ade80;">Agro</span> Power <span style="color: #86a88a; font-size: 0.85rem; margin-left: 8px;">Admin</span>
        </div>
        <a href="/peres/wazedoagro/public/admin" style="color: #86a88a; text-decoration: none; font-size: 0.9rem;">
            ← Voltar
        </a>
    </div>
</header>

<main style="max-width: 600px; margin: 40px auto; padding: 0 20px;">
    <div style="background: #0f1f0f; border: 1px solid rgba(74,222,128,0.1); border-radius: 16px; padding: 40px;">

        <h1 style="font-size: 1.3rem; margin-bottom: 30px;">✏️ Editar Usuário</h1>

        <?php if (!empty($erro)): ?>
        <div style="background: rgba(239,68,68,0.1); border: 1px solid #ef4444; color: #f87171; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 0.9rem;">
            <?= htmlspecialchars($erro) ?>
        </div>
        <?php endif; ?>

        <form method="POST" action="/peres/wazedoagro/public/admin/atualizar">
            <input type="hidden" name="id" value="<?= $usuario['id'] ?>">

            <div style="margin-bottom: 18px;">
                <label style="color: #86a88a; font-size: 0.85rem; display: block; margin-bottom: 6px;">Nome</label>
                <input type="text" name="nome" required value="<?= htmlspecialchars($usuario['nome']) ?>"
                    style="width: 100%; padding: 12px; background: #162416; border: 1px solid rgba(74,222,128,0.15); border-radius: 8px; color: #fff; font-size: 0.95rem; outline: none;">
            </div>

            <div style="margin-bottom: 18px;">
                <label style="color: #86a88a; font-size: 0.85rem; display: block; margin-bottom: 6px;">E-mail</label>
                <input type="email" name="email" required value="<?= htmlspecialchars($usuario['email']) ?>"
                    style="width: 100%; padding: 12px; background: #162416; border: 1px solid rgba(74,222,128,0.15); border-radius: 8px; color: #fff; font-size: 0.95rem; outline: none;">
            </div>

            <div style="margin-bottom: 18px;">
                <label style="color: #86a88a; font-size: 0.85rem; display: block; margin-bottom: 6px;">Telefone</label>
                <input type="text" name="telefone" value="<?= htmlspecialchars($usuario['telefone'] ?? '') ?>"
                    style="width: 100%; padding: 12px; background: #162416; border: 1px solid rgba(74,222,128,0.15); border-radius: 8px; color: #fff; font-size: 0.95rem; outline: none;"
                    placeholder="(38) 99999-9999">
            </div>

            <div style="margin-bottom: 28px;">
                <label style="color: #86a88a; font-size: 0.85rem; display: block; margin-bottom: 6px;">Tipo</label>
                <select name="tipo"
                    style="width: 100%; padding: 12px; background: #162416; border: 1px solid rgba(74,222,128,0.15); border-radius: 8px; color: #fff; font-size: 0.95rem; outline: none;">
                    <option value="cliente" <?= $usuario['tipo'] === 'cliente' ? 'selected' : '' ?>>Cliente</option>
                    <option value="admin"   <?= $usuario['tipo'] === 'admin'   ? 'selected' : '' ?>>Admin</option>
                </select>
            </div>

            <button type="submit"
                style="width: 100%; padding: 13px; background: #4ade80; color: #0a1a0a; border: none; border-radius: 8px; font-weight: 700; font-size: 1rem; cursor: pointer;">
                Salvar Alterações
            </button>
        </form>
    </div>
</main>
</body>
</html>