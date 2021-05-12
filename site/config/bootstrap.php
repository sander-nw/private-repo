<?php
define('ROOT_PATH', realpath(dirname(__FILE__).'/../').'/');

require ROOT_PATH.'../env-config/config.php';
require ROOT_PATH.'config/constants.php';
require ROOT_PATH.'vendor/autoload.php';

$_SERVER['APP_ENV'] = $_ENV['APP_ENV'] = APPLICATION_ENV;
$_SERVER['APP_DEBUG'] = $_SERVER['APP_DEBUG'] ?? $_ENV['APP_DEBUG'] ?? ($_SERVER['APP_ENV'] !== 'live');

