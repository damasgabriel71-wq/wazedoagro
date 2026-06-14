<?php declare(strict_types=1); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agro Power - Inteligência Artificial no Campo</title>
    <link rel="stylesheet" href="/peres/wazedoagro/public/css/style.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        html { scroll-behavior: smooth; }
        .btn-link { text-decoration: none; display: inline-flex; align-items: center; justify-content: center; }
        
        .features-section, .pricing-section { padding: 60px 0; }
        .section-header { text-align: center; margin-bottom: 40px; }
        .section-header h2 { font-size: 2rem; margin-bottom: 10px; color: #fff; }
        .section-header h2 span { color: #00ffaa; }
        
        .grid-3 { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 24px; }
        .feature-card { background: #111827; padding: 30px; border-radius: 12px; border: 1px solid rgba(255, 255, 255, 0.05); transition: 0.3s; }
        .feature-card:hover { transform: translateY(-4px); border-color: #00ffaa; }
        .feature-card i { font-size: 2.2rem; color: #00ffaa; margin-bottom: 15px; display: block; }
        .feature-card h3 { font-size: 1.3rem; margin: 0 0 10px 0; color: #fff; }
        .feature-card p { color: #9ca3af; margin: 0; line-height: 1.5; font-size: 0.95rem; }

        .price-card { background: #111827; padding: 35px 25px; border-radius: 12px; border: 1px solid rgba(255, 255, 255, 0.05); text-align: center; display: flex; flex-direction: column; justify-content: space-between; position: relative; }
        .price-card.featured { border-color: #00bfff; transform: scale(1.02); }
        .price-badge { position: absolute; top: 12px; right: 12px; background: #00bfff; color: #0b0f19; font-size: 0.75rem; font-weight: bold; padding: 3px 8px; border-radius: 20px; }
        .price-card h3 { font-size: 1.5rem; margin: 0 0 10px 0; color: #fff; }
        .price-value { font-size: 2.5rem; font-weight: bold; margin: 15px 0; color: #fff; }
        .price-value span { font-size: 0.9rem; color: #9ca3af; }
        .price-features { list-style: none; padding: 0; margin: 15px 0 25px 0; text-align: left; }
        .price-features li { margin-bottom: 10px; color: #9ca3af; font-size: 0.9rem; display: flex; align-items: center; }
        .price-features li i { color: #00ffaa; margin-right: 8px; }
        
        .slide { position: absolute; inset: 0; background-size: cover; background-position: center; opacity: 0; transition: opacity 1s ease; }
        .slide.active { opacity: 1; }
        .dot { width: 10px; height: 10px; border-radius: 50%; background: rgba(255,255,255,0.4); cursor: pointer; transition: background 0.3s; }
        .dot.active { background: #00ffaa; }
    </style>
</head>
<body>

<header class="navbar">
    <div class="container nav-inner">
        <div class="logo">
            🌱 <span>Agro</span> Power
        </div>
        <nav class="nav-menu">
            <a href="#beneficios">Benefícios</a>
            <a href="#planos">Planos</a>
            <a href="#produtos">Produtos</a>
            <a href="#servicos">Serviços</a>
        </nav>
        <div style="display: flex; gap: 12px; align-items: center;">
            <a href="/peres/wazedoagro/public/carrinho"
               style="color: #fff; text-decoration: none; font-size: 1.3rem; padding: 8px;" title="Carrinho">
                🛒
            </a>
            <a href="/peres/wazedoagro/public/login" class="btn btn-dark btn-link" style="padding: 10px 20px;">Entrar</a>
            <a href="/peres/wazedoagro/public/cadastro" class="btn btn-primary btn-link" style="padding: 10px 20px;">Criar Conta</a>
        </div>
    </div>
</header>

<?php require_once BASE_PATH . '/public/slider.php'; ?>

<section class="features-section" id="beneficios">
    <div class="container">
        <div class="section-header">
            <h2>Destaques do <span>Agro Power</span></h2>
        </div>
        <div class="grid-3">
            <div class="feature-card">
                <i class="fa-solid fa-satellite-dish"></i>
                <h3>Monitoramento Inteligente</h3>
                <p>Acompanhamento sistêmico da saúde vegetativa e análise da taxa de lotação ideal do gado.</p>
            </div>
            <div class="feature-card">
                <i class="fa-solid fa-layer-group"></i>
                <h3>Gestão de Piquetes</h3>
                <p>Controle dinâmico de rotações de pastagem baseado no volume real de forragem disponível.</p>
            </div>
            <div class="feature-card">
                <i class="fa-solid fa-brain"></i>
                <h3>IA para Manejo</h3>
                <p>Algoritmos de inteligência artificial indicam o momento exato de troca de piquete.</p>
            </div>
        </div>
    </div>
</section>

<?php require_once BASE_PATH . '/public/produtos.php'; ?>

<section class="section" id="servicos" style="padding: 60px 0; background-color: #070a12;">
    <div class="container">
        <div class="section-title" style="text-align: center; margin-bottom: 40px;">
            <h2 style="font-size: 2rem; color: #ffffff; margin-bottom: 10px;">Nossos <span style="color: #00ffaa;">Serviços</span></h2>
            <p style="color: #9ca3af;">Soluções completas para o produtor rural e agrônomo moderno.</p>
        </div>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 24px;">

            <div style="background: #111827; border: 1px solid rgba(255,255,255,0.05); border-radius: 12px; padding: 28px; transition: 0.3s;" onmouseover="this.style.borderColor='#00ffaa'" onmouseout="this.style.borderColor='rgba(255,255,255,0.05)'">
                <div style="font-size: 2.2rem; margin-bottom: 15px;">🌱</div>
                <h3 style="color: #fff; font-size: 1.1rem; margin-bottom: 10px;">Agricultura de Precisão</h3>
                <p style="color: #9ca3af; font-size: 0.9rem; line-height: 1.6;">Mapeamento e manejo inteligente da lavoura com tecnologia de ponta para maximizar a produtividade por hectare.</p>
            </div>

            <div style="background: #111827; border: 1px solid rgba(255,255,255,0.05); border-radius: 12px; padding: 28px; transition: 0.3s;" onmouseover="this.style.borderColor='#00bfff'" onmouseout="this.style.borderColor='rgba(255,255,255,0.05)'">
                <div style="font-size: 2.2rem; margin-bottom: 15px;">🛰️</div>
                <h3 style="color: #fff; font-size: 1.1rem; margin-bottom: 10px;">Sensoriamento Remoto</h3>
                <p style="color: #9ca3af; font-size: 0.9rem; line-height: 1.6;">Monitoramento de áreas agrícolas por satélite e drones com imagens de alta resolução e índices vegetativos.</p>
            </div>

            <div style="background: #111827; border: 1px solid rgba(255,255,255,0.05); border-radius: 12px; padding: 28px; transition: 0.3s;" onmouseover="this.style.borderColor='#f59e0b'" onmouseout="this.style.borderColor='rgba(255,255,255,0.05)'">
                <div style="font-size: 2.2rem; margin-bottom: 15px;">📊</div>
                <h3 style="color: #fff; font-size: 1.1rem; margin-bottom: 10px;">Análise de Dados</h3>
                <p style="color: #9ca3af; font-size: 0.9rem; line-height: 1.6;">Tomada de decisões baseada em informações estratégicas com relatórios detalhados e indicadores de desempenho.</p>
            </div>

            <div style="background: #111827; border: 1px solid rgba(255,255,255,0.05); border-radius: 12px; padding: 28px; transition: 0.3s;" onmouseover="this.style.borderColor='#00ffaa'" onmouseout="this.style.borderColor='rgba(255,255,255,0.05)'">
                <div style="font-size: 2.2rem; margin-bottom: 15px;">🌾</div>
                <h3 style="color: #fff; font-size: 1.1rem; margin-bottom: 10px;">Consultoria Agronômica</h3>
                <p style="color: #9ca3af; font-size: 0.9rem; line-height: 1.6;">Planejamento e otimização da produção agrícola com acompanhamento técnico de agrônomos especializados.</p>
            </div>

            <div style="background: #111827; border: 1px solid rgba(255,255,255,0.05); border-radius: 12px; padding: 28px; transition: 0.3s;" onmouseover="this.style.borderColor='#a3e635'" onmouseout="this.style.borderColor='rgba(255,255,255,0.05)'">
                <div style="font-size: 2.2rem; margin-bottom: 15px;">🐄</div>
                <h3 style="color: #fff; font-size: 1.1rem; margin-bottom: 10px;">Gestão de Pastagem</h3>
                <p style="color: #9ca3af; font-size: 0.9rem; line-height: 1.6;">Controle de piquetes, taxa de lotação e rotação de pastagem para maximizar a produção do seu rebanho com menos custo.</p>
            </div>

            <div style="background: #111827; border: 1px solid rgba(255,255,255,0.05); border-radius: 12px; padding: 28px; transition: 0.3s;" onmouseover="this.style.borderColor='#00bfff'" onmouseout="this.style.borderColor='rgba(255,255,255,0.05)'">
                <div style="font-size: 2.2rem; margin-bottom: 15px;">💧</div>
                <h3 style="color: #fff; font-size: 1.1rem; margin-bottom: 10px;">Manejo Hídrico</h3>
                <p style="color: #9ca3af; font-size: 0.9rem; line-height: 1.6;">Planejamento e monitoramento do uso eficiente da água na propriedade, reduzindo desperdício e aumentando a produtividade.</p>
            </div>

            <div style="background: #111827; border: 1px solid rgba(255,255,255,0.05); border-radius: 12px; padding: 28px; transition: 0.3s;" onmouseover="this.style.borderColor='#f59e0b'" onmouseout="this.style.borderColor='rgba(255,255,255,0.05)'">
                <div style="font-size: 2.2rem; margin-bottom: 15px;">📋</div>
                <h3 style="color: #fff; font-size: 1.1rem; margin-bottom: 10px;">Laudos e Receituários</h3>
                <p style="color: #9ca3af; font-size: 0.9rem; line-height: 1.6;">Emissão de laudos técnicos, receituários agronômicos e documentação necessária para aplicação de defensivos e fertilizantes.</p>
            </div>

            <div style="background: #111827; border: 1px solid rgba(255,255,255,0.05); border-radius: 12px; padding: 28px; transition: 0.3s;" onmouseover="this.style.borderColor='#00bfff'" onmouseout="this.style.borderColor='rgba(255,255,255,0.05)'">
                <div style="font-size: 2.2rem; margin-bottom: 15px;">💦</div>
                <h3 style="color: #fff; font-size: 1.1rem; margin-bottom: 10px;">Projeto de Irrigação</h3>
                <p style="color: #9ca3af; font-size: 0.9rem; line-height: 1.6;">Elaboração e execução de projetos de irrigação personalizados para sua propriedade, com dimensionamento técnico e acompanhamento da instalação.</p>
            </div>

        </div>
    </div>
</section>

<?php require_once BASE_PATH . '/public/footer.php'; ?>

<!-- Botão WhatsApp Flutuante -->
<a href="https://wa.me/5538999797257?text=Olá!+Gostaria+de+mais+informações+sobre+a+Agro+Power."
   target="_blank"
   style="position: fixed; bottom: 28px; right: 28px; z-index: 999; width: 58px; height: 58px; background: #25d366; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; box-shadow: 0 4px 20px rgba(37,211,102,0.4); transition: 0.3s;"
   onmouseover="this.style.transform='scale(1.12)'; this.style.boxShadow='0 6px 28px rgba(37,211,102,0.6)'"
   onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 20px rgba(37,211,102,0.4)'">
    <i class="fa-brands fa-whatsapp" style="font-size: 2rem; color: #fff;"></i>
</a>

</body>
</html>