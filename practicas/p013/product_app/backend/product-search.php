<?php
require_once __DIR__ . '/../vendor/autoload.php';
use TECWEB\MYAPI\Read\Read;
$searchTerm = $_GET['search'];
$productApp = new Read('marketzone');
$productApp->search($searchTerm);
echo $productApp->getData();