<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pets</title>
    <link rel="icon" href="../assets/logoweblight.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../CSS/home.css">
    <script defer src="../Javascript/home.js"></script>

</head>
<body>
         <!-- Header -->
    <?php 
    include '../PHP/functions.php';
    generateHeader() ;
        
    ?>
    <!-- End of Header -->
    <!-- intro -->
    <div class="container" id="presentationcont">
        <div id="presentation">W</div>
    <br><br>
    <div id="traitHor"></div>
    <br><br><br>
    </div>

    

    <!-- section1 -->
    <div class="container1">
        <div class="sect11">
            <h1>Meet Your Adorable Pet</h1>
            <button>
                <?php
            echo ' <a style="text-decoration: none; color: inherit;" href=" ';
                if (isUserLoggedIn()) {
                    // Assuming getRole() function retrieves the user's role
                    if ( getRole() == '1') {
                        
                        echo './adopt-admin.php';
                    } elseif ( getRole() == '2') {
                        echo './adopt-user.php';
                    }
                } else {
                    echo 'signinup.php'; // Default to sign-in page if user not logged in
                }
                echo '">View Adoptable Pets </a>';
                
                ?>
                
            </button>
        </div>
        <div class="sect12">
            <img id="img1" src="../assets/image13.png" alt="">
        </div>
        <div class="blur1"></div>
    </div>
    
    <br><br><br>

    <!-- video -->
    <div class="video-container">
        <iframe src="https://www.youtube.com/embed/nfVPUOuM9dA" title="Every Step is a Second Chance | Walk for Animals 2024" frameborder="0" allowfullscreen></iframe>
    </div>
    
    <br><br><br>
    <!-- section2 -->    
    <div class="container2">
        <div id="sect21">
            <img id="img2" src="../assets/416019816_332436186378112_3094684770895714120_n.jpg" alt="">
        </div>
        <div id="sect22">
            <h1>Thousands of stray dogs and cats face starvation.</h1>
            <p>According to global animal welfare organisation FOUR PAWS, homeless dogs and cats are threatened with starvation. The reasons for the food shortage are
                 the curfews as well as the closed restaurants and factories especially after the covid-19, the main food source for many 
                 stray animals.</p>
            <h4>STORY OF A STARVING HUSKY NEARLY GIVES UP UNTIL A MIRACLE HAPPENS :</h4>
            <div class="audio-player"> <audio controls src="../audio/Starving Husky Nearly Gives Up Until A Miracle Happens  The Dodo.mp3"></audio> </div>
            <div id="btn2"> <button onclick="redirection('process.php')">Join Us!</button> </div>      
        </div>
        <div class="blur2"></div>
    </div>

  
    <br><br>

    <!-- Our Supporters -->
    <div id="TitleOurSupp"> <h2>Our Supporters</h2> </div>
    <div id="oursupp">
    <ul id="listSupp">
        <li><img class="supp" src="../assets/Ifaw_logo.png" alt=""></li>
        <li><img class="supp" src="../assets/FOUR PAWS logo_PNG.png" alt=""></li>
        <li><img class="supp" src="../assets/images.webp" alt=""></li>
        <li><img class="supp" src="../assets/18-AWI-Logo-Hexagons-Green-Border_300x300.png" alt=""></li>
    </ul>
    </div>
     
    <br><br>

    <!-- Volunteering -->
    <div class="container3">
        <div>
            <h1 id="volunteernow">Volunteer now !</h1>
            <p>We can help you choose the right pet for you, 
                and understand the needs of the pet you're thinking about getting. 
                Think P-E-T-S – Place, Exercise, Time and Spend</p> 
            <div id="btn3"> <button onclick="redirection('joincause.php')">View More</button> </div>
        </div>
        <div>
            <img src="../assets/istockphoto-1140204204-612x612.jpg" alt="">
        </div>
    </div>
    <!-- be part -->
    <div id="bepart">
        <h2>Are You Ready ?</h2>
        <h1>Be a part of our community !</h1>
        <br>
        <div><button onclick="redirection('signinup.php')" id="btn4">Sign Up</button></div>
    </div>


      <!-- Footer -->
      <?php 
    
    generateFooter() ;
        
    ?>
<!-- End of Footer -->
    <!---------------------------------------------------------------------------------------------------------------------------->


</body>
</html>