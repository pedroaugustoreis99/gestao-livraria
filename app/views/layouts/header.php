<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $titulo ?></title>
    <link rel="stylesheet" href="/public/assets/estilo.css">
</head>
<body>
    <header>
        <div class="container">
            <h1 class="logo">Minha Livraria</h1>
            <?php if (isset($_SESSION['id_usuario'])): ?>
                <nav>
                    <ul class="menu_principal">
                        <li><a href="/autores">Autores</a></li>
                        <li><a href="/generos">Gêneros</a></li>
                        <li><a href="/livros">Livros</a></li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                            </svg>

                            <?php
                                $login_model = new models\LoginModel();
                                $usuario = $login_model->retorna_usuario($_SESSION['id_usuario']);
                            ?>
                            <?= $usuario ?>
                            
                        </li>
                        <li><a href="/editar-perfil">Editar dados usuário</a></li>
                        <li><a href="/logout">Clique aqui para deslogar</a></li>    
                    </ul>
                </nav>
            <?php else: ?>
                <div class="menu_alternativo">
                    <a href="/login">Realizar login</a>
                    <a href="/cadastrar-usuario">Cadastrar usuário</a>
                </div>
            <?php endif; ?>
        </div>
    </header>