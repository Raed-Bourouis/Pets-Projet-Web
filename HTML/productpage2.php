<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nutritious Cat Food</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="../CSS/productpage.css">
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
<link rel="icon" href="../assets/logoweblight.png">

</head>
<body>
         <!-- Header -->
         <?php 
    include '../PHP/functions.php';
    generateHeader() ;
        
    ?>
        <!-- End of Header -->
<div class="container">
    <div class="product-info">
        <img src="../assets/product-2.png" alt="Product Image" class="product-image">
        <div class="details">
            <h1>Nutritious Cat Food - Premium Quality</h1>
            <p>Provide your feline friend with the best nutrition with our premium quality cat food. Formulated with the finest ingredients, our cat food ensures your pet's health and vitality. This nutritious blend offers a balanced diet for cats of all ages, promoting strong muscles, healthy fur, and overall well-being.</p>
            <table>
                <tr>
                    <th>Ingredients</th>
                    <td>Chicken, rice, fish oil, vitamins, minerals</td>
                </tr>
                <tr>
                    <th>Benefits</th>
                    <td>Promotes strong muscles, healthy fur, and overall well-being</td>
                </tr>
                <tr>
                    <th>Features</th>
                    <td>High protein, balanced nutrition, no artificial colors or flavors</td>
                </tr>
                <tr>
                    <th>Suitable For</th>
                    <td>Ideal for cats of all ages and breeds</td>
                </tr>
                <tr>
                    <th>Recommended</th>
                    <td>Recommended by veterinarians for optimal cat health</td>
                </tr>
                <tr>
                    <th>Storage</th>
                    <td>Store in a cool, dry place away from direct sunlight</td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>14.99 TND</td>
                </tr>
            </table>
            <br><br>
            <div class="buttons">
                <button class="button" onclick="addToCart()"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                <button class="button" onclick="continueShopping()"><i class="fas fa-shopping-bag"></i> Continue Shopping</button>
            </div>
        </div>
       
    </div>
   
</div>
        <!-- Footer -->
        <?php 
    generateFooter() ;
        
    ?>
<!-- End of Footer -->
<script>
    function addToCart() {
        alert('Product added to cart!');
    }

    function continueShopping() {
        window.location.href = 'market.php';
    }
</script>

</body>
</html>
