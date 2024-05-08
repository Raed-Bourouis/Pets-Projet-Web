<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/formsstyle.css">
</head>
<<<<<<< HEAD
<?php require('dash.php') ?>

<body>
    <?php 
    include '../PHP/functions.php';
    generateHeader() ;

     ?>
=======
<?php require('header.php'); require('dash.php') ?>

<body>
    <?php echo getHeader() ?>
>>>>>>> 51d01e2e8b42fc916f59126acde6333bbd56eae5


    <div class="container">

    <?php view4() ?>

    </div>



<<<<<<< HEAD
    <?php echo generateFooter() ?>

</body>
</html>
=======
    <?php echo getFooter() ?>

</body>
</html>
>>>>>>> 51d01e2e8b42fc916f59126acde6333bbd56eae5
