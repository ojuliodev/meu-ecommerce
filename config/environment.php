<?php
// define('ENVIRONMENT', 'development');
define('ENVIRONMENT', 'production');

// Caso o projeto esteja dentro de uma pasta e não na raiz do www|htdocs
define('DIR_ROOT', 'ecommerce');

define('DIR_SERVER', $_SERVER['SERVER_NAME']);
define('DIR_PROTOCOL', ($_SERVER['SERVER_PORT'] != '80') ? 'https' : 'http');

// http://localhost/ecommerce
define('DIR_PATH', DIR_PROTOCOL . '://' . DIR_SERVER . '/' . DIR_ROOT);

define('DIR_CSS', DIR_PATH . '/assets/css');
define('DIR_JS', DIR_PATH . '/assets/js');
define('DIR_IMG', DIR_PATH . '/assets/images');
define('DIR_FNT', DIR_PATH . '/assets/fonts');