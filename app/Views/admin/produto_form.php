<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title><?= isset($produto) ? 'Editar' : 'Novo' ?> Produto — Agro Power</title>
    <link rel="stylesheet" href="/peres/wazedoagro/public/css/style.css">
</head>
<body style="background: #070a12; color: #ffffff;">

<header style="background: #070a12; border-bottom: 1px solid rgba(255,255,255,0.05); padding: 15px 0;">
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 20px; display: flex; justify-content: space-between; align-items: center;">
        <div style="font-size: 1.3rem; font-weight: 800;">
            🌱 <span style="color: #00ffaa;">Agro</span> Power <span style="color: #9ca3af; font-size: 0.85rem; margin-left: 8px;">Admin</span>
        </div>
        <a href="/peres/wazedoagro/public/admin/produtos" style="color: #9ca3af; text-decoration: none; font-size: 0.9rem;">← Produtos</a>
    </div>
</header>

<main style="max-width: 600px; margin: 40px auto; padding: 0 20px;">
    <div style="background: #111827; border: 1px solid rgba(255,255,255,0.05); border-radius: 16px; padding: 40px;">

        <h1 style="font-size: 1.3rem; margin-bottom: 30px;">
            <?= isset($produto) ? '✏️ Editar Produto' : '➕ Novo Produto' ?>
        </h1>

        <?php if (!empty($erro)): ?>
        <div style="background: rgba(239,68,68,0.1); border: 1px solid #ef4444; color: #f87171; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 0.9rem;">
            <?= htmlspecialchars($erro) ?>
        </div>
        <?php endif; ?>

        <form method="POST" action="/peres/wazedoagro/public/admin/produtos/<?= isset($produto) ? 'atualizar' : 'salvar' ?>">
            <?php if (isset($produto)): ?>
            <input type="hidden" name="id" value="<?= $produto['id'] ?>">
            <?php endif; ?>

            <div style="margin-bottom: 18px;">
                <label style="color: #9ca3af; font-size: 0.85rem; display: block; margin-bottom: 6px;">Nome do Produto *</label>
                <input type="text" name="nome" required value="<?= htmlspecialchars($produto['nome'] ?? '') ?>"
                    style="width: 100%; padding: 12px; background: #1f2937; border: 1px solid rgba(255,255,255,0.08); border-radius: 8px; color: #fff; font-size: 0.95rem; outline: none;"
                    placeholder="Ex: Sal Mineral Proteinado">
            </div>

            <div style="margin-bottom: 18px;">
                <label style="color: #9ca3af; font-size: 0.85rem; display: block; margin-bottom: 6px;">Categoria *</label>
                <select name="categoria" required
                    style="width: 100%; padding: 12px; background: #1f2937; border: 1px solid rgba(255,255,255,0.08); border-radius: 8px; color: #fff; font-size: 0.95rem; outline: none;">
                    <option value="">Selecione...</option>
                    <option value="sal_gado" <?= ($produto['categoria'] ?? '') === 'sal_gado' ? 'selected' : '' ?>>🐄 Sal para Gado</option>
                    <option value="equinos"  <?= ($produto['categoria'] ?? '') === 'equinos'  ? 'selected' : '' ?>>🐴 Equinos</option>
                    <option value="capim"    <?= ($produto['categoria'] ?? '') === 'capim'    ? 'selected' : '' ?>>🌿 Capim</option>
                </select>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 18px;">
                <div>
                    <label style="color: #9ca3af; font-size: 0.85rem; display: block; margin-bottom: 6px;">Preço (R$) *</label>
                    <input type="text" name="preco" required value="<?= number_format($produto['preco'] ?? 0, 2, ',', '') ?>"
                        style="width: 100%; padding: 12px; background: #1f2937; border: 1px solid rgba(255,255,255,0.08); border-radius: 8px; color: #fff; font-size: 0.95rem; outline: none;"
                        placeholder="0,00">
                </div>
                <div>
                    <label style="color: #9ca3af; font-size: 0.85rem; display: block; margin-bottom: 6px;">Estoque *</label>
                    <input type="number" name="estoque" required min="0" value="<?= $produto['estoque'] ?? 0 ?>"
                        style="width: 100%; padding: 12px; background: #1f2937; border: 1px solid rgba(255,255,255,0.08); border-radius: 8px; color: #fff; font-size: 0.95rem; outline: none;">
                </div>
            </div>

            <div style="margin-bottom: 18px;">
                <label style="color: #9ca3af; font-size: 0.85rem; display: block; margin-bottom: 6px;">Descrição</label>
                <textarea name="descricao" rows="3"
                    style="width: 100%; padding: 12px; background: #1f2937; border: 1px solid rgba(255,255,255,0.08); border-radius: 8px; color: #fff; font-size: 0.95rem; outline: none; resize: vertical;"
                    placeholder="Descrição do produto..."><?= htmlspecialchars($produto['descricao'] ?? '') ?></textarea>
            </div>

            <?php if (isset($produto)): ?>
            <div style="margin-bottom: 28px;">
                <label style="color: #9ca3af; font-size: 0.85rem; display: block; margin-bottom: 6px;">Status</label>
                <select name="ativo"
                    style="width: 100%; padding: 12px; background: #1f2937; border: 1px solid rgba(255,255,255,0.08); border-radius: 8px; color: #fff; font-size: 0.95rem; outline: none;">
                    <option value="1" <?= $produto['ativo'] ? 'selected' : '' ?>>Ativo</option>
                    <option value="0" <?= !$produto['ativo'] ? 'selected' : '' ?>>Inativo</option>
                </select>
            </div>
            <?php endif; ?>

            <button type="submit"
                style="width: 100%; padding: 13px; background: #00ffaa; color: #070a12; border: none; border-radius: 8px; font-weight: 700; font-size: 1rem; cursor: pointer;">
                <?= isset($produto) ? 'Salvar Alterações' : 'Criar Produto' ?>
            </button>
        </form>
    </div>
</main>
</body>
</html>