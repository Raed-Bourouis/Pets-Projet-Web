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
    <?php
    require_once ("header.php");
    echo getHeader();
    ?>
    <!-- <header>
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
                        </div></li>
                    <li><a href="market.html">Marketplace</a></li>
                    <li><a href="cart.html"><i class="fas fa-cart-plus"></i> Cart</a></li>
                    <li><a href="sign-in.html">Sign In</a></li>
                </ul>
            </div>
        </nav>
    </header> -->
    <!-- End of Header -->



    <div class="bck-img"></div>
    <form id="Vform">
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
                    <label for="whyInterested" class="label-questions">Why are you interested in volunteering your
                        veterinary services at our animal shelter?<span class="req">*</span></label>
                    <textarea id="whyInterested" name="whyInterested" class="required"></textarea>
                    <div class="error"></div>
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
                <li class="required-radio">
                    <label for="provideMedicalCare" class="label-questions">Are you willing to provide medical care for
                        a variety of animals, including dogs, cats, and potentially other species?<span
                            class="req">*</span></label>
                    <br>
                    <label> <input type="radio" id="provideMedicalCare_yes" name="provideMedicalCare" value="yes"> Yes
                        <label> <input type="radio" id="provideMedicalCare_no" name="provideMedicalCare" value="no"> No
                            <div class="error"></div>
                </li>
                <li class="required-radio">
                    <label for="comfortableAnimals" class="label-questions">Are you comfortable working with animals
                        that may have medical or behavioral issues?<span class="req">*</span></label>
                    <br>
                    <label> <input type="radio" id="comfortableAnimals_yes" name="comfortableAnimals" value="yes">
                        Yes</label>
                    <label> <input type="radio" id="comfortableAnimals_no" name="comfortableAnimals" value="no">
                        No</label>
                    <div class="error"></div>
                </li>
                <li>
                    <label for="outreachPrograms" class="label-questions">Are you interested in participating in
                        outreach
                        programs or community events to promote responsible pet ownership and veterinary care?</label>
                    <br>
                    <label> <input type="radio" id="outreachPrograms_yes" name="outreachPrograms" value="yes">
                        Yes</label>
                    <label> <input type="radio" id="outreachPrograms_no" name="outreachPrograms" value="no"> No</label>
                </li>
                <li>
                    <label for="liabilityInsurance" class="label-questions">Are you able to provide proof of liability
                        insurance or malpractice coverage?</label>
                    <br>
                    <label> <input type="radio" id="liabilityInsurance_yes" name="liabilityInsurance" value="yes">
                        Yes</label>
                    <label> <input type="radio" id="liabilityInsurance_no" name="liabilityInsurance" value="no">
                        No</label>
                </li>
                <li>
                    <label for="mentorship" class="label-questions">Are you interested in providing mentorship or
                        training to shelter staff or other volunteers?</label>
                    <br>
                    <label> <input type="radio" id="mentorship_yes" name="mentorship" value="yes"> Yes</label>
                    <label> <input type="radio" id="mentorship_no" name="mentorship" value="no"> No</label>
                    <div class="error"></div>
                </li>
                <li>
                    <label for="preferences" class="label-questions">Do you have any specific preferences or limitations
                        regarding the types of cases or procedures you're willing to handle at our shelter?</label>
                    <textarea id="preferences" name="preferences"></textarea>
                </li>
                <li>
                    <label for="specializedEquipment" class="label-questions">Please describe any specialized equipment
                        or resources you can provide for veterinary care.</label>
                    <textarea id="specializedEquipment" name="specializedEquipment"></textarea>
                </li>
                <li>
                    <label for="volunteerCommitment" class="label-questions">Are you interested in volunteering for
                        specific time-limited projects or ongoing support?</label>
                    <textarea id="volunteerCommitment" name="volunteerCommitment"></textarea>
                </li>
                <li id="volunteerRole">
                    <label for="volunteerRole" class="label-questions">Please choose the type of work you are interested
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
    <!-- Footer -->
    <?php
    echo getFooter();
    ?>
    <!-- <footer>
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
            <p ><a href="mailto:pets@gmail.com" style="color:white; text-decoration:none" ><i class="fa-regular fa-envelope"></i>&nbsp;Email: pets@gmail.com</a></p>
            <p><i class="fa-solid fa-phone"></i>&nbsp;Tel: +216 12 898 757</p>
            <p><i class="fa-solid fa-fax"></i>&nbsp;Fax: +216 62 69 26</p>
            <p>RIB: 156549855955558598</p>
        </div>
    </footer> -->
    <!-- End of Footer -->

</body>

</html>