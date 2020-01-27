<?php 
$mysqli = new mysqli("localhost", "root", "12345", "curriculo");

/* change character set to utf8 */
if (!$mysqli->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $mysqli->error);
    exit();
}


if ($mysqli -> connect_errno) {
    echo "Failed to connecto to MySQL: " . $mysqli -> connect_error;
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}