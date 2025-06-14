<?php
declare(strict_types=1);

/**
 * @param $classname
 */
function libraryOne($classname) {
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $classname).'.php';
    if (file_exists($file)) {
        require_once($file);
    } else {
        $file = str_replace('\\', DIRECTORY_SEPARATOR, lcfirst($classname)).'.php';
        if (file_exists($file)) {
            require_once($file);
        }
    }
}
// регистрация
spl_autoload_register('libraryOne');
