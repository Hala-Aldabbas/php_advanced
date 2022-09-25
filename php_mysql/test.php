<?php
$server    ="localhost";
$username  ="root";
$password  ="";

$connect=mysqli_connect($server,$username,$password);

if ($mysqli->connect_errno) {
    printf("Failed to connect: %s\n", $mysqli->connect_error);
    exit();
}