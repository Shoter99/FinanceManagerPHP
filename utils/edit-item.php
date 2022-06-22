<?php
include_once "connect.php";
include_once "../inc/base.php";
if(!isset($_POST["submit"])) header("Location: /dashboard.php");
$id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_SPECIAL_CHARS);

$sql = "SELECT * FROM finances WHERE id=".$id;

$req = mysqli_query($conn, $sql);

$item = mysqli_fetch_assoc($req);

?>

<form class="p-3 card mt-3" action="utils/update-item.php" method="POST">
        <div class="mb-3">
            <label class="form-label" for="name">Name: </label>
            <input value="<?php echo $item["name"] ?>" class="form-control" type="text" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="price">Price:</label>
            <input value="<?php echo $item["price"] ?>" class="form-control" type="number" step="0.01" id="price" name="price" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="type">Type: </label>
            <select value="<?php echo $item["type"] ?>" class="form-select" name="type" id="type">
                <option value="Income">Income</option>
                <option value="Expenses">Expenses</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="date">Date: </label>
            <input value="<?php echo $item["date"] ?>" class="form-control" type="date" id="date" name="date" required>
        </div>
        <input type="hidden" name="userid" value="<?php echo $_SESSION["user"]["id"] ?>">
        <input type="hidden" name="id" value="<?php $id ?>">
        <input class="btn btn-primary" type="submit" value="Update item">
        <a href="/dashboard.php" class="btn btn-danger mt-3">Cancel</a>
    </form>