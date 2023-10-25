<?php
session_start();
include 'functions.php';
$pdo = new \PDO($dsn, $user, $pass, $options);

$page = isset($_GET['page']) && file_exists($_GET['page'] . '.php') ? $_GET['page'] : 'event';
include $page . '.php';
?>