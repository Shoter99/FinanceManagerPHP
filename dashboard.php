<?php
include_once "inc/base.php";
if (!isset($_SESSION["user"])) {
    header("Location: login-form.php");
}
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

<ul class="container">
    <li class="card p-3 m-3 d-flex flex-md-row justify-content-md-around justify-content-sm-center">
        <p class="text-center">Name</p>
        <p class="text-center">Amount</p>
        <p class="text-center">Type</p>
        <p class="text-center">Date</p>
        <p class="text-center" style="width:92px"></p>
    </li>
    <?php
    include_once "utils/connect.php";

    $sql = "SELECT * FROM finances WHERE user_id = " . $_SESSION["user"]["id"];

    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_all($res, MYSQLI_ASSOC);
    foreach ($row as $item) : ?>
    <li class="card p-3
        <?php if ($item["type"] == "Expenses") : ?>
        bg-danger
        <?php endif ?>
        <?php if ($item["type"] == "Income") : ?>
        bg-success
        <?php endif ?>
        
        text-light
        
        m-3 d-flex flex-md-row justify-content-md-around justify-content-sm-center align-item-center">
        <p class="text-center"><?php echo $item["name"] ?></p>
        <p class="text-center"><?php echo $item["price"] ?></p>
        <p class="text-center"><?php echo $item["type"] ?></p>
        <p class="text-center"><?php echo $item["date"] ?></p>
        <div class="d-flex flex-md-row align-items-center justify-content-center">
            <form action="utils/edit-item.php" class="me-1">
                <button class="btn btn-dark">EDIT</button>
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