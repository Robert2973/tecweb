<?php
require_once __DIR__ . '/../vendor/autoload.php';
use TECWEB\MYAPI\Create\Create;
$productApp = new Create('marketzone');
$productApp->add(json_decode(file_get_contents('php://input')));
echo $productApp->getData();