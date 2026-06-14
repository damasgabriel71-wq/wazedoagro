# 🌱 Agro Power — Plataforma de Gestão Agronômica

Sistema web desenvolvido em PHP com arquitetura MVC para gestão de propriedades rurais, comercialização de produtos agropecuários e prestação de serviços agronômicos.

---

## 📋 Sobre o Projeto

O **Agro Power** é uma plataforma completa voltada para produtores rurais e agrônomos, oferecendo:

- Vitrine de produtos agropecuários com carrinho de compras
- Sistema de pedidos e acompanhamento
- Área administrativa completa
- Gestão de clientes, produtos, categorias e fornecedores
- Autenticação segura com controle de acesso por perfil

---

## 🚀 Tecnologias Utilizadas

| Tecnologia | Versão | Finalidade |
|---|---|---|
| PHP | 8.2 | Backend e lógica de negócio |
| MySQL | 8.0 | Banco de dados relacional |
| Apache | 2.4 | Servidor web |
| XAMPP | - | Ambiente de desenvolvimento local |
| HTML5 e CSS3 | - | Interface do usuário |
| JavaScript | ES6+ | Interatividade no frontend |
| Font Awesome | 6.4 | Ícones |
| Git e GitHub | - | Versionamento de código |

---

## 🏗️ Arquitetura MVC

O projeto segue o padrão **Model-View-Controller (MVC)**:

### O que é MVC?
- **Model** — responsável pelos dados e pelo banco de dados
- **View** — responsável pela interface visual (HTML/CSS)
- **Controller** — responsável pela lógica e por conectar Model e View

### Estrutura de Pastas
wazedoagro/

├── app/

│   ├── Controllers/

│   │   ├── AuthController.php       # Login, cadastro e logout

│   │   ├── AdminController.php      # Painel administrativo

│   │   ├── DashboardController.php  # Painel do cliente

│   │   ├── ProdutoController.php    # CRUD de produtos

│   │   ├── PedidoController.php     # CRUD de pedidos

│   │   ├── CarrinhoController.php   # Carrinho de compras

│   │   ├── CategoriaController.php  # CRUD de categorias

│   │   └── FornecedorController.php # CRUD de fornecedores

│   ├── Models/

│   │   ├── Usuario.php     # Modelo de usuários

│   │   ├── Produto.php     # Modelo de produtos

│   │   ├── Pedido.php      # Modelo de pedidos

│   │   ├── Carrinho.php    # Modelo do carrinho

│   │   ├── Categoria.php   # Modelo de categorias

│   │   └── Fornecedor.php  # Modelo de fornecedores

│   └── Views/

│       ├── auth/           # Telas de login e cadastro

│       ├── admin/          # Telas administrativas

│       ├── dashboard/      # Painel do cliente

│       ├── pedidos/        # Telas de pedidos

│       ├── carrinho/       # Tela do carrinho

│       ├── layouts/        # Header e footer

│       └── errors/         # Páginas de erro

├── core/

│   ├── Auth.php        # Controle de autenticação

│   ├── Controller.php  # Classe base dos controllers

│   ├── Database.php    # Conexão com banco de dados PDO

│   ├── Model.php       # Classe base dos models

│   └── Router.php      # Roteamento de URLs

├── config/

│   └── database.php    # Configurações do banco

├── public/

│   ├── index.php       # Front controller entrada do sistema

│   ├── home.php        # Landing page

│   ├── slider.php      # Slider de imagens

│   ├── produtos.php    # Seção de produtos

│   ├── footer.php      # Rodapé

│   ├── css/            # Arquivos de estilo

│   └── assets/         # Imagens e recursos

└── routes/

└── web.php         # Definição de rotas
---

## 🗄️ Banco de Dados

**Nome do banco:** `wazedopasto`

### Tabelas do Sistema

| Tabela | Descrição |
|---|---|
| `usuarios` | Armazena clientes e administradores |
| `produtos` | Catálogo de produtos com estoque |
| `pedidos` | Pedidos realizados pelos clientes |
| `carrinho` | Itens adicionados ao carrinho |
| `categorias` | Categorias dos produtos |
| `fornecedores` | Fornecedores dos produtos |

---

## ✅ Funcionalidades do Sistema

### 👤 Registro e Autenticação
- Cadastro de clientes com nome, e-mail, telefone e senha
- Login com e-mail e senha
- Logout com destruição de sessão
- Senhas armazenadas com `password_hash()` bcrypt
- Proteção de rotas por perfil de usuário cliente e admin

### 🏠 Área do Cliente
- Dashboard personalizado com boas-vindas
- Visualização de pedidos realizados
- Realização de novos pedidos
- Carrinho de compras com resumo e total
- Busca de produtos em tempo real

