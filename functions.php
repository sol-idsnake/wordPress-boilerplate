<?php

$includes_dir = 'includes';

// Array of files to include.
$understrap_includes = array(
    '/enqueue.php',
    '/setup.php',
    '/theme-settings.php',
);

// Include files.
foreach ($understrap_includes as $file) {
    require_once get_theme_file_path($includes_dir . $file);
}
