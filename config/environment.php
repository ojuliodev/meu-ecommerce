<?php
// define('ENVIRONMENT', 'development'), feito manualmente como condição para as constantes de conexão com o banco;
define('ENVIRONMENT', 'production');

// Caso o projeto esteja dentro de uma pasta e não na raiz do www|htdocs
define('DIR_ROOT', '');

// Define o nome do servidor
define('DIR_SERVER', $_SERVER['SERVER_NAME']);

// Define se a porta é https ou http
define('DIR_PROTOCOL', ($_SERVER['SERVER_PORT'] != '80') ? 'https' : 'http');

// Monta a url -- http://localhost/ecommerce
define('DIR_PATH', DIR_PROTOCOL . '://' . DIR_SERVER . '/' . DIR_ROOT);

// Define caminhos
define('DIR_CSS', DIR_PATH . '/assets/css');
define('DIR_JS', DIR_PATH . '/assets/js');
define('DIR_IMG', DIR_PATH . '/assets/images');
define('DIR_FNT', DIR_PATH . '/assets/fonts');