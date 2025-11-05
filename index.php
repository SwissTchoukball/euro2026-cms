<?php

require 'vendor/autoload.php';

echo (new Kirby([
  'roots' => [
    'index' => __DIR__
  ]
]))->render();
