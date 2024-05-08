<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://kit.fontawesome.com/faa6c9467e.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="../CSS/userstyle.css">
  <link rel="icon" href="../assets/logoweblight.png">

</head>

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
  <?php
  echo usersStats();
  ?>

  </div>
  <!-- End of Statistics -->
  <ul class="user-list">
    <?php
    while ($entry = $users->fetch()) {
      echo fillUsersDash($entry['id'], $entry['fullname'], $entry['email'], $entry['role'], $entry['date_naiss']);
    }
    ?>
  </ul>
  </div>


  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['deletebutton'])) {
      $iddel = $_POST['deletebutton'];
      $requete = $db->prepare("DELETE FROM users WHERE id = ?");
      $requete->execute(array($iddel));
    }
  }
  ?>

  <!-- Footer -->
  <?php 
    generateFooter() ;
        
    ?>
  <!-- End of Footer -->


  <!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
      const deleteButtons = document.querySelectorAll('.delete-btn');

      deleteButtons.forEach(button => {
        button.addEventListener('click', () => {
          const userItem = button.closest('.user');
          userItem.remove();
        });
      });
    });
  </script> -->

</body>

</html>