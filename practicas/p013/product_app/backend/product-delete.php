<?php
require_once __DIR__ . '/../vendor/autoload.php';
use TECWEB\MYAPI\Delete\Delete;
$id = $_GET['id'];
$productApp = new Delete('marketzone');
$productApp->delete($id);
echo $productApp->getData();