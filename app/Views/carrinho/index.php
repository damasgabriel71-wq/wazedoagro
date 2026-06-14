<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Carrinho — Agro Power</title>
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
            <a href="/peres/wazedoagro/public/logout" style="padding: 8px 16px; background: #1f2937; border: 1px solid rgba(255,255,255,0.08); border-radius: 8px; color: #fff; text-decoration: none; font-size: 0.85rem;">
                <i class="fa-solid fa-right-from-bracket"></i> Sair
            </a>
        </div>
    </div>
</header>

<main style="max-width: 900px; margin: 0 auto; padding: 40px 20px;">

    <h1 style="font-size: 1.6rem; margin-bottom: 8px;">🛒 Meu Carrinho</h1>
    <p style="color: #9ca3af; margin-bottom: 30px;">Revise seus itens antes de finalizar.</p>

    <?php if (isset($_GET['adicionado'])): ?>
    <div style="background: rgba(0,255,170,0.1); border: 1px solid #00ffaa; color: #00ffaa; padding: 12px; border-radius: 8px; margin-bottom: 20px;">
        ✅ Produto adicionado ao carrinho!
    </div>
    <?php endif; ?>

    <?php if (isset($_GET['erro']) && $_GET['erro'] === 'estoque'): ?>
    <div style="background: rgba(239,68,68,0.1); border: 1px solid #ef4444; color: #f87171; padding: 12px; border-radius: 8px; margin-bottom: 20px;">
        ❌ Estoque insuficiente para este produto.
    </div>
    <?php endif; ?>

    <?php if (empty($itens)): ?>
    <div style="background: #111827; border: 1px solid rgba(255,255,255,0.05); border-radius: 12px; padding: 60px; text-align: center;">
        <div style="font-size: 3rem; margin-bottom: 16px;">🛒</div>
        <p style="color: #9ca3af; margin-bottom: 20px;">Seu carrinho está vazio.</p>
        <a href="/peres/wazedoagro/public"
           style="padding: 10px 24px; background: #00ffaa; color: #070a12; border-radius: 8px; text-decoration: none; font-weight: 700;">
            Ver Produtos
        </a>
    </div>
    <?php else: ?>

    <div style="display: grid; grid-template-columns: 1fr 300px; gap: 24px;">

        <!-- Itens -->
        <div style="background: #111827; border: 1px solid rgba(255,255,255,0.05); border-radius: 12px; overflow: hidden;">
            <?php
            $cats = ['sal_gado' => '🐄', 'equinos' => '🐴', 'capim' => '🌿'];
            foreach ($itens as $item):
            ?>
            <div style="padding: 20px; border-bottom: 1px solid rgba(255,255,255,0.05); display: flex; justify-content: space-between; align-items: center;">
                <div style="display: flex; align-items: center; gap: 14px;">
                    <div style="font-size: 2rem;"><?= $cats[$item['categoria']] ?? '📦' ?></div>
                    <div>
                        <div style="font-size: 0.95rem; color: #fff; font-weight: 600; margin-bottom: 4px;"><?= htmlspecialchars($item['nome']) ?></div>
                        <div style="font-size: 0.85rem; color: #9ca3af;">Qtd: <?= $item['quantidade'] ?> × R$ <?= number_format($item['preco'], 2, ',', '.') ?></div>
                    </div>
                </div>
                <div style="display: flex; align-items: center; gap: 16px;">
                    <span style="color: #00ffaa; font-weight: 700; font-size: 1rem;">
                        R$ <?= number_format($item['quantidade'] * $item['preco'], 2, ',', '.') ?>
                    </span>
                    <a href="/peres/wazedoagro/public/carrinho/remover?id=<?= $item['id'] ?>"
                       onclick="return confirm('Remover este item?')"
                       style="color: #f87171; text-decoration: none; font-size: 0.85rem;">
                        🗑️
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Resumo -->
        <div>
            <div style="background: #111827; border: 1px solid rgba(255,255,255,0.05); border-radius: 12px; padding: 24px; position: sticky; top: 80px;">
                <h3 style="font-size: 1rem; margin-bottom: 20px; color: #fff;">Resumo do Pedido</h3>

                <div style="display: flex; justify-content: space-between; margin-bottom: 12px;">
                    <span style="color: #9ca3af; font-size: 0.9rem;">Subtotal</span>
                    <span style="color: #fff; font-size: 0.9rem;">R$ <?= number_format($total, 2, ',', '.') ?></span>
                </div>
                <div style="display: flex; justify-content: space-between; margin-bottom: 20px; padding-top: 12px; border-top: 1px solid rgba(255,255,255,0.05);">
                    <span style="color: #fff; font-weight: 700;">Total</span>
                    <span style="color: #00ffaa; font-weight: 700; font-size: 1.2rem;">R$ <?= number_format($total, 2, ',', '.') ?></span>
                </div>

                <a href="/peres/wazedoagro/public/carrinho/finalizar"
                   style="display: block; width: 100%; padding: 13px; background: #00ffaa; color: #070a12; border: none; border-radius: 8px; font-weight: 700; font-size: 1rem; cursor: pointer; text-align: center; text-decoration: none;">
                    Finalizar Pedido
                </a>

                <a href="/peres/wazedoagro/public"
                   style="display: block; text-align: center; margin-top: 12px; color: #9ca3af; text-decoration: none; font-size: 0.85rem;">
                    ← Continuar comprando
                </a>
            </div>
        </div>

    </div>
    <?php endif; ?>

</main>
</body>
</html>