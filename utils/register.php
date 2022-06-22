<?php
include_once "connect.php";
session_start();


if (!isset($_POST['username'])) {
    header("Location: index.php");
}
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("Location: register-form.php");
    die();
}


$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);


$password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO Users (username, password, email) VALUES ('$username', '$password', '$email')";

if ($conn->query($sql) === TRUE) {

    header("Location: dashboard.php?success=User successfully created");
} else {
    header("Location: register-form.php?error=Error while creating new user please try again later");
}