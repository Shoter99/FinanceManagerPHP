<?php
include_once "connect.php";

if (!isset($_POST["submit"])) header("Location: /dashboard.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

$sql = "DELETE FROM finances WHERE id=" . $id;

if (mysqli_query($conn, $sql) === True) {
    header("Location: /dashboard.php");
} else {
    echo "Error while deleting record";
}