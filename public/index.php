<?php

require '../vendor/autoload.php';

// Prepare app
$app = new \Slim\Slim(array(
    'templates.path' => '../templates',
));

// Define routes
$app->get('/', function() use ($app) {
    $app->render('form.php');
})->name('root');

$app->post('/', function() use ($app) {
    var_dump($app->request->post());
});

// Run app
$app->run();

// END /public/index.php
