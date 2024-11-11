<?php
require_once __DIR__ . '/../vendor/autoload.php';
use TECWEB\MYAPI\Read\Read;
$productApp = new Read('marketzone');
$productApp->list();
echo $productApp->getData();