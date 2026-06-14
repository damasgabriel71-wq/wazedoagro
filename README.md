# 🌱 Agro Power - Wazedoagro

Sistema de gestão de fazendas com IA para manejo de pastagens.

## Estrutura MVC

```
wazedoagro/
├── app/
│   ├── Controllers/         # Lógica de cada rota
│   │   ├── AuthController.php
│   │   ├── DashboardController.php
│   │   ├── FazendaController.php
│   │   └── HomeController.php
│   ├── Models/              # Acesso ao banco de dados (PDO)
│   │   ├── Fazenda.php
│   │   ├── Piquete.php
│   │   └── Usuario.php
│   └── Views/               # Templates HTML/PHP
│       ├── layouts/         # header.php e footer.php reutilizáveis
│       ├── home/
│       ├── auth/
│       ├── dashboard/
│       ├── fazenda/
│       └── errors/
├── config/
│   └── database.php         # Carrega variáveis do .env
├── core/                    # Classes base do framework
│   ├── Auth.php             # Sessão e autenticação
│   ├── Controller.php       # Classe base dos controllers
│   ├── Database.php         # Singleton PDO
│   ├── Model.php            # Classe base dos models
│   └── Router.php           # Roteamento de URLs
├── public/                  # Único diretório público
│   ├── index.php            # Front controller (ponto de entrada)
│   ├── css/
│   ├── js/
│   └── assets/
├── routes/
│   └── web.php              # Definição de todas as rotas
├── .env.example             # Exemplo de variáveis de ambiente
├── .gitignore
└── .htaccess                # Redireciona tudo para public/
```

## Instalação (XAMPP)

1. Copie a pasta para `C:/xampp/htdocs/wazedoagro`
2. Copie `.env.example` para `.env` e configure o banco
3. Importe o banco de dados MySQL
4. Acesse `http://localhost/wazedoagro`

## Tecnologias

- PHP 8 com strict types e POO
- MySQL com PDO
- Arquitetura MVC sem frameworks externos
- Autenticação com sessões seguras
