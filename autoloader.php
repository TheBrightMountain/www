<?php
spl_autoload_register(function ($class_name) {
    $directories = [
        'php/db_handler/',
    ];
    foreach ($directories as $directory) {
        $class_file = $directory . str_replace('\\', '/', $class_name) . '.php';
        if (file_exists($class_file)) {
            require_once $class_file;
            return;
        }
    }
});

//Does not work for watever reasons
