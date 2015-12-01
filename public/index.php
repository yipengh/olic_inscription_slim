<?php

require '../vendor/autoload.php';

// Prepare app
$app = new \Slim\Slim(array(
    'templates.path' => '../templates',
));

// Injection - DB instance
$app->db_dsn = 'mysql:dbname=' . DB_NAME . ';host=' . DB_HOST;
$app->db = new PDO($app->db_dsn, DB_USERNAME, DB_PASSWORD);

// Injection - mailer wrapper
$app->mailer = new Mailer();

// Define routes
$app->get('/', function() use ($app) {
    $app->render('form.php');
})->name('root');

$app->post('/', function() use ($app) {
    $data = $app->request->post();

    $data['birthday'] = Utils::dateFR2SQL('/', $data['birthday']);
    $data['ref'] = bin2hex(openssl_random_pseudo_bytes(4, $cstrong));
    Utils::parseEvents($data);

    $id = CRUD::insert($app->db, 'inscription', $data);
    if ($id !== false) {
        $app->mailer->sendUserInscriptionSuccess($data);

        $validationURL = BASE_URL . $app->urlFor('validate', array('id' => $id, 'ref' => $data['ref']));
        $app->mailer->sendAdminValidation($data, $validationURL);

        $app->render('inscription_success.html');
    } else {
        $app->render('error.html');
    }
});

$app->get('/validate/:id/:ref', function($id, $ref) use ($app) {
    $id = CRUD::update($app->db, 'inscription', $id, array('status' => 1));
    if ($id !== false) {
        $app->render('validation_success.html');
    } else {
        $app->render('error.html');
    }
})->name('validate')
    ->conditions(array(
        'id' => '[0-9]+',
        'ref' => '[0-9a-zA-Z]{8}'
    ));

$app->get('/mail', function() use ($app) {
    $mailer = new Mailer();
    $ok = $mailer->sendUserInscriptionSuccess(array(
        'lastname' => 'Huang',
        'firstname' => 'Yipeng',
        'affiliation' => 'utt',
        'email' => 'yipeng.huang@utt.fr',
        'birthday' => '13/06/1990',
        'birthplace' => 'Beijing',
        'address' => '82 Avenue Pasteur',
        'nationality' => 'chinoise',
        'event0' => '1',
        'event1' => '1',
        'event2' => '0',
        'ref' => 'DX46FY55',
    ));

    if (!$ok) echo 'Failed to send email.';
});

// Run app
$app->render('header.html');
$app->run();
$app->render('footer.html');

// END /public/index.php
