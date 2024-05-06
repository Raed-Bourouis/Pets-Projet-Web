<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Questionnaire</title>
    <link rel="stylesheet" href="../CSS/VolunteerStyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="../assets/logoweblight.png">

    <script defer src="../Javascript/volunteer.js"></script>
</head>

<body>
    <!-- Header -->
    <?php
    require_once ("header.php");
        echo getHeader();
    ?>
    <!-- End of Header -->
    <div class="bck-img"></div>
    <form id="Vform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <fieldset>
            <legend>Volunteer Questionnaire</legend>
            <div>
                <label for="fullName" class="label-questions">1. Full Name:<span class="req">*</span></label>
                <input type="text" id="fullName" name="fullName" class="required">
                <div class="error"></div>
            </div>

            <div>
                <label for="email" class="label-questions">2. Email Address:<span class="req">*</span></label>
                <input type="text" id="email" name="email">
                <div class="error"></div>

            </div>


            <div id="phonenum">
                <label for="phone" class="label-questions">3. Phone Number:<span class="req">*</span></label>
                <input type="text" id="phone" name="phone">
                <div class="error"></div>
            </div>

            <div class="textarea">
                <label for="address" class="label-questions">4. Address:<span class="req">*</span></label>
                <textarea id="address" name="address" class="required"></textarea>
                <div class="error"></div>

            </div>

            <div id="ageclient">
                <label for="age" class="label-questions">5. Age:<span class="req">*</span></label>
                <input type="number" id="age" name="age">
                <div class="error"></div>
            </div>

            <div class="required-radio">
                <label for="legalWork" class="label-questions">6. Are you legally allowed to work in our country?
                    (Yes/No)<span class="req">*</span></label>
                <br>
                <label>
                    <input type="radio" id="legalWork_yes" name="legalWork" value="yes"> Yes
                </label>
                <label>
                    <input type="radio" id="legalWork_no" name="legalWork" value="no"> No
                </label>
                <div class="error"></div>

            </div>

            <div class="textarea">
                <label for="previousVolunteer" class="label-questions">7. Have you volunteered at an animal shelter or
                    similar organization before? If yes, please describe your experience.</label>
                <textarea id="previousVolunteer" name="previousVolunteer"></textarea>
            </div>
            <div class="textarea">
                <label for="whyInterested" class="label-questions">8. Why are you interested in volunteering at our
                    animal shelter?</label>
                <textarea id="whyInterested" name="whyInterested"></textarea>
            </div>

            <div class="textarea">
                <label for="availability" class="label-questions">9. What days and times are you available to
                    volunteer?<span class="req">*</span></label>
                <textarea id="availability" name="availability" class="required"></textarea>
                <div class="error"></div>

            </div>


            <div class="required-radio">
                <label for="animalAbuseOrNeglect" class="label-questions">10. Have you ever been convicted of animal
                    abuse or neglect? (Yes/No)<span class="req">*</span></label>
                <br>
                <label>
                    <input type="radio" id="animalAbuseOrNeglect_yes" name="animalAbuseOrNeglect" value="yes"> Yes
                </label>
                <label>
                    <input type="radio" id="animalAbuseOrNeglect_no" name="animalAbuseOrNeglect" value="no"> No
                </label>
                <div class="error"></div>

            </div>
            <div>
                <label for="experience" class="label-questions">11. Do you have any experience working with specific
                    types of animals (e.g., dogs, cats, small animals)? If yes, please specify.</label>
                <input type="text" id="experience" name="experience">
            </div>

            <div class="textarea">
                <label for="skillsOrQualities" class="label-questions">12. What skills or qualities do you possess that
                    you think would make you a valuable volunteer at our animal shelter?</label>
                <textarea id="skillsOrQualities" name="skillsOrQualities"></textarea>
            </div>
            <div>
                <label for="additionalTraining" class="label-questions">13. Are you interested in participating in
                    additional training or workshops related to animal care or shelter operations?</label>
                <input type="text" id="additionalTraining" name="additionalTraining">
            </div>
            <div id="volunteerRole">
                <label for="volunteerRole" class="label-questions">14. Please select the type of volunteer role you are
                    interested in:</label>
                <div class="input-role">
                    <div>
                        <label for="animalCare">
                            <input type="checkbox" id="animalCare" name="volunteerRole[]" value="Animal Care"> Animal
                            Care (e.g., cleaning, feeding, grooming)
                        </label>
                    </div>
                    <div>
                        <label for="adoptionEvents">
                            <input type="checkbox" id="adoptionEvents" name="volunteerRole[]" value="Adoption Events">
                            Adoption Events (e.g., assisting with adoption events, interacting with potential adopters)
                        </label>
                    </div>
                    <div>
                        <label for="administrativeSupport">
                            <input type="checkbox" id="administrativeSupport" name="volunteerRole[]"
                                value="Administrative Support"> Administrative Support (e.g., answering phones, data
                            entry, filing)
                        </label>
                    </div>
                    <div>
                        <label for="fundraisingAndOutreach">
                            <input type="checkbox" id="fundraisingAndOutreach" name="volunteerRole[]"
                                value="Fundraising and Outreach"> Fundraising and Outreach (e.g., organizing
                            fundraisers, promoting shelter events)
                        </label>
                    </div>
                    <div>
                        <label for="educationAndTraining">
                            <input type="checkbox" id="educationAndTraining" name="volunteerRole[]"
                                value="Education and Training"> Education and Training (e.g., conducting educational
                            programs, training new volunteers)
                        </label>
                    </div>
                    <div>
                        <label for="otherSpecify">
                            <input type="checkbox" id="otherSpecify" name="volunteerRole[]" value="Other"> Other (please
                            specify):
                            <input type="text" id="otherSpecifyInput" name="otherSpecifyInput" disabled>
                        </label>
                    </div>
                    <div class="error"></div>

                </div>
                <div>
                    <input type="submit" value="Submit">
                </div>
        </fieldset>
    </form>

    <?php
        require("./Volunteer.php");
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            addVolunteerFormDataToDatabase();
        }
    ?>

    <!-- Footer -->
    <?php
        echo getFooter();
    ?>
    <!-- End of Footer -->
</body>

</html>