<?php

require_once '../lib/Slim/Slim/Slim.php';

require_once '../lib/CRUD.class.php';
require_once '../lib/Mailer.class.php';
require_once '../lib/Utils.class.php';

require_once '../config/config.php';

// Prepare app
$app = new Slim(array(
    'templates.path' => '../templates',
));

// Injection - DB instance
$app->db_dsn = 'mysql:dbname=' . DB_NAME . ';host=' . DB_HOST;
$app->db = new PDO($app->db_dsn, DB_USERNAME, DB_PASSWORD);

// Injection - mailer wrapper
$app->mailer = new Mailer();

// Define routes
$app->get('/', 'getForm')->name('root');
function getForm() {
    $app = Slim::getInstance();
    $app->render('form.php');
}

$app->post('/', 'postForm');
function postForm() {
    $app = Slim::getInstance();

    $data = $app->request()->post();

    $data['birthday'] = Utils::dateFR2SQL('/', $data['birthday']);
    //$data['ref'] = bin2hex(openssl_random_pseudo_bytes(4, $cstrong));
    $data['ref'] = Utils::randString(8);
    Utils::parseEvents($data);
    foreach ($data as $key => $value) {
        $data[$key] = Utils::cleanInput($value);
    }

    $id = CRUD::insert($app->db, 'inscription', $data);
    if ($id !== false) {
        $app->mailer->sendUserInscriptionSuccess($data);

        $validationURL = BASE_URL . $app->urlFor('validate', array('id' => $id, 'ref' => $data['ref']));
        $app->mailer->sendAdminValidation($data, $validationURL);

        $app->render('inscription_success.html');
    } else {
        $app->render('error.html');
    }
}

$app->get('/validate/:id/:ref', 'validate')->name('validate')
    ->conditions(array(
        'id' => '[0-9]+',
        'ref' => '[0-9a-zA-Z]{8}'
    ));
function validate($id, $ref) {
    $app = Slim::getInstance();

    $id = CRUD::update($app->db, 'inscription', $id, array('validated' => 1));
    if ($id !== false) {
        $userInfos = CRUD::select($app->db, array(
            'table' => 'inscription',
            'where' => 'id=' . $id,
            'limit' => 1
        ));
        $userInfo = $userInfos[0];
        $app->mailer->sendUserValidationSuccess($userInfo);
        
        $app->render('validation_success.html');
    } else {
        $app->render('error.html');
    }
}

// Run app
$app->render('header.html');
$app->run();
$app->render('footer.html');

// END /public/index.php
