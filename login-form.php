<?php include_once "inc/base.php";

if (isset($_SESSION["user"])) {
    header("Location: dashboard.php");
}
?>

<div class="container mt-5 form-container ">

    <form action="utils/login.php" method="POST" class="bg-dark p-4 rounded text-light">
        <div class="mb-3">
            <label class="form-label" for="username">Username: </label>
            <input class="form-control" type="text" id="username" name="username" required>

        </div>
        <div class="mb-3">
            <label class="form-label" for="password">Password: </label>
            <input class="form-control" type="password" id="password" name="password" required>
        </div>
        <input type="submit" class="btn btn-primary" value="Log in">
        <?php
        if (isset($_GET['error'])) {
            $error = filter_input(INPUT_GET, 'error', FILTER_SANITIZE_SPECIAL_CHARS);
            echo "<p class='text-danger mt-3'>$error</p>";
        }
        if (isset($_GET['success'])) {
            $success = filter_input(INPUT_GET, 'success', FILTER_SANITIZE_SPECIAL_CHARS);
            echo "<p class='text-success mt-3'>$success</p>";
        }
        ?>
    </form>
</div>

<?php include_once "inc/endfile.php" ?>