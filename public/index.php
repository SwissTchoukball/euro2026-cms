<?php

require '../vendor/autoload.php';

$kirby = new Kirby([
    'roots' => [
        'index'    => __DIR__,
        'base'     => $base = dirname(__DIR__),
        'site'     => $base . '/site',
        'storage'  => $storage = $base . '/storage',
        'accounts' => $storage . '/accounts',
        'content'  => $storage . '/content',
        'cache'    => $storage . '/cache',
        'sessions' => $storage . '/sessions',
    ]
]);

echo $kirby->render();
