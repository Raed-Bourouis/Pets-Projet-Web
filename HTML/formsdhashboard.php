<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Dashboard</title>
    <script src="https://kit.fontawesome.com/faa6c9467e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/formsstyle.css">
</head>

<script defer>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.delete-btn');

        deleteButtons.forEach(button => {
            button.addEventListener('click', () => {
                const userItem = button.closest('.user');
                userItem.remove();
            });
        });
    });

    function redirection(link) {
        window.location.href = link;
    }
</script>

<?php
require('./dash.php');
?>

<body>
    <!-- Header -->
    <?php 
    include '../PHP/functions.php';
    generateHeader() ;
        
    ?>
    <!-- End of Header -->

    <div class="container">
        <h1>Forms Dashboard</h1>
        <!-- Statistics -->
        <?php echo formsStats(); ?>



    </div>
    <!-- End of Statistics -->
    <!-- forms Dashboard -->
    <?php echo fillFormsDash(); ?>

    </div>
    <!-- Footer -->
    <?php 
    generateFooter() ;
        
    ?>
    <!-- End of Footer -->
</body>

</html>