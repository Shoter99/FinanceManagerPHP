<?php
include_once "connect.php";
session_start();


if (!isset($_POST['username'])) {
    header("Location: index.php");
}


$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);


$password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO Users (username, password, email) VALUES ('$username', '$password', '$email')";

if ($conn->query($sql) === TRUE) {

    $sql_get_id = "SELECT id FROM Users WHERE username = '$username'";
    if ($id = $conn->query($sql_get_id)) {
        $_SESSION["user"] = array(
            "id" => $id,
            "username" => $username,
            "email" => $email
        );
    }


    header("Location: dashboard.php");
} else {
    header("Location: index.php?error=Error while creating new user please try again later");
}