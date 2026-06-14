<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Fornecedores — Admin Agro Power</title>
    <link rel="stylesheet" href="/peres/wazedoagro/public/css/style.css">
</head>
<body style="background: #070a12; color: #ffffff;">

<header style="background: #070a12; border-bottom: 1px solid rgba(255,255,255,0.05); padding: 15px 0; position: sticky; top: 0; z-index: 100;">
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 20px; display: flex; justify-content: space-between; align-items: center;">
        <div style="font-size: 1.3rem; font-weight: 800;">🌱 <span style="color: #00ffaa;">Agro</span> Power <span style="color: #9ca3af; font-size: 0.85rem;">Admin</span></div>
        <div style="display: flex; gap: 16px; align-items: center;">
            <a href="/peres/wazedoagro/public/admin" style="color: #9ca3af; text-decoration: none; font-size: 0.9rem;">← Painel</a>
            <a href="/peres/wazedoagro/public/logout" style="padding: 8px 16px; background: #1f2937; border: 1px solid rgba(255,255,255,0.08); border-radius: 8px; color: #fff; text-decoration: none; font-size: 0.85rem;">Sair</a>
        </div>
    </div>
</header>

<main style="max-width: 1200px; margin: 0 auto; padding: 40px 20px;">

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <div>
            <h1 style="font-size: 1.6rem; margin-bottom: 4px;">🏭 Fornecedores</h1>
            <p style="color: #9ca3af;">Gerencie os fornecedores de produtos.</p>
        </div>
        <a href="/peres/wazedoagro/public/admin/fornecedores/novo"
           style="padding: 10px 20px; background: #00ffaa; color: #070a12; border-radius: 8px; text-decoration: none; font-weight: 700; font-size: 0.9rem;">
            + Novo Fornecedor
        </a>
    </div>

    <?php if (isset($_GET['criado'])): ?>
    <div style="background: rgba(0,255,170,0.1); border: 1px solid #00ffaa; color: #00ffaa; padding: 12px; border-radius: 8px; margin-bottom: 20px;">✅ Fornecedor criado!</div>
    <?php endif; ?>
    <?php if (isset($_GET['atualizado'])): ?>
    <div style="background: rgba(0,255,170,0.1); border: 1px solid #00ffaa; color: #00ffaa; padding: 12px; border-radius: 8px; margin-bottom: 20px;">✅ Fornecedor atualizado!</div>
    <?php endif; ?>
    <?php if (isset($_GET['deletado'])): ?>
    <div style="background: rgba(239,68,68,0.1); border: 1px solid #ef4444; color: #f87171; padding: 12px; border-radius: 8px; margin-bottom: 20px;">🗑️ Fornecedor removido!</div>
    <?php endif; ?>

    <div style="background: #111827; border: 1px solid rgba(255,255,255,0.05); border-radius: 12px; overflow: hidden;">
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background: #1f2937;">
                        <th style="padding: 12px 16px; text-align: left; color: #9ca3af; font-size: 0.8rem; text-transform: uppercase;">#</th>
                        <th style="padding: 12px 16px; text-align: left; color: #9ca3af; font-size: 0.8rem; text-transform: uppercase;">Nome</th>
                        <th style="padding: 12px 16px; text-align: left; color: #9ca3af; font-size: 0.8rem; text-transform: uppercase;">E-mail</th>
                        <th style="padding: 12px 16px; text-align: left; color: #9ca3af; font-size: 0.8rem; text-transform: uppercase;">Telefone</th>
                        <th style="padding: 12px 16px; text-align: left; color: #9ca3af; font-size: 0.8rem; text-transform: uppercase;">Endereço</th>
                        <th style="padding: 12px 16px; text-align: left; color: #9ca3af; font-size: 0.8rem; text-transform: uppercase;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($fornecedores as $f): ?>
                    <tr style="border-top: 1px solid rgba(255,255,255,0.05);"
                        onmouseover="this.style.background='#1f2937'"
                        onmouseout="this.style.background='transparent'">
                        <td style="padding: 14px 16px; color: #9ca3af;"><?= $f['id'] ?></td>
                        <td style="padding: 14px 16px; color: #fff; font-weight: 600;"><?= htmlspecialchars($f['nome']) ?></td>
                        <td style="padding: 14px 16px; color: #9ca3af; font-size: 0.85rem;"><?= htmlspecialchars($f['email'] ?? '—') ?></td>
                        <td style="padding: 14px 16px; color: #9ca3af; font-size: 0.85rem;"><?= htmlspecialchars($f['telefone'] ?? '—') ?></td>
                        <td style="padding: 14px 16px; color: #9ca3af; font-size: 0.85rem;"><?= htmlspecialchars($f['endereco'] ?? '—') ?></td>
                        <td style="padding: 14px 16px;">
                            <div style="display: flex; gap: 8px;">
                                <a href="/peres/wazedoagro/public/admin/fornecedores/editar?id=<?= $f['id'] ?>"
                                   style="padding: 6px 12px; background: rgba(0,255,170,0.1); border: 1px solid rgba(0,255,170,0.2); border-radius: 6px; color: #00ffaa; text-decoration: none; font-size: 0.8rem;">✏️ Editar</a>
                                <a href="/peres/wazedoagro/public/admin/fornecedores/deletar?id=<?= $f['id'] ?>"
                                   onclick="return confirm('Remover este fornecedor?')"
                                   style="padding: 6px 12px; background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.2); border-radius: 6px; color: #f87171; text-decoration: none; font-size: 0.8rem;">🗑️ Remover</a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
</body>
</html>