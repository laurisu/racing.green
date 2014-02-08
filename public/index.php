<?php
require '../vendor/autoload.php';
$app = new \Slim\Slim(array(
    'debug' => true,
    'view' => new \Slim\Views\Twig(),
    'templates.path' => '../templates',
));
$app->get('/hello/:name', function ($name) {
    echo "Hello, $name";
});
$app->get('/it', function () {
    echo "It works";
});

$view = $app->view();
$view->parserOptions = array(
    'debug' => true,
);
$view->parserExtensions = array(
    new \Slim\Views\TwigExtension(),
);

$app->get('/', function () use ($app) {
    $app->render('index.html.twig');
})->name('home');

$app->run();
