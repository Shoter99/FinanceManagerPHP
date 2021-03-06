<?php
session_start();
include_once "connect.php";

if (isset($_SESSION["user"])) {
    header("Location: dashboard.php");
}
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: login-form.php");
    die();
}

$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

$sql = "SELECT * FROM Users WHERE username = '$username'";
$res = $conn->query($sql);

if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['user'] = array(
                "id" => $row['id'],
                "username" => $row['username'],
                "email" => $row['email'],
            );
            header("Location: ../dashboard.php");
        } else {
            header("Location: ../login-form.php?error=Wrong username or password");
        }
    }
} else {
    header("Location: ../login-form.php?error=Wrong username or password");
}