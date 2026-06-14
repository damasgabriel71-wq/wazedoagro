<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'Agro Power') ?></title>
    <link rel="stylesheet" href="/peres/wazedoagro/public/css/style.css?v=<?= time() ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<header class="navbar">
    <div class="container nav-inner">
        <div class="logo">🌱 <span>Agro</span> Power</div>
        <nav class="nav-menu">
            <a href="#beneficios">Benefícios</a>
            <a href="#planos">Planos</a>
        </nav>
        <div style="display:flex; gap:12px;">
            <?php if (\Core\Auth::check()): ?>
                <a href="/peres/wazedoagro/public/dashboard" class="btn btn-dark">Dashboard</a>
                <a href="/peres/wazedoagro/public/logout" class="btn btn-primary">Sair</a>
            <?php else: ?>
                <a href="/peres/wazedoagro/public/login" class="btn btn-dark">Entrar</a>
                <a href="/peres/wazedoagro/public/cadastro" class="btn btn-primary">Criar Conta</a>
            <?php endif; ?>
        </div>
    </div>
</header>