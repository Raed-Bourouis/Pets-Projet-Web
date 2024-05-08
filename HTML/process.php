<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Process</title>
    <link rel="stylesheet" href="../CSS/process.css">
    <link rel="icon" href="../assets/logoweblight.png">
</head>
<body>
    <!-- Header -->
    <?php 
    include '../PHP/functions.php';
    generateHeader() ;
        
    ?>
    <!-- End of Header -->
    <!------------------------------------------------------------------------------------------------------------------------------------->

   <div id="bigContainer">
    <!-- Intro -->
    <h1>The Adoption Process : Find Your Furry Friend</h1>
    <div id="container1">
        <div class="textLeft">
            <p>Are you considering adding a four-legged friend to your family? Look no further than Pets Haven Animal Shelter, where our adoption program offers a lifeline to animals in need 
                and provides loving companionship to those seeking a furry friend.
            <br><br>
                But beyond the joy of welcoming a new pet into your home lies a sobering reality: thousands of stray animals are struggling to survive, facing starvation and hardship on the streets. These animals deserve a chance at a better life, and adoption is a crucial part of the solution.    
            </p>
        </div>
        <div class="imgRight"><img id="img1" src="../assets/image8.png" alt=""></div>

    </div>
    <!-- the rest of text -->
    <div id="container2">
        <p>

         When you adopt from Pets Haven, you're not just giving a pet a home; you're giving them a second chance at life. Each adoption helps alleviate the strain on shelters overwhelmed by the sheer number of strays, making room for more animals in nee


        </p>
    </div>
     
    <br><br>

    <!-- process overview -->
    <h2>Process Overview</h2>
    <br>
    <div id="container3">
        <div class="partie">
            <ul>
                <li style="font-size: xx-large"><b> Fill Out an Application Form:</b></li>
            </ul>
            <p>Begin by filling out <a id="appForm" href="./adoption-app1.php"> an application form </a> on our website. 

                Once submitted, one of our adoption specialists will  review your application and be in touch within 48 hours 
                to schedule an appointment for you to meet the animal of your choice.</p>

        </div>
        <div class="vertical-line"></div>

        <div class="partie">
            <ul style="padding-left: 20%">
                <li style="font-size: xx-large"><b> Visit Our Shelters : </b></li>
            </ul style="padding-left: 20%">
            <p>Stop by our shelters to meet your new furry friend! Bring your household members, including resident dogs .

                Visitors under 18 must be accompanied by an adult. 
               
               Check your e-mail for the location of our adoptable 
               animals at either our Denden or Moncef Bey shelters.</p>
        </div>

    </div>
   </div> 
    <div id="final"><img id="img2" src="../assets/dog_brains_2500-2048x1152.webp" alt=""></div>

    <!-- Footer -->
    <?php 
    generateFooter() ;
        
    ?>
<!-- End of Footer -->
    <!---------------------------------------------------------------------------------------------------------------------------->
</body>
</html>