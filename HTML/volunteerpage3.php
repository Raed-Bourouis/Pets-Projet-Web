<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinary Volunteer</title>
    <link rel="stylesheet" href="../CSS/VolunteerStyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script defer src="../Javascript/volunteer.js"></script>
    <link rel="icon" href="../assets/logoweblight.png">
</head>

<body>
    <!-- Header -->
<<<<<<< HEAD
    <?php 
    include '../PHP/functions.php';
    generateHeader() ;

     ?>
=======
    <?php
        require_once ("header.php");
        echo getHeader();
    ?>
>>>>>>> 51d01e2e8b42fc916f59126acde6333bbd56eae5

     
    <!-- End of Header -->



    <div class="bck-img"></div>
    <form id="Vform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <fieldset>
            <legend>Veterinary Volunteer Questionnaire</legend>
            <ol>
                <li>
                    <label for="fullName" class="label-questions">Full Name: <span class="req">*</span></label>
                    <input type="text" id="fullName" name="fullName" class="required">
                    <div class="error"></div>
                </li>
                <li>
                    <label for="email" class="label-questions">Email Address: <span class="req">*</span></label>
                    <input type="text" id="email" name="email">
                    <div class="error" id="emailError"></div>
                </li>
                <li>
                    <label for="phone" class="label-questions">Phone Number:<span class="req">*</span></label>
                    <input type="text" id="phone" name="phone">
                    <div class="error"></div>
                </li>
                <li>
                    <label for="address" class="label-questions">Address:<span class="req">*</span></label>
                    <textarea id="address" name="address" class="required"></textarea>
                    <div class="error"></div>
                </li>
                <li>
                    <label for="age" class="label-questions">Age:<span class="req">*</span></label>
                    <input type="number" id="age" name="age">
                    <div class="error"></div>
                </li>
                <li class="required-radio">
                    <label for="legalWork" class="label-questions">Are you licensed to practice veterinary medicine in
                        our country? (Yes/No)<span class="req">*</span></label>
                    <br>
                    <label> <input type="radio" id="legalWork_yes" name="legalWork" value="yes"> Yes</label>
                    <label> <input type="radio" id="legalWork_no" name="legalWork" value="no"> No</label>
                    <div class="error"></div>
                </li>
                <li>
                    <label for="yearsExperience" class="label-questions">How many years of experience do you have as a
                        veterinarian?<span class="req">*</span></label>
                    <input type="number" id="yearsExperience" name="yearsExperience" class="required">
                    <div class="error"></div>
                </li>
                <li>
                    <label for="previousVolunteer" class="label-questions">Have you volunteered at an animal shelter or
                        similar organization before? If yes, please describe your experience.</label>
                    <textarea id="previousVolunteer" name="previousVolunteer"></textarea>
                </li>
                <li>
                    <label for="availability" class="label-questions">What days and times are you available to
                        volunteer?<span class="req">*</span></label>
                    <textarea id="availability" name="availability" class="required"></textarea>
                    <div class="error"></div>
                </li>
                <li>
                    <label for="specificExperience" class="label-questions">Do you have any specific areas of expertise
                        or interest within veterinary medicine (e.g., surgery, emergency care, preventive medicine)? If
                        yes, please specify.</label>
                    <textarea id="specificExperience" name="specificExperience"></textarea>
                </li>
                <li id="volunteerRole">
                    <label for="volunteerRolee" class="label-questions">Please choose the type of work you are interested
                        in:</label>
                    <div>
                        <input type="checkbox" id="routineMedicalCare" name="volunteerRole[]"
                            value="Routine Medical Care"> Routine Medical Care (e.g., vaccinations, health
                        exams)</label>
                    </div>
                    <div>
                        <input type="checkbox" id="surgicalProcedures" name="volunteerRole[]"
                            value="Surgical Procedures"> Surgical Procedures (e.g., spay/neuter surgeries, minor
                        surgeries)</label>
                    </div>
                    <div>
                        <input type="checkbox" id="emergencyCare" name="volunteerRole[]" value="Emergency Care">
                        Emergency Care and Triage</label>
                    </div>
                    <div>
                        <input type="checkbox" id="behavioralConsultations" name="volunteerRole[]"
                            value="Behavioral Consultations"> Behavioral Consultations and Training</label>
                    </div>
                    <div>
                        <input type="checkbox" id="outreachProgramsVolunteer" name="volunteerRole[]"
                            value="Outreach Programs"> Outreach and Education Programs</label>
                    </div>
                    <div>
                        <label>
                            <input type="checkbox" id="otherSpecify" name="volunteerRole[]" value="Other"> Other (please
                            specify):
                            <input type="text" id="otherSpecifyInput" name="otherSpecifyInput" disabled>
                        </label>
                        <div class="error"></div>
                    </div>
                </li>
            </ol>
            <input type="submit" value="Submit">
        </fieldset>
    </form>
    
    
    <?php
        require("./Volunteer.php");
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            addVetFormDataToDatabase();
        }
    ?>

    
    <!-- Footer -->
<<<<<<< HEAD
    <?php 
    generateFooter() ;

     ?>
=======
    <?php
        echo getFooter();
    ?>












>>>>>>> 51d01e2e8b42fc916f59126acde6333bbd56eae5

</body>

</html>