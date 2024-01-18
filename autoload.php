<?php

spl_autoload_register(function ($class) {
    $file = str_replace('\\', '/', $class) . '.php';
    include_once __DIR__ . '/' . $file;
});
