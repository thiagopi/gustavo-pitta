<?php

spl_autoload_register(function ($class) {
    require_once(str_replace('\\', '/', ROOT_PATH . '/framework-files/' . $class . '.php'));
});

?>