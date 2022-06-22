<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: login-form.php");
} else {
    header("Location: dashboard.php");
}