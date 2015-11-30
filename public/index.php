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

$app->get('/mail', function() use ($app) {
    $mailer = new Mailer();
    $mailer->send('huang.ypeng@gmail.com', 'test from OLIC2016', '<strong>test!</strong>', 'test!');
});

// Run app
$app->run();

// END /public/index.php
