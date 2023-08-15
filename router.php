<?php
require 'vendor/autoload.php';
require './config.php';

$app = new \Slim\Slim();

function get_home() {
    include('./templates/home.php');
};

function get_about() {
    include('./templates/about.php');
    // $app->render('./templates/about.php');
};

$app->get('', 'get_home');
$app->get('/', 'get_home');
$app->get('/home', 'get_home');
$app->get('/about', 'get_about');

$app->notFound(function () use ($app) {
    $app->response->redirect(WWW_ROOT.'home', 301);
});

$app->run();

