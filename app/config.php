<?php

/*
 * Define o nome da aplicação.
 */
define('NOME_APP', 'Framework MVC');

/*
 * Configurações do banco de dados que será utilizado na aplicação
 * Essa constante será usada na classe system\Database para conectar ao banco de dados.
 */
define('MYSQL_CONFIG', [
    'host' => 'localhost', // Endereço do host (ex: 'localhost' ou IP do servidor).
    'database' => 'gestao_livraria', // Nome do banco de dados a ser utilizado.
    'username' => 'pedro', // Nome do usuário para acessar o banco.
    'password' => '@Science1' // Senha do usuário do banco de dados
]);

/*
 * Constantes utilizadas para criptografar e descriptografar dados
 * Serão usadas em app/helpers/functions para garantir a segurança dos dados
 */
define('OPENSSL_KEY', 'H0SDRQzIGqclX2kbYBk9xspdn9U5f3Wa'); // Chave utilizada pelo OpenSSL para criptografia e descriptografia
define('OPENSSL_IV', 'BzKAbjuREsHgnw56'); // Vetor de inicialização (IV) para a criptografia OpenSSL

/*
 * Chave de criptografia AES para encriptar e desencriptar dados sensíveis no MySQL.
 * Essa chave deve ser mantida em sigilo e nunca ser exposta em repositórios públicos.
 * Alterá-la resultará na impossibilidade de acessar dados criptografados anteriormente.
 */
define('MYSQL_AES_KEY', 'Vduu47qL51hLn6bkYkY6NlO1nivsmdfD');