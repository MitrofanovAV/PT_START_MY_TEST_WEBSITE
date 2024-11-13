<?php
$servername = "127.0.0.1";
$username = "root";
$password = "P@ssw0rd";
$dbName = "mywebdb";
$link = new mysqli($servername, $username, $password);
if ($link->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS `$dbName`";

if (!mysqli_query($link, $sql)) {
    print "all good";
}

mysqli_close($link);

$link = mysqli_connect($servername, $username, $password, $dbName);

$sql = "CREATE TABLE IF NOT EXISTS users(
    id  INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(15) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(20) NOT NULL
)";

if (!mysqli_query($link, $sql)) {
    echo "Could not create table Users: " . mysqli_error($link);
}

$sql = "CREATE TABLE IF NOT EXISTS posts(
    id  INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(20) NOT NULL,
    main_text VARCHAR(4000) NOT NULL
)";

if (!mysqli_query($link, $sql)) {
    echo "Could not create table Posts: " . mysqli_error($link);
}

mysqli_close($link);
?>

