<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Admin — Agro Power</title>
    <link rel="stylesheet" href="/peres/wazedoagro/public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body style="background: #070a12; color: #f0fdf4;">

<header style="background: #070a12; border-bottom: 1px solid rgba(255,255,255,0.05); padding: 15px 0; position: sticky; top: 0; z-index: 100;">
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 20px; display: flex; justify-content: space-between; align-items: center;">
        <div style="font-size: 1.3rem; font-weight: 800;">
            🌱 <span style="color: #4ade80;">Agro</span> Power <span style="color: #9ca3af; font-size: 0.85rem; margin-left: 8px;">Admin</span>
        </div>
        <div style="display: flex; align-items: center; gap: 16px;">
            <span style="color: #9ca3af; font-size: 0.9rem;">👤 <?= htmlspecialchars($_SESSION['usuario_nome']) ?></span>
            <a href="/peres/wazedoagro/public/logout" style="padding: 8px 16px; background: #1f2937; border: 1px solid rgba(255,255,255,0.08); border-radius: 8px; color: #f0fdf4; text-decoration: none; font-size: 0.85rem;">
                <i class="fa-solid fa-right-from-bracket"></i> Sair
            </a>
        </div>
    </div>
</header>

<main style="max-width: 1200px; margin: 0 auto; padding: 40px 20px;">

    <h1 style="font-size: 1.6rem; margin-bottom: 8px;">Painel Administrativo</h1>
    <p style="color: #9ca3af; margin-bottom: 20px;">Gerencie os clientes do sistema.</p>

    <!-- Menu de navegação -->
    <div style="display: flex; flex-wrap: wrap; gap: 12px; margin-bottom: 30px;">
        <a href="/peres/wazedoagro/public/admin"
           style="padding: 8px 16px; background: #00ffaa; color: #070a12; border-radius: 8px; text-decoration: none; font-weight: 700; font-size: 0.85rem;">
            👥 Clientes
        </a>
        <a href="/peres/wazedoagro/public/admin/produtos"
           style="padding: 8px 16px; background: #1f2937; border: 1px solid rgba(255,255,255,0.08); color: #fff; border-radius: 8px; text-decoration: none; font-size: 0.85rem;">
            📦 Produtos
        </a>
        <a href="/peres/wazedoagro/public/admin/pedidos"
           style="padding: 8px 16px; background: #1f2937; border: 1px solid rgba(255,255,255,0.08); color: #fff; border-radius: 8px; text-decoration: none; font-size: 0.85rem;">
            🛒 Pedidos
        </a>
        <a href="/peres/wazedoagro/public/admin/categorias"
           style="padding: 8px 16px; background: #1f2937; border: 1px solid rgba(255,255,255,0.08); color: #fff; border-radius: 8px; text-decoration: none; font-size: 0.85rem;">
            🏷️ Categorias
        </a>
        <a href="/peres/wazedoagro/public/admin/fornecedores"
           style="padding: 8px 16px; background: #1f2937; border: 1px solid rgba(255,255,255,0.08); color: #fff; border-radius: 8px; text-decoration: none; font-size: 0.85rem;">
            🏭 Fornecedores
        </a>
    </div>

    <?php if (isset($_GET['atualizado'])): ?>
    <div style="background: rgba(74,222,128,0.1); border: 1px solid #4ade80; color: #4ade80; padding: 12px; border-radius: 8px; margin-bottom: 20px;">
        ✅ Usuário atualizado com sucesso!
    </div>
    <?php endif; ?>

    <?php if (isset($_GET['deletado'])): ?>
    <div style="background: rgba(239,68,68,0.1); border: 1px solid #ef4444; color: #f87171; padding: 12px; border-radius: 8px; margin-bottom: 20px;">
        🗑️ Usuário removido com sucesso!
    </div>
    <?php endif; ?>

    <div style="background: #111827; border: 1px solid rgba(255,255,255,0.05); border-radius: 12px; overflow: hidden;">
        <div style="padding: 20px 24px; border-bottom: 1px solid rgba(255,255,255,0.05); display: flex; justify-content: space-between; align-items: center;">
            <h2 style="font-size: 1rem; color: #f0fdf4;">Clientes Cadastrados</h2>
            <span style="background: rgba(74,222,128,0.1); color: #4ade80; padding: 4px 12px; border-radius: 20px; font-size: 0.85rem;">
                <?= count($usuarios) ?> registros
            </span>
        </div>
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background: #1f2937;">
                        <th style="padding: 12px 16px; text-align: left; color: #9ca3af; font-size: 0.8rem; text-transform: uppercase;">#</th>
                        <th style="padding: 12px 16px; text-align: left; color: #9ca3af; font-size: 0.8rem; text-transform: uppercase;">Nome</th>
                        <th style="padding: 12px 16px; text-align: left; color: #9ca3af; font-size: 0.8rem; text-transform: uppercase;">E-mail</th>
                        <th style="padding: 12px 16px; text-align: left; color: #9ca3af; font-size: 0.8rem; text-transform: uppercase;">Telefone</th>
                        <th style="padding: 12px 16px; text-align: left; color: #9ca3af; font-size: 0.8rem; text-transform: uppercase;">Tipo</th>
                        <th style="padding: 12px 16px; text-align: left; color: #9ca3af; font-size: 0.8rem; text-transform: uppercase;">Cadastrado em</th>
                        <th style="padding: 12px 16px; text-align: left; color: #9ca3af; font-size: 0.8rem; text-transform: uppercase;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $u): ?>
                    <tr style="border-top: 1px solid rgba(255,255,255,0.05);"
                        onmouseover="this.style.background='#1f2937'"
                        onmouseout="this.style.background='transparent'">
                        <td style="padding: 14px 16px; color: #9ca3af; font-size: 0.85rem;"><?= $u['id'] ?></td>
                        <td style="padding: 14px 16px; color: #ffffff; font-size: 0.9rem;"><?= htmlspecialchars($u['nome']) ?></td>
                        <td style="padding: 14px 16px; color: #9ca3af; font-size: 0.85rem;"><?= htmlspecialchars($u['email']) ?></td>
                        <td style="padding: 14px 16px; color: #9ca3af; font-size: 0.85rem;"><?= htmlspecialchars($u['telefone'] ?? '—') ?></td>
                        <td style="padding: 14px 16px;">
                            <span style="padding: 3px 10px; border-radius: 20px; font-size: 0.75rem; font-weight: 600;
                                background: <?= $u['tipo'] === 'admin' ? 'rgba(251,191,36,0.15)' : 'rgba(74,222,128,0.1)' ?>;
                                color: <?= $u['tipo'] === 'admin' ? '#fbbf24' : '#4ade80' ?>;">
                                <?= $u['tipo'] ?>
                            </span>
                        </td>
                        <td style="padding: 14px 16px; color: #9ca3af; font-size: 0.85rem;"><?= $u['criado_em'] ?></td>
                        <td style="padding: 14px 16px;">
                            <div style="display: flex; gap: 8px;">
                                <a href="/peres/wazedoagro/public/admin/editar?id=<?= $u['id'] ?>"
                                   style="padding: 6px 12px; background: rgba(74,222,128,0.1); border: 1px solid rgba(74,222,128,0.2); border-radius: 6px; color: #4ade80; text-decoration: none; font-size: 0.8rem;">
                                    ✏️ Editar
                                </a>
                                <a href="/peres/wazedoagro/public/admin/deletar?id=<?= $u['id'] ?>"
                                   onclick="return confirm('Tem certeza que deseja remover este usuário?')"
                                   style="padding: 6px 12px; background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.2); border-radius: 6px; color: #f87171; text-decoration: none; font-size: 0.8rem;">
                                    🗑️ Remover
                                </a>
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