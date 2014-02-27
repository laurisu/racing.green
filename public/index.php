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
    $app->render('pages/home.html.twig', array(
        'active'=>'company'
        ));
})->name('home');
$app->get('/company', function () use ($app) {
    $app->render('pages/company.html.twig', array(
        'active'=>'company'
        ));
})->name('company');
$app->get('/products', function () use ($app) {
    $app->render('pages/products.html.twig', array(
        'active'=>'products'
        ));
})->name('products');
$app->get('/contacts', function () use ($app) {
    $app->render('pages/contacts.html.twig', array(
        'active'=>'contacts'
        ));
})->name('contacts');

$app->run();