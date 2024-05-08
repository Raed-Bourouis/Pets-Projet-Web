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
<<<<<<< HEAD
  <?php 
    include '../PHP/functions.php';
    generateHeader() ;
        
    ?>
=======
  <header>
    <nav>
      <div>
        <img id="logo" src="../assets/logoweblight.png" alt="Logo">
      </div>
      <div id="nav-list">
        <ul>
          <li><a href="home.html">Home</a></li>
          <li><a href="AboutUs.html">About Us</a></li>
          <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Services&nbsp;<i class="fa-solid fa-caret-down"></i></a>
            <div class="dropdown-content">
              <a href="adopt-user.html">Adopt a Pet</a>
              <a href="Surrender.html">Surrender a Pet</a>
              <a href="Volunteerpage1.html">Volunteer</a>
            </div>
          </li>
          <li><a href="market.html">Marketplace</a></li>
          <li><a href="cart.html"><i class="fas fa-cart-plus"></i> Cart</a></li>
          <li><a href="sign-in.html">Sign In</a></li>
        </ul>
      </div>
    </nav>
  </header>
>>>>>>> 51d01e2e8b42fc916f59126acde6333bbd56eae5
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
<<<<<<< HEAD
  <?php 
    generateFooter() ;
        
    ?>
=======
  <footer>
    <div>
      <img id="logo" src="../assets/logoweblight.png" alt="Logo">
    </div>
    <div>
      <p style="font-weight: bold;">Addresses:</p>
      <p><a href="https://www.google.com/maps/place/Denden,+Manouba" style="color:white; text-decoration:none"><i class="fa-solid fa-location-pin"></i>&nbsp;Denden, Manouba</a></p>
      <p><a href="https://www.google.com/maps/place/Av.+Moncef+Bey,+Tunis" style="color:white; text-decoration:none"><i class="fa-solid fa-location-pin"></i>&nbsp;Moncef Bey, Tunis</a></p>
    </div>
    <div>
      <p style="font-weight: bold;"> Contact Us</p>
      <p><a href="mailto:pets@gmail.com" style="color:white; text-decoration:none"><i class="fa-regular fa-envelope"></i>&nbsp;Email: pets@gmail.com</a></p>
      <p><i class="fa-solid fa-phone"></i>&nbsp;Tel: +216 12 898 757</p>
      <p><i class="fa-solid fa-fax"></i>&nbsp;Fax: +216 62 69 26</p>
      <p>RIB: 156549855955558598</p>
    </div>
  </footer>
>>>>>>> 51d01e2e8b42fc916f59126acde6333bbd56eae5
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