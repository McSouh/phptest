<?php

require "./vendor/autoload.php";
require_once './autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

$config = include 'config.php';

$dbDriver = $config['DB_DRIVER'];
$dbHost = $config['DB_HOST'];
$dbPort = $config['DB_PORT'];
$dbDatabase = $config['DB_DATABASE'];
$dbUsername = $config['DB_USERNAME'];
$dbPassword = $config['DB_PASSWORD'];


$capsule = new Capsule;
$capsule->addConnection([
   "driver" => $dbDriver,
   "host" => $dbHost,
   "port" => $dbPort,
   "database" => $dbDatabase,
   "username" => $dbUsername,
   "password" => $dbPassword,
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();