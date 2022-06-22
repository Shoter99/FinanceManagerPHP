<?php

include_once "connect.php";

if (!isset($_POST["submit"])) {
    header("Location: /dashboard.php");
}

$name = $_POST["name"];
$price = $_POST["price"];
$type = $_POST["type"];
$date = $_POST["date"];
$id = $_POST["id"];

$sql = "UPDATE finances SET name='$name', price='$price', type='$type', date='$date' WHERE id='$id'";



if (mysqli_query($conn, $sql) === TRUE) {
    header("Location: /dashboard.php");
} else {
    echo "Error while editing record";
}