<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Novo Pedido — Agro Power</title>
    <link rel="stylesheet" href="/peres/wazedoagro/public/css/style.css">
</head>
<body style="background: #070a12; color: #ffffff;">

<header style="background: #070a12; border-bottom: 1px solid rgba(255,255,255,0.05); padding: 15px 0;">
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 20px; display: flex; justify-content: space-between; align-items: center;">
        <div style="font-size: 1.3rem; font-weight: 800;">
            🌱 <span style="color: #00ffaa;">Agro</span> Power
        </div>
        <a href="/peres/wazedoagro/public/pedidos" style="color: #9ca3af; text-decoration: none; font-size: 0.9rem;">← Meus Pedidos</a>
    </div>
</header>

<main style="max-width: 700px; margin: 40px auto; padding: 0 20px;">
    <div style="background: #111827; border: 1px solid rgba(255,255,255,0.05); border-radius: 16px; padding: 40px;">

        <h1 style="font-size: 1.3rem; margin-bottom: 30px;">🛒 Novo Pedido</h1>

        <?php if (!empty($erro)): ?>
        <div style="background: rgba(239,68,68,0.1); border: 1px solid #ef4444; color: #f87171; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 0.9rem;">
            <?= htmlspecialchars($erro) ?>
        </div>
        <?php endif; ?>

        <!-- Busca de produtos -->
        <div style="margin-bottom: 24px;">
            <label style="color: #9ca3af; font-size: 0.85rem; display: block; margin-bottom: 6px;">🔍 Buscar Produto</label>
            <input type="text" id="busca"
                style="width: 100%; padding: 12px; background: #1f2937; border: 1px solid rgba(255,255,255,0.08); border-radius: 8px; color: #fff; font-size: 0.95rem; outline: none;"
                placeholder="Digite o nome do produto..."
                oninput="filtrarProdutos(this.value)">
        </div>

        <form method="POST" action="/peres/wazedoagro/public/pedidos/salvar">

            <!-- Lista de produtos -->
            <div style="margin-bottom: 20px;">
                <label style="color: #9ca3af; font-size: 0.85rem; display: block; margin-bottom: 10px;">Selecione o Produto *</label>
                <div id="lista-produtos" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 10px; max-height: 320px; overflow-y: auto;">
                    <?php
                    require_once BASE_PATH . '/app/Models/Produto.php';
                    $produtos = (new Produto())->todos();
                    $categorias = ['sal_gado' => '🐄 Sal Gado', 'equinos' => '🐴 Equinos', 'capim' => '🌿 Capim'];
                    foreach ($produtos as $p):
                    ?>
                    <label class="produto-card"
                           data-nome="<?= strtolower(htmlspecialchars($p['nome'])) ?>"
                           style="display: flex; flex-direction: column; gap: 4px; background: #1f2937; border: 2px solid rgba(255,255,255,0.05); border-radius: 10px; padding: 14px; cursor: pointer; transition: 0.2s;">
                        <input type="radio" name="produto_id" value="<?= $p['id'] ?>" required style="display: none;">
                        <span style="font-size: 0.85rem; color: #9ca3af;"><?= $categorias[$p['categoria']] ?? '' ?></span>
                        <span style="font-size: 0.9rem; color: #fff; font-weight: 600;"><?= htmlspecialchars($p['nome']) ?></span>
                        <span style="font-size: 1rem; color: #00ffaa; font-weight: 700;">R$ <?= number_format($p['preco'], 2, ',', '.') ?></span>
                        <span style="font-size: 0.75rem; color: <?= $p['estoque'] <= 10 ? '#f87171' : '#9ca3af' ?>;">
                            Estoque: <?= $p['estoque'] ?> un.
                        </span>
                    </label>
                    <?php endforeach; ?>
                </div>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="color: #9ca3af; font-size: 0.85rem; display: block; margin-bottom: 6px;">Quantidade *</label>
                <input type="number" name="quantidade" min="1" value="1" required
                    style="width: 100%; padding: 12px; background: #1f2937; border: 1px solid rgba(255,255,255,0.08); border-radius: 8px; color: #fff; font-size: 0.95rem; outline: none;">
            </div>

            <div style="margin-bottom: 28px;">
                <label style="color: #9ca3af; font-size: 0.85rem; display: block; margin-bottom: 6px;">Observação <span style="color: #6b7280;">(opcional)</span></label>
                <textarea name="observacao" rows="3"
                    style="width: 100%; padding: 12px; background: #1f2937; border: 1px solid rgba(255,255,255,0.08); border-radius: 8px; color: #fff; font-size: 0.95rem; outline: none; resize: vertical;"
                    placeholder="Ex: Entregar na fazenda principal..."></textarea>
            </div>

            <button type="submit"
                style="width: 100%; padding: 13px; background: #00ffaa; color: #070a12; border: none; border-radius: 8px; font-weight: 700; font-size: 1rem; cursor: pointer;">
                Enviar Pedido
            </button>

        </form>
    </div>
</main>

<style>
.produto-card:hover { border-color: #00ffaa !important; }
.produto-card.selecionado { border-color: #00ffaa !important; background: rgba(0,255,170,0.08) !important; }
.produto-card.oculto { display: none !important; }
</style>

<script>
document.querySelectorAll('.produto-card').forEach(card => {
    card.addEventListener('click', () => {
        document.querySelectorAll('.produto-card').forEach(c => c.classList.remove('selecionado'));
        card.classList.add('selecionado');
        card.querySelector('input[type="radio"]').checked = true;
    });
});

function filtrarProdutos(termo) {
    const t = termo.toLowerCase();
    document.querySelectorAll('.produto-card').forEach(card => {
        const nome = card.dataset.nome;
        card.classList.toggle('oculto', !nome.includes(t));
    });
}
</script>

</body>
</html>