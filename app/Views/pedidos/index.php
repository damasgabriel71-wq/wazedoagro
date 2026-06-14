<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Meus Pedidos — Agro Power</title>
    <link rel="stylesheet" href="/peres/wazedoagro/public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body style="background: #070a12; color: #ffffff;">

<header style="background: #070a12; border-bottom: 1px solid rgba(255,255,255,0.05); padding: 15px 0; position: sticky; top: 0; z-index: 100;">
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 20px; display: flex; justify-content: space-between; align-items: center;">
        <div style="font-size: 1.3rem; font-weight: 800;">
            🌱 <span style="color: #00ffaa;">Agro</span> Power
        </div>
        <div style="display: flex; align-items: center; gap: 16px;">
            <a href="/peres/wazedoagro/public/dashboard" style="color: #9ca3af; text-decoration: none; font-size: 0.9rem;">← Dashboard</a>
            <a href="/peres/wazedoagro/public/logout" style="padding: 8px 16px; background: #1f2937; border: 1px solid rgba(255,255,255,0.08); border-radius: 8px; color: #ffffff; text-decoration: none; font-size: 0.85rem;">
                <i class="fa-solid fa-right-from-bracket"></i> Sair
            </a>
        </div>
    </div>
</header>

<main style="max-width: 1200px; margin: 0 auto; padding: 40px 20px;">

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <div>
            <h1 style="font-size: 1.6rem; margin-bottom: 4px;">🛒 Meus Pedidos</h1>
            <p style="color: #9ca3af;">Acompanhe seus pedidos de produtos.</p>
        </div>
        <a href="/peres/wazedoagro/public/pedidos/novo"
           style="padding: 10px 20px; background: #00ffaa; color: #070a12; border-radius: 8px; text-decoration: none; font-weight: 700; font-size: 0.9rem;">
            + Novo Pedido
        </a>
    </div>

    <?php if (isset($_GET['sucesso'])): ?>
    <div style="background: rgba(0,255,170,0.1); border: 1px solid #00ffaa; color: #00ffaa; padding: 12px; border-radius: 8px; margin-bottom: 20px;">
        ✅ Pedido realizado com sucesso! Entraremos em contato em breve.
    </div>
    <?php endif; ?>

    <?php if (empty($pedidos)): ?>
    <div style="background: #111827; border: 1px solid rgba(255,255,255,0.05); border-radius: 12px; padding: 60px; text-align: center;">
        <div style="font-size: 3rem; margin-bottom: 16px;">🛒</div>
        <p style="color: #9ca3af; margin-bottom: 20px;">Você ainda não fez nenhum pedido.</p>
        <a href="/peres/wazedoagro/public/pedidos/novo"
           style="padding: 10px 24px; background: #00ffaa; color: #070a12; border-radius: 8px; text-decoration: none; font-weight: 700;">
            Fazer Primeiro Pedido
        </a>
    </div>
    <?php else: ?>
    <div style="background: #111827; border: 1px solid rgba(255,255,255,0.05); border-radius: 12px; overflow: hidden;">
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background: #1f2937;">
                        <th style="padding: 12px 16px; text-align: left; color: #9ca3af; font-size: 0.8rem; text-transform: uppercase;">#</th>
                        <th style="padding: 12px 16px; text-align: left; color: #9ca3af; font-size: 0.8rem; text-transform: uppercase;">Produto</th>
                        <th style="padding: 12px 16px; text-align: left; color: #9ca3af; font-size: 0.8rem; text-transform: uppercase;">Qtd</th>
                        <th style="padding: 12px 16px; text-align: left; color: #9ca3af; font-size: 0.8rem; text-transform: uppercase;">Status</th>
                        <th style="padding: 12px 16px; text-align: left; color: #9ca3af; font-size: 0.8rem; text-transform: uppercase;">Observação</th>
                        <th style="padding: 12px 16px; text-align: left; color: #9ca3af; font-size: 0.8rem; text-transform: uppercase;">Data</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pedidos as $p): ?>
                    <?php
                        $cores = [
                            'pendente'   => ['bg' => 'rgba(251,191,36,0.1)',  'color' => '#fbbf24'],
                            'confirmado' => ['bg' => 'rgba(0,191,255,0.1)',   'color' => '#00bfff'],
                            'entregue'   => ['bg' => 'rgba(0,255,170,0.1)',   'color' => '#00ffaa'],
                            'cancelado'  => ['bg' => 'rgba(239,68,68,0.1)',   'color' => '#f87171'],
                        ];
                        $cor = $cores[$p['status']] ?? $cores['pendente'];
                    ?>
                    <tr style="border-top: 1px solid rgba(255,255,255,0.05);"
                        onmouseover="this.style.background='#1f2937'"
                        onmouseout="this.style.background='transparent'">
                        <td style="padding: 14px 16px; color: #9ca3af; font-size: 0.85rem;"><?= $p['id'] ?></td>
                        <td style="padding: 14px 16px; color: #ffffff; font-size: 0.9rem;"><?= htmlspecialchars($p['produto']) ?></td>
                        <td style="padding: 14px 16px; color: #9ca3af; font-size: 0.85rem;"><?= $p['quantidade'] ?></td>
                        <td style="padding: 14px 16px;">
                            <span style="padding: 3px 10px; border-radius: 20px; font-size: 0.75rem; font-weight: 600; background: <?= $cor['bg'] ?>; color: <?= $cor['color'] ?>;">
                                <?= $p['status'] ?>
                            </span>
                        </td>
                        <td style="padding: 14px 16px; color: #9ca3af; font-size: 0.85rem;"><?= htmlspecialchars($p['observacao'] ?? '—') ?></td>
                        <td style="padding: 14px 16px; color: #9ca3af; font-size: 0.85rem;"><?= $p['criado_em'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php endif; ?>

</main>
</body>
</html>