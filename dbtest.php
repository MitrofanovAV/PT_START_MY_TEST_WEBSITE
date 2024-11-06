<?php
$servername = "127.0.0.1";
$username = "kali";
$password = "P@ssw0rd";
$dbName = "mywebdb";
$link = new mysqli($servername, $username, $password);
if ($link->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
echo "Connection success";

$sql = "CREATE DATABASE IF NOT EXISTS `$dbName`";

if (mysqli_query($link, $sql)) {
    print "all good";
} 

?>