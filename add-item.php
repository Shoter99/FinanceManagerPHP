<?php

include_once "connect.php";

$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
$price = filter_input(INPUT_POST, "price", FILTER_SANITIZE_SPECIAL_CHARS);
$type = filter_input(INPUT_POST, "type", FILTER_SANITIZE_SPECIAL_CHARS);
$date = filter_input(INPUT_POST, "date", FILTER_SANITIZE_SPECIAL_CHARS);
$userid = filter_input(INPUT_POST, "userid", FILTER_SANITIZE_SPECIAL_CHARS);

// echo $name . $price . $type . $date . $userid;

$sql = "INSERT INTO finances (user_id, name, price, type, date) VALUES ('$userid','$name', '$price', '$type', '$date')";

if ($conn->query($sql) === TRUE) {
    header("Location: dashboard.php");
} else {
    echo "Failed adding item to database";
}