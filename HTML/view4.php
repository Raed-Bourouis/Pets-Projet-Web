<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/formsstyle.css">
</head>
<?php require('dash.php') ?>

<body>
    <?php 
    include '../PHP/functions.php';
    generateHeader() ;

     ?>


    <div class="container">

    <?php view4() ?>

    </div>



    <?php echo generateFooter() ?>

</body>
</html>
