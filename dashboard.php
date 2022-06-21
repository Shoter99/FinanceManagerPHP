<?php
include_once "base.php";
if (!isset($_SESSION["user"])) {
    header("Location: login-form.php");
}
echo "Welcome " . $_SESSION["user"]["id"];

?>

<form action="logout.php">
    <input type="submit" value="Logout" />
</form>

<form action="add-item.php" method="POST">
    <label for="name">Name: </label>
    <input type="text" id="name" name="name" required>
    <label for="price">Price:</label>
    <input type="number" step="0.01" id="price" name="price" required>
    <label for="type">Type: </label>
    <select name="type" id="type">
        <option value="Income">Income</option>
        <option value="Expenses">Expenses</option>
    </select>
    <label for="date">Date: </label>
    <input type="date" id="date" name="date" required>
    <input type="hidden" name="userid" value="<?php echo $_SESSION["user"]["id"] ?>">
    <input type="submit" value="Add item">
</form>

<ul>
    <?php
    include_once "connect.php";

    $sql = "SELECT * FROM finances WHERE user_id = " . $_SESSION["user"]["id"];

    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            echo '
            <li>
                <p>Name: ' . $row["name"] . '</p>
                <p>Price: ' . $row["price"] . '</p>
                <p>Type: ' . $row["type"] . '</p>
                <p>Date: ' . $row["date"] . '</p>
            </li>
            ';
        }
    }

    ?>
</ul>