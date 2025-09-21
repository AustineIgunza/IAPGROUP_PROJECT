<?php
/**
 * Simple Autoloader for your project classes
 * Loads any class from folders: Global, Forms, Layouts, Plugins, etc.
 */

spl_autoload_register(function ($class) {
    // List of folders to check
    $folders = [
        __DIR__ . '/Global/',
        __DIR__ . '/Forms/',
        __DIR__ . '/Layouts/',
        __DIR__ . '/Plugins/',
    ];

    // Loop through folders and look for the class file
    foreach ($folders as $folder) {
        $file = $folder . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Load configuration if available
if (file_exists(__DIR__ . '/conf.php')) {
    require_once __DIR__ . '/conf.php';
}