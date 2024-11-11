<?php
require_once __DIR__ . '/../vendor/autoload.php';
use TECWEB\MYAPI\Read\Read;
$name = $_GET['name'];
$productApp = new Read('marketzone');
$productApp->singleByName($name);
echo $productApp->getData();