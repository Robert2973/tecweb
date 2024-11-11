<?php
require_once __DIR__ . '/../vendor/autoload.php';
use TECWEB\MYAPI\Read\Read;
$id = $_GET['id'];
$productApp = new Read('marketzone');
$productApp->single($id);
echo $productApp->getData();