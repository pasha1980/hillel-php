<?php

ini_set('display_errors', '1');

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Aigletter\Framework\Application();
$app->run();
