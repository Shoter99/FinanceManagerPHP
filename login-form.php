<?php include_once "base.php";

if (isset($_SESSION["user"])) {
    header("Location: dashboard.php");
}

?>

<div class="container mt-5 form-container">
    <form action="login.php" method="POST" class="bg-dark p-4 rounded  text-light">
        <div class="mb-3">
            <label class="form-label" for="username">Username: </label>
            <input class="form-control" type="text" id="username" name="username" required>

        </div>
        <div class="mb-3">
            <label class="form-label" for="password">Password: </label>
            <input class="form-control" type="password" id="password" name="password" required>
        </div>
        <input type="submit" class="btn btn-primary" value="Log in">
    </form>
</div>

<?php include_once "endfile.php" ?>