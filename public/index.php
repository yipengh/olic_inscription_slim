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
    $ok = $mailer->sendAdminValidation(array(
        'lastname' => 'Huang',
        'firstname' => 'Yipeng',
        'affiliation' => 'utt',
        'email' => 'huang.ypeng@gmail.com',
        'birthday' => '13/06/1990',
        'birthplace' => 'Beijing',
        'address' => '82 Avenue Pasteur',
        'nationality' => 'chinoise',
        'event0' => '1',
        'event1' => '1',
        'event2' => '0',
        'ref' => 'DX46FY55',
    ), 'http://olic.utt.fr/inscription/validate/DX46FY55');

    if (!$ok) echo 'Failed to send email.';
});

// Run app
$app->run();

// END /public/index.php
