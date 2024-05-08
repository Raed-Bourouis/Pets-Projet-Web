<?php
include '../PHP/functions.php';
$pdo = pdo_connect_mysql();
if(!isset($_SESSION["cart"])){
    $_SESSION["cart"]=array();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_SESSION["cart"];
    if (!isset($data[$_POST['name']])) {
        $data[$_POST['name']] = $_POST['price'];
        $_SESSION["cart"] = $data;
        echo '<script>alert("Product addedd to Cart");</script>';
    }
}

$sql = "SELECT * FROM products";
$stmt=$pdo->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Food Shop</title>
    <link rel="stylesheet" href="../CSS/market.css">
    <link rel="icon" href="../assets/logoweblight.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> 
    <script src="../Javascript/market.js" defer ></script>

</head>
<body>
    <?php 
    
    generateHeader() ;
        
    ?>
    <!-- End of Header -->

    <!-- picture -->
    <div class="banner">
        <img src="../assets/section 1 .webp" alt="Banner Image">
        <div class="banner-text">
            <h1>All proceeds from these sales go to funding the animal shelter</h1>
            <p>Thank you for your donation!</p>
        </div>
    </div>
  
    <h1> Our Products :</h1>
    <!--Search bar-->
    <form class="search-wrapper">
        <input type="text" name="" placeholder="Search..."  id="searchinput" >
        
    </form>
    <!-- Product Listing -->
    <section class="product-listing" id="product-listing">
        <ul>
            <?php
              foreach ($results as $result)
              {
                  echo '<li class="product">';
                  echo '<form name="form" action="market.php" method="post">';
                  echo '<img src="'.$result["Image"].'" alt="Pet Food 1">';
                  echo '<h2>'.$result["Name"].'</h2>';
                  echo '<p>'.$result["Description"].'</p>';
                  echo '<span>'.$result["Price"].' TND</span>';
                  echo '<input name="name" value="'.$result["Name"].'"hidden></input>'; # Used to add product >
                  echo '<input name="price" value="'.$result["Price"].'" hidden></input>'; # Used to add product ;
                  echo '<button class="add-to-cart" type="submit"><i class="fas fa-cart-plus"></i>Add to Cart</button>';
                  echo '</form>';

                 echo '<a href="'.$result["productPage"].'" class="view-product"><i class="fas fa-eye"></i>View Product</a>';
                 echo '</li>';
              }
            ?>
    </ul>
</section>

        <!-- Footer -->
        <?php 
    generateFooter() ;
        
    ?>
<!-- End of Footer -->
</body>
<script>
    function animateProductListing() {
        const products = document.querySelectorAll('.product');
        products.forEach((product, index) => {
            product.style.opacity = '0';
            product.style.transform = 'translateY(-20px)';
            setTimeout(() => {
                product.style.transition = 'opacity 2s ease-in-out, transform 0.5s ease';
                product.style.opacity = '1';
                product.style.transform = 'translateY(0)';
            }, index * 100);
        });
    }
    function addToCart() {
        // AJAX call to execute PHP script
    }
    window.addEventListener('load', animateProductListing);
</script>

</html>


