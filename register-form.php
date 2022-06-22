<?php
include_once "inc/base.php";
?>

<?php

if (isset($_GET['error'])) {
    echo filter_input(INPUT_GET, 'error', FILTER_SANITIZE_SPECIAL_CHARS);
}
?>
<div class="form-container container mt-5">
    <form action="utils/register.php" method="POST" class="bg-dark p-4 text-light rounded">
        <div class="mb-3">
            <label class="form-label" for="username">Username:</label>
            <input type="text" class="form-control" name="username" id="username" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="email">Email:</label>
            <input class="form-control" type="email" name="email" id="email" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="password">Password: </label>
            <input class="form-control" type="password" name="password" id="password" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="re-password">Repeat Password: </label>
            <input class="form-control" type="password" id="re-password" required>
        </div>
        <input class="btn btn-primary" type="submit" value="Register" disabled id="submit">
    </form>
</div>
<script>
const check_if_match = () => {
    var password = document.getElementById("password").value
    var rePassword = document.getElementById("re-password").value
    if (password === rePassword) {
        document.getElementById("submit").disabled = false
    } else document.getElementById("submit").disabled = true
}
document.getElementById("password").addEventListener("change", () => check_if_match())
document.getElementById("re-password").addEventListener("change", () => check_if_match())
</script>

<?php
include_once "inc/endfile.php";
?>