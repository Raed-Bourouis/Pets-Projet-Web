<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteering Opportunities</title>
    <link rel="stylesheet" href="../CSS/Volunteerpage1.css">
    <link rel="icon" href="../assets/logoweblight.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-ApLEyOf1yIW6CWU1VfAgcR/zOqQz1CgZxA7sH2gIrU+05feFv/wt2ADeYO9n/pkHEimDQHBddvtQx7dXEnKByA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
             <!-- Header -->
             <?php 
    include '../PHP/functions.php';
    generateHeader() ;
        
    ?>
            <!-- End of Header -->
            <div class="bck-img"></div>

    <h1>Volunteering Opportunities</h1>
    <div class="container">
        <div class="opportunities">
            <div class="Volunteer">
                <img src="../assets/volunteer.jpg">
                <h3>Weekly Volunteer</h3>
                <p>Minimum age requirement: 12 years old.<br>
                    Availability: Monday to Saturday, from 9:00 am to 5:00 pm.<br><br>
                    Our weekly volunteers are an integral part of our team, contributing their time and energy to various tasks that keep the shelter running smoothly. Whether it's assisting with animal care, helping with adoption events, or providing administrative support, volunteers play a vital role in our organization.<br><br>
                    Please note that weekly volunteering positions may vary based on current needs. We appreciate your flexibility and dedication to our cause.</p>
                <div class="button-container">
                    <button type="button" onclick="location.href='Volunteerpage2.php'"><b>Apply Now!</b></button></div>
            </div>
            <div class="veterinarian">
                <img src="../assets/vet.jpg" alt="Veterinary Doctor"><br>
                <h3>Veterinary Volunteer</h3>
                <p>Minimum age requirement: 18 years old.<br>
                    Availability: Flexible, based on the veterinarian's schedule.<br><br>
                    Veterinary professionals bring invaluable expertise to our team, supporting the health and well-being of the animals in our care. As a volunteer veterinarian, you'll have the opportunity to provide medical care, perform surgeries, and offer guidance on best practices in animal health.<br><br>
                    Your dedication and expertise make a significant difference in the lives of our animals, ensuring they receive the highest standard of care. We're grateful for your commitment to our mission of providing quality veterinary services to homeless and at-risk animals.</p>
                <div class="button-container">
                    <button type="button" onclick="location.href='Volunteerpage3.php'"><b>Apply Now!</b></button></div>
            </div>
        </div>
        <div class="e-mail">
            For more information about volunteering opportunities, please contact us through our email address: <a href="mailto:volunteer@gmail.com">volunteer@gmail.com</a>
            <i class="fas fa-envelope"></i>
        </div>
       
    </div>
          <!-- Footer -->
      <?php 

    generateFooter() ;
        
    ?>
<!-- End of Footer -->
</body>
</html>
