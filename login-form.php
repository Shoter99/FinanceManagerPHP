<?php include_once "base.php";

if (isset($_SESSION["user"])) {
    header("Location: dashboard.php");
}

?>


<form action="login.php" method="POST">
    <label for="username">Username: </label>
    <input type="text" id="username" name="username">
    <label for="password">Password: </label>
    <input type="password" id="password" name="password">
    <input type="submit" value="Log in">
</form>

<?php include_once "endfile.php" ?>