### 🔧 Área Administrativa
- Acesso restrito apenas para administradores
- **CRUD de Clientes** — listar, editar tipo e remover
- **CRUD de Produtos** — listar, criar, editar, ativar/desativar e remover
- **CRUD de Pedidos** — listar e atualizar status
- **CRUD de Categorias** — listar, criar, editar e remover
- **CRUD de Fornecedores** — listar, criar, editar e remover

### 🛒 Funcionalidades Extras
- **Busca de produtos** — filtro em tempo real por nome
- **Carrinho de compras** — adicionar da página inicial sem login, pedindo autenticação só na finalização
- **Controle de estoque** — desconto automático ao realizar pedido com validação de quantidade disponível

---

## 🔐 Segurança

- Senhas criptografadas com `password_hash()` algoritmo bcrypt
- Verificação de senha com `password_verify()`
- Proteção de rotas administrativas por verificação de sessão
- Sanitização de saídas com `htmlspecialchars()`
- Queries preparadas com PDO para prevenir SQL Injection
- Arquivos sensíveis no `.gitignore` para não expor credenciais

---

## ⚙️ Como Instalar e Rodar Localmente

### Pré-requisitos
- XAMPP instalado com PHP 8.2, Apache e MySQL
- Git instalado

### Passo a passo

**1. Clone o repositório:**
```bash
git clone https://github.com/damasgabriel71-wq/wazedoagro.git
```

**2. Mova para a pasta do XAMPP:**
C:/xampp/htdocs/peres/wazedoagro
**3. Crie o banco de dados:**
- Abra o phpMyAdmin em `localhost/phpmyadmin`
- Crie um banco chamado `wazedopasto`
- Execute o SQL:

```sql
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    telefone VARCHAR(20) NULL,
    senha VARCHAR(255) NOT NULL,
    tipo ENUM('cliente','admin') NOT NULL DEFAULT 'cliente',
    criado_em DATETIME NOT NULL DEFAULT NOW()
);

CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    categoria ENUM('sal_gado','equinos','capim') NOT NULL,
    preco DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    estoque INT NOT NULL DEFAULT 0,
    descricao TEXT NULL,
    ativo TINYINT(1) NOT NULL DEFAULT 1,
    criado_em DATETIME NOT NULL DEFAULT NOW()
);

CREATE TABLE pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    produto VARCHAR(255) NOT NULL,
    quantidade INT NOT NULL DEFAULT 1,
    status ENUM('pendente','confirmado','entregue','cancelado') NOT NULL DEFAULT 'pendente',
    observacao TEXT NULL,
    criado_em DATETIME NOT NULL DEFAULT NOW(),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

CREATE TABLE carrinho (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    produto_id INT NOT NULL,
    quantidade INT NOT NULL DEFAULT 1,
    criado_em DATETIME NOT NULL DEFAULT NOW(),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE,
    FOREIGN KEY (produto_id) REFERENCES produtos(id) ON DELETE CASCADE
);

CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT NULL,
    criado_em DATETIME NOT NULL DEFAULT NOW()
);

CREATE TABLE fornecedores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NULL,
    telefone VARCHAR(20) NULL,
    endereco TEXT NULL,
    criado_em DATETIME NOT NULL DEFAULT NOW()
);
```

**4. Configure o banco em `config/database.php`:**
```php
<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'wazedopasto');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8');
```

**5. Inicie o Apache e MySQL no XAMPP**

**6. Acesse no navegador:**
http://localhost:8080/peres/wazedoagro/public
---

## 👤 Usuário Administrador Padrão

| Campo | Valor |
|---|---|
| E-mail | admin@admin.com |
| Senha | password |

---

## 📱 Rotas do Sistema

| Rota | Descrição | Acesso |
|---|---|---|
| `/` | Landing page | Público |
| `/login` | Tela de login | Público |
| `/cadastro` | Tela de cadastro | Público |
| `/logout` | Encerrar sessão | Autenticado |
| `/dashboard` | Painel do cliente | Cliente |
| `/pedidos` | Meus pedidos | Cliente |
| `/pedidos/novo` | Fazer novo pedido | Cliente |
| `/carrinho` | Carrinho de compras | Cliente |
| `/admin` | Painel administrativo | Admin |
| `/admin/produtos` | Gestão de produtos | Admin |
| `/admin/pedidos` | Gestão de pedidos | Admin |
| `/admin/categorias` | Gestão de categorias | Admin |
| `/admin/fornecedores` | Gestão de fornecedores | Admin |

---

## 👨‍💻 Autor

**Gabriel Damas**
- GitHub: [@damasgabriel71-wq](https://github.com/damasgabriel71-wq)
- E-mail: damasgabriel71@gmail.com

---

## 📄 Licença

Este projeto foi desenvolvido para fins acadêmicos.

---

*Desenvolvido com 💚 para o agro brasileiro*