<?php
declare(strict_types=1);

spl_autoload_register(function(string $class) {
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    if (file_exists($file)) {
        echo "Файл $file найден:" . PHP_EOL;
        echo PHP_EOL;
        require_once($file);
    }
});