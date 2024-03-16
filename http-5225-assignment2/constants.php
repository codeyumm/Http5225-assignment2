<?php 
    define('BASE_PATH', __DIR__);
    define('PUBLIC_PATH', BASE_PATH . '\public');
    define('LAYOUT_PATH', BASE_PATH . '\src\layout');

    $originalPath =  BASE_PATH;

    $parts = explode('\\', $originalPath);


    $dirPath = end($parts);
    $cssPath =  PUBLIC_PATH . '\style.css';
    $sharedLayout = LAYOUT_PATH . '\shared';