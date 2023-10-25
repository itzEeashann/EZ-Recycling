<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "ez_recycling";

$conn = mysqli_connect($server,$username,$password,$database);

if(!$conn) {
    echo "<script>alert('Connection Failed.')</script>";
}

?>