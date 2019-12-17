<?php 
$mysqli = new mysqli("localhost", "root", "12345", "curriculo");

if ($mysqli -> connect_errno) {
    echo "Failed to connecto to MySQL: " . $mysqli -> connect_error;
    exit();
}