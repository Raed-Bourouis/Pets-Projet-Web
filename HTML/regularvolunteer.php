<?php
function processVolunteerApplication()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Database connection parameters
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "volunteer_db";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO volunteers (fullName, email, phone, address, age, legalWork, yearsExperience, specializedEquipment, volunteerCommitment, volunteerRole, otherSpecifyInput) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssisissis", $fullName, $email, $phone, $address, $age, $legalWork, $yearsExperience, $specializedEquipment, $volunteerCommitment, $volunteerRole, $otherSpecifyInput);

        // Set parameters and execute
        $fullName = $_POST['fullName'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $age = $_POST['age'];
        $legalWork = $_POST['legalWork'];
        $yearsExperience = $_POST['yearsExperience'];
        $specializedEquipment = $_POST['specializedEquipment'];
        $volunteerCommitment = $_POST['volunteerCommitment'];
        $volunteerRole = implode(", ", $_POST['volunteerRole']); // Assuming multiple roles can be selected
        $otherSpecifyInput = isset($_POST['otherSpecifyInput']) ? $_POST['otherSpecifyInput'] : '';

        $stmt->execute();

        echo "New records created successfully";

        $stmt->close();
        $conn->close();
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
    $req= $db->prepare("INSERT INTO VOLUNTEERFORMS (fullName, email, phone, address, age, specificExperience, routineMedicalCare, surgicalProcedures, emergencyCare, behavioralConsultations, outreachProgramsVolunteer, otherSpecifyInput, other) VALUES (:fullName, :email, :phone, :address, :age, :specificExperience, :routineMedicalCare, :surgicalProcedures, :emergencyCare, :behavioralConsultations, :outreachProgramsVolunteer, :otherSpecifyInput, :other)");

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
    $Role= $_POST['volunteerRole'];
    $otherSpecifyInput = isset($_POST['otherSpecifyInput']) ? $_POST['otherSpecifyInput'] : '';

    $req->execute(array());

    echo "New volunteer form data added successfully";

}
// Call the function to execute on form submission
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     addVolunteerFormDataToDatabase();
// }


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
            processVolunteerApplication();
        } else {
            foreach ($errors as $field => $message) {
                echo "<p>Error in $field: $message</p>";
            }
        }
    }
}
?>