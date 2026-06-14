<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title><?= isset($categoria) ? 'Editar' : 'Nova' ?> Categoria — Agro Power</title>
    <link rel="stylesheet" href="/peres/wazedoagro/public/css/style.css">
</head>
<body style="background: #070a12; color: #ffffff;">

<header style="background: #070a12; border-bottom: 1px solid rgba(255,255,255,0.05); padding: 15px 0;">
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 20px; display: flex; justify-content: space-between; align-items: center;">
        <div style="font-size: 1.3rem; font-weight: 800;">🌱 <span style="color: #00ffaa;">Agro</span> Power</div>
        <a href="/peres/wazedoagro/public/admin/categorias" style="color: #9ca3af; text-decoration: none;">← Categorias</a>
    </div>
</header>

<main style="max-width: 600px; margin: 40px auto; padding: 0 20px;">
    <div style="background: #111827; border: 1px solid rgba(255,255,255,0.05); border-radius: 16px; padding: 40px;">
        <h1 style="font-size: 1.3rem; margin-bottom: 30px;"><?= isset($categoria) ? '✏️ Editar Categoria' : '➕ Nova Categoria' ?></h1>

        <?php if (!empty($erro)): ?>
        <div style="background: rgba(239,68,68,0.1); border: 1px solid #ef4444; color: #f87171; padding: 12px; border-radius: 8px; margin-bottom: 20px;"><?= htmlspecialchars($erro) ?></div>
        <?php endif; ?>

        <form method="POST" action="/peres/wazedoagro/public/admin/categorias/<?= isset($categoria) ? 'atualizar' : 'salvar' ?>">
            <?php if (isset($categoria)): ?>
            <input type="hidden" name="id" value="<?= $categoria['id'] ?>">
            <?php endif; ?>

            <div style="margin-bottom: 18px;">
                <label style="color: #9ca3af; font-size: 0.85rem; display: block; margin-bottom: 6px;">Nome *</label>
                <input type="text" name="nome" required value="<?= htmlspecialchars($categoria['nome'] ?? '') ?>"
                    style="width: 100%; padding: 12px; background: #1f2937; border: 1px solid rgba(255,255,255,0.08); border-radius: 8px; color: #fff; font-size: 0.95rem; outline: none;"
                    placeholder="Ex: Sal para Gado">
            </div>

            <div style="margin-bottom: 28px;">
                <label style="color: #9ca3af; font-size: 0.85rem; display: block; margin-bottom: 6px;">Descrição</label>
                <textarea name="descricao" rows="3"
                    style="width: 100%; padding: 12px; background: #1f2937; border: 1px solid rgba(255,255,255,0.08); border-radius: 8px; color: #fff; font-size: 0.95rem; outline: none; resize: vertical;"
                    placeholder="Descrição da categoria..."><?= htmlspecialchars($categoria['descricao'] ?? '') ?></textarea>
            </div>

            <button type="submit"
                style="width: 100%; padding: 13px; background: #00ffaa; color: #070a12; border: none; border-radius: 8px; font-weight: 700; font-size: 1rem; cursor: pointer;">
                <?= isset($categoria) ? 'Salvar Alterações' : 'Criar Categoria' ?>
            </button>
        </form>
    </div>
</main>
</body>
</html>