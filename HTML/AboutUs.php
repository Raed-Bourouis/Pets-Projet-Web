<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us </title>
    <link rel="icon" href="../assets/logoweblight.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../CSS/AboutUsStyle.css">
    <script defer src="../Javascript/AboutUsStyle.js"></script>
</head>
<body>
          <!-- Header -->
          <?php 
    include '../PHP/functions.php';
    generateHeader() ;
        
    ?>
        <!-- End of Header -->
    <div class="container">
        <h1>About Pets Haven:</h1>
        <div class="section" id="section1">
            <img src="../assets/Section1.webp">

            <p class="text" id="text1"> Welcome to Pets Haven, where every paw matters! As a leading animal shelter and rescue organization, we are dedicated to improving the lives of animals in need and finding loving forever homes for those in our care.</p>

        </div>
        <div class="section" id="section2"> 
                <p class="text" id="text1"><b>Our Mission : </b> <br>At Pets Haven, our mission is simple yet powerful: to rescue, rehabilitate, and rehome animals in need. We strive to provide compassionate care, essential medical treatment, and loving attention to every animal that comes through our door</p>
            <img src="../assets/Section2.jpeg">
          
        </div>
        <div class="section" id="section3">
            <img src="../assets/section3.webp">

            <p class="text" id="text3"><b>Our Vision:</b> <br> Our vision at Pets Haven is to build a community where every animal has a safe and loving home. We envision a world where no animal is left behind or forgotten, where shelters are places of hope and healing rather than fear and uncertainty</p>
          
        </div>
        <div class="Values" id="section4">
            <div class="section">
            <h2>Our Values:</h2>
            <ul>
                <li>
                    <div  class="ValueBox">
                    <img src="../assets/la-compassion.png" alt="Compassion Icon"><b>Compassion:</b><br></div>
                    <div class="valueText">We show empathy and kindness to all animals in our care, ensuring they receive the love and attention they deserve.</div>
                </li>
                <li>
                    <div class="ValueBox">
                    <img src="../assets/responsibility.png" alt="Responsibility Icon">
                    <b>Responsibility:</b><br></div>
                    <div class="valueText">We take responsibility for the well-being of the animals entrusted to us, providing them with a safe and nurturing environment.</div>
                </li>
                <li>
                    <div  class="ValueBox">
                    <img src="../assets/coeur.png" alt="Care Icon">
                    <b>Care:</b><br></div>
                    <div class="valueText">Each animal receives individualized care and support, tailored to their specific needs, ensuring they thrive under our care.</div>
                </li>
                <li>
                    <div class="ValueBox">
                    <img src="../assets/integrity.png" alt="Integrity Icon">
                    <b>Integrity:</b><br></div>
                    <div class="valueText">We uphold the highest standards of honesty and integrity in all our interactions, ensuring transparency and accountability in our operations.</div>
                </li>
                <li>
                    <div class="ValueBox">
                    <img src="../assets/teamwork.png" alt="Teamwork Icon">
                    <b>Teamwork:</b><br></div>
                    <div class="valueText">We foster a collaborative environment where staff, volunteers, and supporters work together as a team to achieve our mission of animal welfare.</div>
                </li>
                <li>
                    <div class="ValueBox">
                    <img src="../assets/respect.png" alt="Respect Icon">
                    <b>Respect:</b><br></div>
                    <div class="valueText">We treat each animal with the utmost respect and dignity, recognizing their inherent worth and value as living beings.</div>
                </li>
            </ul>
                    <hr>

        </div>
    </div>
       
        <div class="section" id="section5">
            <h2>Meet Our Team : </h2>
            <div id="team">
            <div class="teamMember"><img src="../assets/Islem.jpg"><p>Islem Nasri </p>
            <a>Technical Manager</a></div>
            <div class="teamMember">
            <img src="../assets/Raed.jpg"> <p>Raed Bourouis</p>
            <a>President</a>
        </div>
            <div class="teamMember">
            <img src="../assets/Rayenn.jpg"> <p>Rayenn Jenhani</p>
            <a>Financial  Manager</a>
        </div>
    </div>
        </div>
        <div class="section" id="join">
            <h2>Join Us:</h2>
            <p>
                Whether you're looking to adopt a new furry friend, volunteer your time and talents, or support our cause in other ways, we invite you to join us in our mission. 
                Together, we can create a world where every animal is loved, valued, and cared for. <br>
                We are looking for passionate individuals to join our team!<br>
                 <b><i>Thank you for visiting Pets Haven, where every paw has a purpose.</i></b>
                </p>
        </div>
    </div>
    <!-- Footer -->
    <?php 

    generateFooter() ;
        
    ?>
<!-- End of Footer -->

</body>
</html>