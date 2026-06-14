<?php
declare(strict_types=1);

session_start();

define('BASE_PATH', dirname(__DIR__));

// Autoload
spl_autoload_register(function (string $class): void {
    $partes = explode('\\', $class);
    $nomeClasse = end($partes);

    $caminhos = [
        BASE_PATH . '/core/' . $nomeClasse . '.php',
        BASE_PATH . '/core/' . $class . '.php',
        BASE_PATH . '/app/Controllers/' . $nomeClasse . '.php',
        BASE_PATH . '/app/Models/' . $nomeClasse . '.php',
    ];

    foreach ($caminhos as $arquivo) {
        if (file_exists($arquivo)) {
            require_once $arquivo;
            return;
        }
    }
});

// Config
require_once BASE_PATH . '/config/database.php';

// URI
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = rtrim($uri, '/') ?: '/';
$uri = str_replace('/peres/wazedoagro/public', '', $uri);
$uri = $uri ?: '/';

$method = $_SERVER['REQUEST_METHOD'];

// Rotas
$rotas = [
    'GET' => [
        '/'                              => ['HomeController',       'index'],
        '/login'                         => ['AuthController',       'login'],
        '/cadastro'                      => ['AuthController',       'cadastro'],
        '/logout'                        => ['AuthController',       'logout'],
        '/dashboard'                     => ['DashboardController',  'index'],
        '/admin'                         => ['AdminController',      'index'],
        '/admin/editar'                  => ['AdminController',      'editarUsuario'],
        '/admin/deletar'                 => ['AdminController',      'deletarUsuario'],
        '/admin/pedidos'                 => ['PedidoController',     'adminIndex'],
        '/admin/produtos'                => ['ProdutoController',    'index'],
        '/admin/produtos/novo'           => ['ProdutoController',    'criar'],
        '/admin/produtos/editar'         => ['ProdutoController',    'editar'],
        '/admin/produtos/deletar'        => ['ProdutoController',    'deletar'],
        '/admin/categorias'              => ['CategoriaController',  'index'],
        '/admin/categorias/novo'         => ['CategoriaController',  'criar'],
        '/admin/categorias/editar'       => ['CategoriaController',  'editar'],
        '/admin/categorias/deletar'      => ['CategoriaController',  'deletar'],
        '/admin/fornecedores'            => ['FornecedorController', 'index'],
        '/admin/fornecedores/novo'       => ['FornecedorController', 'criar'],
        '/admin/fornecedores/editar'     => ['FornecedorController', 'editar'],
        '/admin/fornecedores/deletar'    => ['FornecedorController', 'deletar'],
        '/pedidos'                       => ['PedidoController',     'index'],
        '/pedidos/novo'                  => ['PedidoController',     'criar'],
        '/carrinho'                      => ['CarrinhoController',   'index'],
        '/carrinho/remover'              => ['CarrinhoController',   'remover'],
        '/carrinho/finalizar'            => ['CarrinhoController',   'finalizar'],
    ],
    'POST' => [
        '/login'                         => ['AuthController',       'login'],
        '/cadastro'                      => ['AuthController',       'cadastro'],
        '/admin/atualizar'               => ['AdminController',      'atualizarUsuario'],
        '/admin/pedidos/status'          => ['PedidoController',     'atualizarStatus'],
        '/admin/produtos/salvar'         => ['ProdutoController',    'salvar'],
        '/admin/produtos/atualizar'      => ['ProdutoController',    'atualizar'],
        '/admin/categorias/salvar'       => ['CategoriaController',  'salvar'],
        '/admin/categorias/atualizar'    => ['CategoriaController',  'atualizar'],
        '/admin/fornecedores/salvar'     => ['FornecedorController', 'salvar'],
        '/admin/fornecedores/atualizar'  => ['FornecedorController', 'atualizar'],
        '/pedidos/salvar'                => ['PedidoController',     'salvar'],
        '/carrinho/adicionar'            => ['CarrinhoController',   'adicionar'],
    ],
];

if (isset($rotas[$method][$uri])) {
    [$controllerNome, $action] = $rotas[$method][$uri];
    $controllerArquivo = BASE_PATH . '/app/Controllers/' . $controllerNome . '.php';

    if (file_exists($controllerArquivo)) {
        require_once $controllerArquivo;
        $controller = new $controllerNome();
        $controller->$action();
    } else {
        http_response_code(404);
        require_once BASE_PATH . '/app/Views/errors/404.php';
    }
} else {
    http_response_code(404);
    require_once BASE_PATH . '/app/Views/errors/404.php';
}