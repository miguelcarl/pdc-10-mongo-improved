<?php
namespace StudentHandler;
require "init.php";
require "student_handler.php";
require_once __DIR__ . '/vendor/autoload.php';

use \StudentHandler;

$handler = new StudentHandler;

$records = $handler->delete();