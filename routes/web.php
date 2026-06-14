<?php
declare(strict_types=1);

use Core\Router;

$router = new Router();

// Página inicial
$router->get('/',          'HomeController',     'index');

// Autenticação
$router->get('/login',     'AuthController',     'index');
$router->post('/login',    'AuthController',     'login');
$router->get('/cadastro',  'AuthController',     'cadastro');
$router->post('/cadastro', 'AuthController',     'store');
$router->get('/logout',    'AuthController',     'logout');

// Dashboard (requer login)
$router->get('/dashboard', 'DashboardController','index');

// Fazendas
$router->get('/fazendas',          'FazendaController', 'index');
$router->get('/fazendas/criar',    'FazendaController', 'criar');
$router->post('/fazendas/salvar',  'FazendaController', 'salvar');
$router->get('/fazendas/editar',   'FazendaController', 'editar');
$router->post('/fazendas/deletar', 'FazendaController', 'deletar');

// Piquetes
$router->get('/piquetes',          'PiqueteController', 'index');
$router->post('/piquetes/salvar',  'PiqueteController', 'salvar');

// Monitoramento
$router->get('/monitoramento',     'MonitoramentoController', 'index');

return $router;
