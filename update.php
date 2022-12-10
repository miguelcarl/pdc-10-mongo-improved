<?php
namespace StudentHandler;
require "init.php";
require "StudentHandler.php";
require_once __DIR__ . '/vendor/autoload.php';

use \StudentHandler;

$handler = new StudentHandler;

$records = $handler->update();  