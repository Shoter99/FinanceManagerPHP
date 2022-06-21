<?php
include_once "base.php";
if (!isset($_SESSION["user"])) {
    header("Location: login-form.php");
}
echo "Welcome " . $_SESSION["user"]["username"];

?>

<form action="logout.php">
    <input type="submit" value="Logout" />
</form>