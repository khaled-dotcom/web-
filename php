<?php
$inventory = [
    "apple" => ["quantity" => 4, "price" => 1.00],
    "chicken" => ["quantity" => 1, "price" => 3.25],
    "cookie" => ["quantity" => 38, "price" => 0.25],
    "milk" => ["quantity" => 9, "price" => 4.50],
    "tomato" => ["quantity" => 27, "price" => 0.50]
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Food</title>
</head>
<body>
    <form action="order-submit.php" method="POST">
        <label for="food">Food item:</label>
        <select name="food" id="food">
            <?php
            foreach ($inventory as $item => $details) {
                echo "<option value=\"$item\">$item</option>";
            }
            ?>
        </select>
        <br><br>
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" min="1" required>
        <br><br>
        <button type="submit">Order</button>
    </form>
</body>
</html>



---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

<?php
$inventory = [
    "apple" => ["quantity" => 4, "price" => 1.00],
    "chicken" => ["quantity" => 1, "price" => 3.25],
    "cookie" => ["quantity" => 38, "price" => 0.25],
    "milk" => ["quantity" => 9, "price" => 4.50],
    "tomato" => ["quantity" => 27, "price" => 0.50]
];

if (!isset($_POST['food']) || !isset($_POST['quantity'])) {
    http_response_code(400);
    echo "<p>Bad Request: Missing food item or quantity.</p>";
    exit;
}

$food = $_POST['food'];
$quantity = (int)$_POST['quantity'];

if (!array_key_exists($food, $inventory)) {
    echo "<p>Sorry, \"$food\" is not available in the inventory.</p>";
    exit;
}

if ($inventory[$food]['quantity'] < $quantity) {
    echo "<p>Sorry, we don't have $quantity of \"$food\" in stock.</p>";
    exit;
}

$totalCost = $quantity * $inventory[$food]['price'];
echo "<p>Order successful! The total cost is $" . number_format($totalCost, 2) . ".</p>";
?>
