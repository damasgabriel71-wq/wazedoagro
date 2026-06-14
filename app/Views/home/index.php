<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — Agro Power</title>
    <link rel="stylesheet" href="/peres/wazedoagro/public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body style="background: #0a1a0a; color: #f0fdf4;">

    <!-- Navbar -->
    <header style="background: #060f06; border-bottom: 1px solid rgba(74,222,128,0.1); padding: 15px 0; position: sticky; top: 0; z-index: 100;">
        <div style="max-width: 1200px; margin: 0 auto; padding: 0 20px; display: flex; justify-content: space-between; align-items: center;">
            <div style="font-size: 1.3rem; font-weight: 800;">
                🌱 <span style="color: #4ade80;">Agro</span> Power
            </div>
            <div style="display: flex; align-items: center; gap: 16px;">
                <span style="color: #86a88a; font-size: 0.9rem;">Olá, <strong style="color: #4ade80;"><?= htmlspecialchars($nome) ?></strong></span>
                <a href="/peres/wazedoagro/public/logout"
                   style="padding: 8px 16px; background: #162416; border: 1px solid rgba(74,222,128,0.2); border-radius: 8px; color: #f0fdf4; text-decoration: none; font-size: 0.85rem;">
                    <i class="fa-solid fa-right-from-bracket"></i> Sair
                </a>
            </div>
        </div>
    </header>

    <!-- Conteúdo -->
    <main style="max-width: 1200px; margin: 0 auto; padding: 40px 20px;">

        <h1 style="font-size: 1.6rem; margin-bottom: 8px;">Bem-vindo ao seu painel 👋</h1>
        <p style="color: #86a88a; margin-bottom: 40px;">Gerencie sua propriedade com inteligência.</p>

        <!-- Cards de serviços -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 20px;">

            <div style="background: #0f1f0f; border: 1px solid rgba(74,222,128,0.1); border-radius: 12px; padding: 28px; cursor: pointer; transition: 0.3s;"
                 onmouseover="this.style.borderColor='#4ade80'" onmouseout="this.style.borderColor='rgba(74,222,128,0.1)'">
                <div style="font-size: 2rem; margin-bottom: 12px;">🛰️</div>
                <h3 style="font-size: 1rem; margin-bottom: 8px; color: #f0fdf4;">Monitoramento</h3>
                <p style="color: #86a88a; font-size: 0.85rem;">Acompanhe sua lavoura em tempo real.</p>
            </div>

            <div style="background: #0f1f0f; border: 1px solid rgba(74,222,128,0.1); border-radius: 12px; padding: 28px; cursor: pointer; transition: 0.3s;"
                 onmouseover="this.style.borderColor='#4ade80'" onmouseout="this.style.borderColor='rgba(74,222,128,0.1)'">
                <div style="font-size: 2rem; margin-bottom: 12px;">🐄</div>
                <h3 style="font-size: 1rem; margin-bottom: 8px; color: #f0fdf4;">Gestão de Pastagem</h3>
                <p style="color: #86a88a; font-size: 0.85rem;">Controle piquetes e taxa de lotação.</p>
            </div>

            <div style="background: #0f1f0f; border: 1px solid rgba(74,222,128,0.1); border-radius: 12px; padding: 28px; cursor: pointer; transition: 0.3s;"
                 onmouseover="this.style.borderColor='#fbbf24'" onmouseout="this.style.borderColor='rgba(74,222,128,0.1)'">
                <div style="font-size: 2rem; margin-bottom: 12px;">📊</div>
                <h3 style="font-size: 1rem; margin-bottom: 8px; color: #f0fdf4;">Relatórios</h3>
                <p style="color: #86a88a; font-size: 0.85rem;">Análise de dados da sua propriedade.</p>
            </div>

            <div style="background: #0f1f0f; border: 1px solid rgba(74,222,128,0.1); border-radius: 12px; padding: 28px; cursor: pointer; transition: 0.3s;"
                 onmouseover="this.style.borderColor='#4ade80'" onmouseout="this.style.borderColor='rgba(74,222,128,0.1)'">
                <div style="font-size: 2rem; margin-bottom: 12px;">🛒</div>
                <h3 style="font-size: 1rem; margin-bottom: 8px; color: #f0fdf4;">Meus Pedidos</h3>
                <p style="color: #86a88a; font-size: 0.85rem;">Acompanhe seus pedidos de produtos.</p>
            </div>

        </div>
    </main>

</body>
</html>