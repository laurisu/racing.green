<?php
require '../vendor/autoload.php';
$app = new \Slim\Slim();
$app->get('/hello/:name', function ($name) {
    echo "Hello, $name";
});
$app->get('/it', function () {
    echo "It works";
});
$app->run();
