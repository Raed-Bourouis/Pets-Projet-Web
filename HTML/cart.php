<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $_SESSION["cart"]=array();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Shopping Cart</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="../CSS/cart.Css">
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
<link rel="icon" href="../assets/logoweblight.png">

</head>
<body> <!-- Header -->
<?php 
    include '../PHP/functions.php';
    generateHeader() ;
        
    ?>
    <!-- End of Header -->
    <div class="bck-img"></div>

<div class="container">

    <h1>Shopping Cart</h1>
    <table>
        <thead>
            <tr>
                <th style="text-align:center">Product</th>
                <th style="text-align:center">Price</th>
                <th style="text-align:center">Quantity</th>
                <th style="text-align:center">Total</th>
                <th style="text-align:center">Action</th>
            </tr>
            <tbody id="cart-items">

            </tbody>
        </thead>
    </table>
    <div id="cart-summary">
        <p>Total Items: <span id="total-items">0</span></p>
        <p>Total Price: <span id="total-price">0.00</span> TND</p>
    </div>
    <div class="buttons">
        <form name="form" action="cart.php" method="post">
        <a href="checkout.php" class="button">Proceed to Checkout</a>
        <button class="button" style="background-color:red;border:none" type="submit">Clear Cart</button>
        </form>
    </div>
</div>
      <!-- Footer -->
      <?php 
    
    generateFooter() ;
        
    ?>
<!-- End of Footer -->
<script>
    let cartItems=[];
    document.addEventListener("DOMContentLoaded", function() {
        <?php
        $i=1;
        foreach ($_SESSION["cart"] as $key => $value)
        {
            echo "cartItems.push({id: $i, name: '$key', price: $value, quantity: 2 });";
            $i++;
        }
        ?>
        generateDom(cartItems);
        // Call the function when the DOM is ready
    });
    
</script>
<script src="../Javascript/cart.js"></script>


</body>
</html>
