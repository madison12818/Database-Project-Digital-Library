<?php

$servername = "localhost:3306";
$username = "root";
$password = "password";
$dbname = "bitbook";

$conn = new mysqli($servername, $username, $password, $dbname);

if(! $conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

#$sql = "inser

?>
