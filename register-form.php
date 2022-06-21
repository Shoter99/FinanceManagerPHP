<?php
include_once "base.php";
?>
<div>
    <h1>Register</h1>
</div>
<?php

if (isset($_GET['error'])) {
    echo filter_input(INPUT_GET, 'error', FILTER_SANITIZE_SPECIAL_CHARS);
}
?>
<form action="register.php" method="POST">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" required>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>
    <label for="password">Password: </label>
    <input type="password" name="password" id="password" required>
    <label for="re-password">Repeat Password: </label>
    <input type="password" id="re-password" required>
    <input type="submit" value="Register" disabled id="submit">
</form>
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
include_once "endfile.php";
?>