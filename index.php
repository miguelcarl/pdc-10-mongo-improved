<?php
require "init.php";
require "student_handler.php";
require_once __DIR__ . '/vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->local->students;
$result = $collection->find();

$template = $mustache->loadTemplate('index');
echo $template->render(compact('result'));
?>