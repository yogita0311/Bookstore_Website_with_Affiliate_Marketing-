<?php
$connection = mysqli_connect("localhost", "root", "", "bookstore_db");

// Quantity update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update_qty'])) {
        $id = $_POST['cart_id'];
        $qty = $_POST['quantity'];
        mysqli_query($connection, "UPDATE cart SET quantity = $qty WHERE id = $id");
    }

    if (isset($_POST['remove_item'])) {
        $id = $_POST['cart_id'];
        mysqli_query($connection, "DELETE FROM cart WHERE id = $id");
    }
}

?>
<html>
<head>
<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="stylecartpage.css"/>
<style>
.btn-buy{
margin-left:690px;
}
</style>
</head>
<body>
<div class="cart">
<h1 class="cart-title">Your Cart</h1>
<div class="border">
</div>
<div id="cart-container">
<div class="cart-content">
<?php
$total = 0;
$result = mysqli_query($connection, "SELECT cart.id AS cart_id, books.title, books.price, books.image, cart.quantity 
FROM cart JOIN books ON cart.book_id = books.id");

while ($row = mysqli_fetch_assoc($result)) {
    $subtotal = $row['price'] * $row['quantity'];
    $total += $subtotal;
?>
<div class="cart-box">
    <img src="<?php echo $row['image']; ?>" alt="" class="cart-img">
    <div class="detail-box">
        <div class="cart-product-title"><b>Book Name:</b> <?php echo $row['title']; ?></div>
        <div class="cart-price"><b>Price:</b> $<?php echo $row['price']; ?></div>

        <form method="post">
            <input type="hidden" name="cart_id" value="<?php echo $row['cart_id']; ?>">
            <b>Quantity:</b> 
            <input type="number" name="quantity" value="<?php echo $row['quantity']; ?>" class="cart-quantity">
            <button type="submit" name="update_qty">Update</button>
        </form>

        <form method="post">
            <input type="hidden" name="cart_id" value="<?php echo $row['cart_id']; ?>">
            <button type="submit" name="remove_item">
                <i class="fa-solid fa-trash cart-remove"></i>
            </button>
        </form>
    </div>
</div>
<?php } ?>
</div>

<div class="total">
    <div class="total-title"><b>Total</b></div>
    <div class="total-price">$<?php echo $total; ?></div>
</div>
<button type="button" class="btn-buy">Buy Now</button>
</div> 


