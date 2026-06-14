<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — Agro Power</title>
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
            <span style="color: #9ca3af; font-size: 0.9rem;">👤 <?= htmlspecialchars($nome) ?></span>
            <a href="/peres/wazedoagro/public/logout"
               style="padding: 8px 16px; background: #1f2937; border: 1px solid rgba(255,255,255,0.08); border-radius: 8px; color: #ffffff; text-decoration: none; font-size: 0.85rem;">
                <i class="fa-solid fa-right-from-bracket"></i> Sair
            </a>
        </div>
    </div>
</header>

<main style="max-width: 1200px; margin: 0 auto; padding: 40px 20px;">

    <h1 style="font-size: 1.6rem; margin-bottom: 8px;">Bem-vindo, <?= htmlspecialchars($nome) ?>! 👋</h1>
    <p style="color: #9ca3af; margin-bottom: 40px;">Gerencie sua propriedade com inteligência.</p>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 20px;">

        <a href="#" style="text-decoration: none;">
            <div style="background: #111827; border: 1px solid rgba(255,255,255,0.05); border-radius: 12px; padding: 28px; cursor: pointer; transition: 0.3s;"
                 onmouseover="this.style.borderColor='#00ffaa'" onmouseout="this.style.borderColor='rgba(255,255,255,0.05)'">
                <div style="font-size: 2rem; margin-bottom: 12px;">🛰️</div>
                <h3 style="font-size: 1rem; margin-bottom: 8px; color: #ffffff;">Monitoramento</h3>
                <p style="color: #9ca3af; font-size: 0.85rem;">Acompanhe sua lavoura em tempo real.</p>
            </div>
        </a>

        <a href="#" style="text-decoration: none;">
            <div style="background: #111827; border: 1px solid rgba(255,255,255,0.05); border-radius: 12px; padding: 28px; cursor: pointer; transition: 0.3s;"
                 onmouseover="this.style.borderColor='#00ffaa'" onmouseout="this.style.borderColor='rgba(255,255,255,0.05)'">
                <div style="font-size: 2rem; margin-bottom: 12px;">🐄</div>
                <h3 style="font-size: 1rem; margin-bottom: 8px; color: #ffffff;">Gestão de Pastagem</h3>
                <p style="color: #9ca3af; font-size: 0.85rem;">Controle piquetes e taxa de lotação.</p>
            </div>
        </a>

        <a href="#" style="text-decoration: none;">
            <div style="background: #111827; border: 1px solid rgba(255,255,255,0.05); border-radius: 12px; padding: 28px; cursor: pointer; transition: 0.3s;"
                 onmouseover="this.style.borderColor='#fbbf24'" onmouseout="this.style.borderColor='rgba(255,255,255,0.05)'">
                <div style="font-size: 2rem; margin-bottom: 12px;">📊</div>
                <h3 style="font-size: 1rem; margin-bottom: 8px; color: #ffffff;">Relatórios</h3>
                <p style="color: #9ca3af; font-size: 0.85rem;">Análise de dados da sua propriedade.</p>
            </div>
        </a>

        <a href="/peres/wazedoagro/public/pedidos" style="text-decoration: none;">
            <div style="background: #111827; border: 1px solid rgba(255,255,255,0.05); border-radius: 12px; padding: 28px; cursor: pointer; transition: 0.3s;"
                 onmouseover="this.style.borderColor='#00ffaa'" onmouseout="this.style.borderColor='rgba(255,255,255,0.05)'">
                <div style="font-size: 2rem; margin-bottom: 12px;">🛒</div>
                <h3 style="font-size: 1rem; margin-bottom: 8px; color: #ffffff;">Meus Pedidos</h3>
                <p style="color: #9ca3af; font-size: 0.85rem;">Acompanhe seus pedidos de produtos.</p>
            </div>
        </a>

        <a href="#" style="text-decoration: none;">
            <div style="background: #111827; border: 1px solid rgba(255,255,255,0.05); border-radius: 12px; padding: 28px; cursor: pointer; transition: 0.3s;"
                 onmouseover="this.style.borderColor='#00bfff'" onmouseout="this.style.borderColor='rgba(255,255,255,0.05)'">
                <div style="font-size: 2rem; margin-bottom: 12px;">💧</div>
                <h3 style="font-size: 1rem; margin-bottom: 8px; color: #ffffff;">Manejo Hídrico</h3>
                <p style="color: #9ca3af; font-size: 0.85rem;">Controle o uso de água na propriedade.</p>
            </div>
        </a>

        <a href="#" style="text-decoration: none;">
            <div style="background: #111827; border: 1px solid rgba(255,255,255,0.05); border-radius: 12px; padding: 28px; cursor: pointer; transition: 0.3s;"
                 onmouseover="this.style.borderColor='#a3e635'" onmouseout="this.style.borderColor='rgba(255,255,255,0.05)'">
                <div style="font-size: 2rem; margin-bottom: 12px;">📋</div>
                <h3 style="font-size: 1rem; margin-bottom: 8px; color: #ffffff;">Meus Laudos</h3>
                <p style="color: #9ca3af; font-size: 0.85rem;">Acesse seus laudos e receituários.</p>
            </div>
        </a>

    </div>
</main>

</body>
</html>