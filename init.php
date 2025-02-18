<?php
if (version_compare(PHP_VERSION, '7.4.0') == -1)
{
    die ('The minimum version required for PHP is 7.4.0');
}

if (!file_exists('app/config/application.ini'))
{
    die('Application configuration file not found');
}

// define the autoloader
require_once 'lib/adianti/core/AdiantiCoreLoader.php';
spl_autoload_register(array('Adianti\Core\AdiantiCoreLoader', 'autoload'));
Adianti\Core\AdiantiCoreLoader::loadClassMap();

$loader = require 'vendor/autoload.php';
$loader->register();

// read configurations
$ini = parse_ini_file('app/config/application.ini', true);
date_default_timezone_set($ini['general']['timezone']);
AdiantiCoreTranslator::setLanguage( $ini['general']['language'] );
ApplicationTranslator::setLanguage( $ini['general']['language'] );
AdiantiApplicationConfig::load($ini);
AdiantiApplicationConfig::apply();

// define constants
define('APPLICATION_NAME', $ini['general']['application']);
define('OS', strtoupper(substr(PHP_OS, 0, 3)));
define('PATH', dirname(__FILE__));
define('LANG', $ini['general']['language']);

// custom session name
session_name('PHPSESSID_'.$ini['general']['application']);

setlocale(LC_ALL, 'C');

// Carregar variáveis de ambiente do .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// $communicationConfig = parse_ini_file('app/config/communication.ini', true);
// $communicationConfig['database']['host'] = $_ENV['DB_HOST'];
// $communicationConfig['database']['port'] = $_ENV['DB_PORT'];
// $communicationConfig['database']['name'] = $_ENV['DB_NAME'];
// $communicationConfig['database']['user'] = $_ENV['DB_USER'];
// $communicationConfig['database']['pass'] = $_ENV['DB_PASS'];
// $communicationConfig['database']['type'] = $_ENV['DB_TYPE'];

// $logConfig = parse_ini_file('app/config/log.ini', true);
// $logConfig['database']['host'] = $_ENV['DB_HOST'];
// $logConfig['database']['port'] = $_ENV['DB_PORT'];
// $logConfig['database']['name'] = $_ENV['DB_NAME'];
// $logConfig['database']['user'] = $_ENV['DB_USER'];
// $logConfig['database']['pass'] = $_ENV['DB_PASS'];
// $logConfig['database']['type'] = $_ENV['DB_TYPE'];

// $permissionConfig = parse_ini_file('app/config/permission.ini', true);
// $permissionConfig['database']['host'] = $_ENV['DB_HOST'];
// $permissionConfig['database']['port'] = $_ENV['DB_PORT'];
// $permissionConfig['database']['name'] = $_ENV['DB_NAME'];
// $permissionConfig['database']['user'] = $_ENV['DB_USER'];
// $permissionConfig['database']['pass'] = $_ENV['DB_PASS'];
// $permissionConfig['database']['type'] = $_ENV['DB_TYPE'];

// $unitAConfig = parse_ini_file('app/config/unit_a.ini', true);
// $unitAConfig['database']['host'] = $_ENV['DB_HOST'];
// $unitAConfig['database']['port'] = $_ENV['DB_PORT'];
// $unitAConfig['database']['name'] = $_ENV['DB_NAME'];
// $unitAConfig['database']['user'] = $_ENV['DB_USER'];
// $unitAConfig['database']['pass'] = $_ENV['DB_PASS'];
// $unitAConfig['database']['type'] = $_ENV['DB_TYPE'];

// $unitBConfig = parse_ini_file('app/config/unit_b.ini', true);
// $unitBConfig['database']['host'] = $_ENV['DB_HOST'];
// $unitBConfig['database']['port'] = $_ENV['DB_PORT'];
// $unitBConfig['database']['name'] = $_ENV['DB_NAME'];
// $unitBConfig['database']['user'] = $_ENV['DB_USER'];
// $unitBConfig['database']['pass'] = $_ENV['DB_PASS'];
// $unitBConfig['database']['type'] = $_ENV['DB_TYPE'];