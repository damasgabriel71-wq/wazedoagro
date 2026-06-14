<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<section style="min-height: 100vh; display: flex; align-items: center; justify-content: center; background: #0a1a0a;">
    <div style="background: #0f1f0f; border: 1px solid rgba(74,222,128,0.1); border-radius: 16px; padding: 40px; width: 100%; max-width: 420px;">

        <!-- Voltar -->
        <a href="/peres/wazedoagro/public"
           style="display: inline-flex; align-items: center; gap: 6px; color: #86a88a; text-decoration: none; font-size: 0.85rem; margin-bottom: 24px;"
           onmouseover="this.style.color='#4ade80'"
           onmouseout="this.style.color='#86a88a'">
            ← Voltar ao início
        </a>

        <div style="text-align: center; margin-bottom: 30px;">
            <div style="font-size: 1.6rem; font-weight: 800; color: #fff; margin-bottom: 8px;">
                🌱 <span style="color: #4ade80;">Agro</span> Power
            </div>
            <p style="color: #86a88a; font-size: 0.95rem;">Crie sua conta gratuitamente</p>
        </div>

        <?php if (!empty($erro)): ?>
        <div style="background: rgba(239,68,68,0.1); border: 1px solid #ef4444; color: #f87171; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 0.9rem;">
            <?= htmlspecialchars($erro) ?>
        </div>
        <?php endif; ?>

        <form method="POST" action="/peres/wazedoagro/public/cadastro">
            <div style="margin-bottom: 18px;">
                <label style="color: #86a88a; font-size: 0.85rem; display: block; margin-bottom: 6px;">Nome da Fazenda ou Responsável</label>
                <input type="text" name="nome" required
                    style="width: 100%; padding: 12px; background: #162416; border: 1px solid rgba(74,222,128,0.15); border-radius: 8px; color: #fff; font-size: 0.95rem; outline: none;"
                    placeholder="Ex: Fazenda Esperança">
            </div>
            <div style="margin-bottom: 18px;">
                <label style="color: #86a88a; font-size: 0.85rem; display: block; margin-bottom: 6px;">E-mail</label>
                <input type="email" name="email" required
                    style="width: 100%; padding: 12px; background: #162416; border: 1px solid rgba(74,222,128,0.15); border-radius: 8px; color: #fff; font-size: 0.95rem; outline: none;"
                    placeholder="seu@email.com">
            </div>
            <div style="margin-bottom: 18px;">
                <label style="color: #86a88a; font-size: 0.85rem; display: block; margin-bottom: 6px;">Senha</label>
                <input type="password" name="senha" required
                    style="width: 100%; padding: 12px; background: #162416; border: 1px solid rgba(74,222,128,0.15); border-radius: 8px; color: #fff; font-size: 0.95rem; outline: none;"
                    placeholder="••••••••">
            </div>
            <div style="margin-bottom: 28px;">
                <label style="color: #86a88a; font-size: 0.85rem; display: block; margin-bottom: 6px;">Confirmar Senha</label>
                <input type="password" name="confirma" required
                    style="width: 100%; padding: 12px; background: #162416; border: 1px solid rgba(74,222,128,0.15); border-radius: 8px; color: #fff; font-size: 0.95rem; outline: none;"
                    placeholder="••••••••">
            </div>
            <button type="submit"
                style="width: 100%; padding: 13px; background: #4ade80; color: #0a1a0a; border: none; border-radius: 8px; font-weight: 700; font-size: 1rem; cursor: pointer;">
                Criar Conta
            </button>
        </form>

        <p style="text-align: center; margin-top: 20px; color: #86a88a; font-size: 0.9rem;">
            Já tem conta?
            <a href="/peres/wazedoagro/public/login" style="color: #4ade80; text-decoration: none; font-weight: 600;">Entrar</a>
        </p>

    </div>
</section>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
<div style="margin-bottom: 18px;">
    <label style="color: #86a88a; font-size: 0.85rem; display: block; margin-bottom: 6px;">Telefone</label>
    <input type="text" name="telefone"
        style="width: 100%; padding: 12px; background: #162416; border: 1px solid rgba(74,222,128,0.15); border-radius: 8px; color: #fff; font-size: 0.95rem; outline: none;"
        placeholder="(38) 99999-9999">
</div>