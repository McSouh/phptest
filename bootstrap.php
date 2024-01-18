<?php

require "./vendor/autoload.php";
require_once './autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

$config = include 'config.php';

$capsule = new Capsule;
$capsule->addConnection([
   "driver" => $config['DB_DRIVER'],
   "host" => $config['DB_HOST'],
   "port" => $config['DB_PORT'],
   "database" => $config['DB_DATABASE'],
   "username" => $config['DB_USERNAME'],
   "password" => $config['DB_PASSWORD'],
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();