<?php
include '../PHP/functions.php';

// Connexion à la base de données MySQL
$pdo = pdo_connect_mysql();
$msg = '';

// Sélectionnez tous les animaux depuis la base de données
$stmt = $pdo->prepare('SELECT * FROM adoption ORDER BY id ');
$stmt->execute();
$animals = $stmt->fetchAll(PDO::FETCH_ASSOC);
$num_animals = $pdo->query('SELECT COUNT(*) FROM adoption')->fetchColumn();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adoption</title>
    <link rel="stylesheet" href="../CSS/adopt-user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
         <!-- Header -->
         <?php 
    generateHeader() ;
        
    ?>
        <!-- End of Header -->

    <br><br>
    <!-- Title and btn -->
    <div id="section1">
        <div class="adoptablepets">Adoptable Pets</div>
    </div>

    <!-- traitSimple -->
    <div class="traitSimple"></div>
    <div class="container">

        <?php foreach ($animals as $animal) : ?>
            <div id="block4">

                <p class="date">-23 Jan. 2024-</p>
                <div class="block">
                    <div class="left">
                        <img style="border-radius: 35px;" src='../assets/<?= $animal['image1'] ?>' alt="">
                        <div class="circles">
                            <div class="circle" onclick="changerImage('../assets/<?= $animal['image1'] ?>',this)"></div>
                            <div class="circle" onclick="changerImage('../assets/<?= $animal['image2'] ?>',this)"></div>
                            <div class="circle" onclick="changerImage('../assets/<?= $animal['image3'] ?>',this)"></div>
                        </div>
                    </div>
                    <div class="right">
                        <h1><?= $animal['nom'] ?></h1>
                        <h4><?= $animal['age'] ?>-Month</h4>
                        <h5>Description :</h5>
                        <p><?= $animal['description'] ?></p>
                        <div class="divForBtn">
                        <button onclick="redirection('adoption-app1.php')" class="modify">Adopt &nbsp;&nbsp;<i class="fa-solid fa-arrow-right"></i> </button>
                    </div>
                        
                    </div>
                </div>
                <!-- trait hor -->
                <div class="traitHor"></div>
                
            </div>
        <?php endforeach; ?>

    </div>



    <br><br>

    
        <!-- Footer -->
      <?php 

    generateFooter() ;
        
    ?>
<!-- End of Footer -->

    <script src="../Javascript/adopt.js"></script>

</body>
</html>