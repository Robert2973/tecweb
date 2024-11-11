<?php
require_once __DIR__ . '/../vendor/autoload.php';
use TECWEB\MYAPI\Update\Update;
$productApp = new Update('marketzone');
$productApp->edit(json_decode(file_get_contents('php://input')));
echo $productApp->getData();