<?php
include_once "inc/base.php";
if (!isset($_SESSION["user"])) {
    header("Location: login-form.php");
}
$search = "";
?>

<div class="w-100 d-flex flex-row-reverse p-3">
    <form class=" top-0 end-0" action="utils/logout.php">
        <input class="btn btn-danger m-2" type="submit" value="Logout" />
    </form>
    <a class="btn btn-success m-2" type="button" data-bs-toggle="collapse" href="#add-form" role="button"
        aria-expanded="false" aria-controls="add-form">
        Add Item
    </a>
</div>
<div class="collapse" id="add-form">
    <form class="p-3 card" action="utils/add-item.php" method="POST">
        <div class="mb-3">
            <label class="form-label" for="name">Name: </label>
            <input class="form-control" type="text" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="price">Price:</label>
            <input class="form-control" type="number" step="0.01" id="price" name="price" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="type">Type: </label>
            <select class="form-select" name="type" id="type">
                <option value="Income">Income</option>
                <option value="Expenses">Expenses</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="date">Date: </label>
            <input class="form-control" type="date" id="date" name="date" required>
        </div>
        <input type="hidden" name="userid" value="<?php echo $_SESSION["user"]["id"] ?>">
        <input class="btn btn-primary" type="submit" value="Add item">
    </form>
</div>

<?php

$sql = "SELECT * FROM finances WHERE user_id = " . $_SESSION["user"]["id"];

if (isset($_GET["search"])) {
    $search = filter_input(INPUT_GET, "search", FILTER_SANITIZE_SPECIAL_CHARS);
    $sql .= " AND name LIKE '%$search%'";
}

$sql .= " ORDER BY date DESC";
?>

<ul class="container">
    <li class="card p-3 m-3 d-flex flex-md-row justify-content-md-around justify-content-sm-center">
        <p class="text-center">Name</p>
        <p class="text-center">Amount</p>
        <p class="text-center">Type</p>
        <p class="text-center">Date</p>
        <form action="<?php $_SERVER['PHP_SELF'] ?>">
            <input type="text" class="form-control" name="search" value="<?php echo $search ?>" placeholder="Search...">
        </form>
    </li>
    <?php
    include_once "utils/connect.php";



    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_all($res, MYSQLI_ASSOC);
    foreach ($row as $item) : ?>
    <li class=" card p-3 <?php if ($item["type"] == "Expenses") : ?> bg-danger <?php endif ?>
                <?php if ($item["type"] == "Income") : ?> bg-success <?php endif ?> text-light m-3 d-flex flex-md-row
                justify-content-md-around justify-content-sm-center align-item-center">
        <div class="text-center d-flex align-items-center justify-content-center name">
            <?php echo $item["name"] ?></div>
        <div class="text-center d-flex align-items-center justify-content-center"><?php echo $item["price"] ?></div>
        <div class="text-center d-flex align-items-center justify-content-center"><?php echo $item["type"] ?></div>
        <div class="text-center d-flex align-items-center justify-content-center"><?php echo $item["date"] ?></div>
        <div class="d-flex flex-md-row align-items-center justify-content-center">
            <form action="utils/edit-item.php" method="POST" class="me-1">
                <input type="hidden" name="id" value="<?php echo $item["id"] ?>">
                <input type="submit" name="submit" value="EDIT" class="btn btn-dark">
            </form>
            <form action="utils/delete-item.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $item["id"] ?>">
                <input type="submit" name="submit" class="btn btn-dark" value="X">
            </form>
        </div>
    </li>
    <?php endforeach; ?>
</ul>

<?php

include_once "inc/endfile.php";

?>