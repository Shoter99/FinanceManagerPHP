<?php
include_once "base.php";

if (!isset($_SESSION["user"])) {
    header("Location: login-form.php");
} else {
    header("Location: dashboard.php");
}

?>



<?php
include_once "endfile.php";
?>