<?php

function addVetFormDataToDatabase()
{
    try {
        $db = new PDO(
            'mysql:host=localhost;dbname=pets;charset=utf8',
            'root',
            ''
        );
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }


    // Prepare and bind
    $req = $db->prepare("INSERT INTO VETFORMS (fullName, email, phone, address, age, legalWork, yearsExperience, previousVolunteer, availability, specificExperience, Roles, otherSpecifyInput) VALUES (:fullname, :email, :phone, :address, :age, :legalwork, :yearsexperience, :previousvolunteer, :availability, :specificexperience, :roles,  :otherspecifyinput)");

    // Set parameters and execute
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $legalWork = $_POST['legalWork'];
    $yearsExperience = $_POST['yearsExperience'];
    $previousVolunteer = $_POST['previousVolunteer'];
    $availability = $_POST['availability'];
    $specificExperience = $_POST['specificExperience'];
    $Role = $_POST['volunteerRole'];
    $Roles = implode(' ', $Role);
    $otherSpecifyInput = isset($_POST['otherSpecifyInput']) ? $_POST['otherSpecifyInput'] : '';

    $req->execute(array('fullname' => $fullName, 'email' => $email, 'phone' => $phone, 'address' => $address, 'age' => $age, 'legalwork' => $legalWork, 'yearsexperience' => $yearsExperience, 'previousvolunteer' => $previousVolunteer, 'availability' => $availability, 'specificexperience' => $specificExperience, 'roles' => $Roles, 'otherspecifyinput' => $otherSpecifyInput));

        // Send confirmation email to the volunteer
        $to = $email;
        $subject = "Volunteer Application Received";
        $message = "Hello " . $fullName . ",\n\nThank you for your interest in volunteering with us. Your application is currently under processing. We will get back to you soon.\n\nBest Regards,\nThe Pets Team";
        $headers = "From: noreply@yourorganization.com";
    
        if(mail($to, $subject, $message, $headers)) {
            echo "<script>alert('Application recieved, Please check your email.')</script>";
        } else {
            echo  "<script>alert('Sorry, Something went wrong.')</script>";
        }
    

}

function addVolunteerFormDataToDatabase()
{
    try {
        $db = new PDO(
            'mysql:host=localhost;dbname=pets;charset=utf8',
            'root',
            ''
        );
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }


    // Prepare and bind
    $req = $db->prepare("INSERT INTO VOLUNTEERSFORMS (fullName, email, phone, address, age, legalWork, previousVolunteer, whyInterested, availability, animalAbuseOrNeglect, experience, skillsOrQualities, additionalTraining,  Roles, otherSpecifyInput) VALUES (:fullname, :email, :phone, :address, :age, :legalwork, :previousvolunteer, :whyinterested, :availability, :animalabuseorneglect, :experience, :skillsorqualities, :additionaltraining, :roles, :otherspecifyinput)");

    // Set parameters and execute
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $legalWork = $_POST['legalWork'];
    $previousVolunteer = $_POST['previousVolunteer'];
    $whyInterested = $_POST['whyInterested'];
    $availability = $_POST['availability'];
    $animalAbuseOrNeglect = $_POST['animalAbuseOrNeglect'];
    $experience = $_POST['experience'];
    $skillsOrQualities = $_POST['skillsOrQualities'];
    $additionalTraining = $_POST['additionalTraining'];
    $Role = $_POST['volunteerRole'];
    $Roles = implode(' ', $Role);
    $otherSpecifyInput = isset($_POST['otherSpecifyInput']) ? $_POST['otherSpecifyInput'] : '';

    $req->execute(array(
        'fullname' => $fullName,
        'email' => $email,
        'phone' => $phone,
        'address' => $address,
        'age' => $age,
        'legalwork' => $legalWork,
        'previousvolunteer' => $previousVolunteer,
        'whyinterested' => $whyInterested,
        'availability' => $availability,
        'animalabuseorneglect' => $animalAbuseOrNeglect,
        'experience' => $experience,
        'skillsorqualities' => $skillsOrQualities,
        'additionaltraining' => $additionalTraining,
        'roles' => $Roles,
        'otherspecifyinput' => $otherSpecifyInput,

    ));

    // Send confirmation email to the volunteer
    $to = $email;
    $subject = "Volunteer Application Received";
    $message = "Hello " . $fullName . ",\n\nThank you for your interest in volunteering with us. Your application is currently under processing. We will get back to you soon.\n\nBest Regards,\nThe Pets Team";
    $headers = "From: noreply@yourorganization.com";

    if(mail($to, $subject, $message, $headers)) {
        echo "<script>alert('Application recieved, Please check your email.')</script>";
    } else {
        echo  "<script>alert('Sorry, Something went wrong.')</script>";
    }

}


// Call the function to execute on form submission



function validateVolunteerForm()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $isValid = true;
        $errors = [];

        // Validate Full Name
        if (empty($_POST["fullName"])) {
            $errors["fullName"] = "Full Name is required.";
            $isValid = false;
        }

        // Validate Email
        if (empty($_POST["email"])) {
            $errors["email"] = "Email is required.";
            $isValid = false;
        } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Invalid email format.";
            $isValid = false;
        }

        // Validate Phone
        if (empty($_POST["phone"])) {
            $errors["phone"] = "Phone number is required.";
            $isValid = false;
        }

        // Validate Address
        if (empty($_POST["address"])) {
            $errors["address"] = "Address is required.";
            $isValid = false;
        }

        // Validate Age
        if (empty($_POST["age"])) {
            $errors["age"] = "Age is required.";
            $isValid = false;
        } elseif (!is_numeric($_POST["age"])) {
            $errors["age"] = "Age must be a number.";
            $isValid = false;
        }

        // Validate Legal Work
        if (!isset($_POST["legalWork"])) {
            $errors["legalWork"] = "This field is required.";
            $isValid = false;
        }

        // Validate Years of Experience
        if (empty($_POST["yearsExperience"])) {
            $errors["yearsExperience"] = "Years of experience is required.";
            $isValid = false;
        } elseif (!is_numeric($_POST["yearsExperience"])) {
            $errors["yearsExperience"] = "Years of experience must be a number.";
            $isValid = false;
        }

        // If the form is valid, process the data
        if ($isValid) {
        } else {
            foreach ($errors as $field => $message) {
                echo "<p>Error in $field: $message</p>";
            }
        }
    }
}
