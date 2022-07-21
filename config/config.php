<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config/environment.php');

if (ENVIRONMENT === 'development') {
  define('DB_HOST', 'localhost');
  define('DB_PORT', '3306');
  define('DB_NAME', 'db_ecommerce');
  define('DB_USER', 'root');
  define('DB_PASS', '');
  define('DB_TABLE', 'product');
} else {
  define('DB_HOST', 'localhost');
  define('DB_PORT', '3306');
  define('DB_NAME', 'u668278917_db_ecommerce');
  define('DB_USER', 'u668278917_ecommerce');
  define('DB_PASS', '>BB[eITiz5N');
  define('DB_TABLE', 'product');
}
