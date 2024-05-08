<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Your Submission</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../CSS/thankyou.css">
    <link rel="icon" href="../assets/logoweblight.png">

</head>
<body>
          <!-- Header -->
          <?php 
    include '../PHP/functions.php';
    generateHeader() ;
        
    ?>
        <!-- End of Header -->
    <!-- Main Content -->
    <div class="bck-img"></div>

    <div class="container">
        <h1>Your Order Has Been Placed!</h1>
        <p>You will receive a confirmation email shortly with your order details.</p>
        <p>If you have any questions or concerns regarding your order, please feel free to  <a href="mailto:pets@example.com" class="contact-link">contact us</a></p>
    
    </div>
        <!-- Footer -->
        <?php 
    generateFooter() ;
        
    ?>
    <!-- End of Footer -->
</body>
</html>
