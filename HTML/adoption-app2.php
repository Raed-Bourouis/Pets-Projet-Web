<?php
include '../PHP/functions.php';

// Connexion à la base de données MySQL
$pdo = pdo_connect_mysql();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty( $_SESSION['Petname'] )||empty( $_SESSION['Name'] )||empty( $_SESSION['Email'] )||empty( $_SESSION['Phone'] )||empty( $_SESSION['Address'] )||empty( $_SESSION['City'] )|| $_SESSION['Pcode'] == $_POST['Pcode']){
        header('Location: ./adoption-app1.php');
    }
    if(empty($_POST["adult"]) ||
        empty($_POST["residenceType"]) ||
        empty($_POST["homeOwnership"]) ||
        empty($_POST["landlordPermission"]) ||
        empty($_POST["numAdults"]) ||
        empty($_POST["reasonAdopt"]) ||
        empty($_POST["obedienceTraining"]) ||
        empty($_POST["petCosts"]) ||
        empty($_POST["vetChoice"]) ||
        empty($_POST["vetRecords"]) ||
        empty($_POST["homeVisit"]) ||
        empty($_POST["additionalServices"]) ||
        empty($_POST["correct"]))
    {
        $errors["adult"]=empty($_POST["adult"])?"adult is required" : "";
        $errors["residenceType"]=empty($_POST["residenceType"])?"Type of residence Type is required" : "";
        $errors["homeOwnership"]=empty($_POST["homeOwnership"])?"home Ownership is required" : "";
        $errors["landlordPermission"]=empty($_POST["landlordPermission"])?"landlord Permission is required" : "";
        $errors["numAdults"]=empty($_POST["numAdults"])?"number of Adults is required" : "";
        $errors["reasonAdopt"]=empty($_POST["reasonAdopt"])?"reasonAdopt is required" : "";
        $errors["obedienceTraining"]=empty($_POST["obedienceTraining"])?"obedienceTraining is required" : "";
        $errors["petCosts"]=empty($_POST["petCosts"])?"petCosts is required" : "";
        $errors["vetChoice"]=empty($_POST["vetChoice"])?"vetChoice is required" : "";
        $errors["vetRecords"]=empty($_POST["vetRecords"])?"VetRecords is required" : "";
        $errors["homeVisit"]=empty($_POST["homeVisit"])?"homeVisit is required" : "";
        $errors["additionalServices"]=empty($_POST["additionalServices"])?"additionalServices is required" : "";
        $errors["correct"]=empty($_POST["correct"])?"correct is required" : "";
    }
    else if($_POST["adult"]!="Yes" || $_POST["correct"]!="Yes" ||$_POST["numAdults"]=="0" )
    {
        $errors["adult"]=$_POST["adult"]!="Yes"?"Only adults are allowed." : "";
        $errors["correct"]=$_POST["correct"]!="Yes"?"You must verify that all of the information you have provided is correct ." : "";
        $errors["numAdults"]=$_POST["numAdults"]=="0"?"Must be at least 1" : "";
    }
    else{
        try {
            $stmt = $pdo->prepare('INSERT INTO adopt (Adult,ResidenceType,HomeOwnership,LandlordPermission,NumAdults,ReasonAdopt,ObedienceTraining,PetCosts,VetChoice,VetRecords,HomeVisit,AdditionalServices,Correct,Petname,Name,Email,Phone,Address,City,Pcode)'.
                'Values(:adult,:residenceType,:homeOwnership,:landlordPermission,:numAdults,:reasonAdopt,:obedienceTraining,:petCosts,:vetChoice,:vetRecords,:homeVisit,:additionalServices,:correct,:petname,:name,:email,:phone,:address,:city,:pcode)');
            $data=[
                'adult'=>$_POST['adult'],
                'residenceType'=>$_POST['residenceType'],
                'homeOwnership'=>$_POST['homeOwnership'],
                'landlordPermission'=>$_POST['landlordPermission'],
                'numAdults'=>$_POST['numAdults'],
                'reasonAdopt'=>$_POST['reasonAdopt'],
                'obedienceTraining'=>$_POST['obedienceTraining'],
                'petCosts'=>$_POST['petCosts'],
                'vetChoice'=>$_POST['vetChoice'],
                'vetRecords'=>$_POST['vetRecords'],
                'homeVisit'=>$_POST['homeVisit'],
                'additionalServices'=>$_POST['additionalServices'],
                'correct'=>$_POST['correct'],
                'petname'=>$_SESSION['Petname'],
                'name'=>$_SESSION['Name'],
                'email'=>$_SESSION['Email'],
                'phone'=>$_SESSION['Phone'],
                'address'=>$_SESSION['Address'],
                'city'=>$_SESSION['City'],
                'pcode'=>$_SESSION['Pcode']
            ];

            $stmt->execute($data);
            $to = $_SESSION['Email'];
            $subject = "Test Email";
            $message = "This is a test email sent from PHP.";
            $headers = "From: sender@example.com\r\n";
            $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

            if (mail($to, $subject, $message, $headers)) {
                echo "Email sent successfully!";
            } else {
                echo "Failed to send email.";
            }
            $_SESSION=[];

            header('Location: ./thankyou.php');
        }catch (Exception $e){
            throw $e;
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption Application</title>
    <link rel="stylesheet" href="../CSS/adopt-app2.css">
    <link rel="icon" href="../assets/logoweblight.png">
    <script defer src="../Javascript/adoption.js"></script>
</head>
<body>
        <!-- Header -->
        <?php 
    generateHeader() ;
        
    ?>
        <!-- End of Header -->
    
    <!-- Form Section -->
    <div class="bck-img"> </div>
    <div class="container">
        <img id="logo2" src="../assets/LogoLArge.png" alt="Large Logo">
        <h1 id="title">Questionnaire</h1>
        <!------ Form ------>
        <form id="form" action="adoption-app2.php"  method="post">
            <div class="radio">
                <label for="adult">I verify that I am an adult : <span class="required">*</span></label>
                <input type="radio" name="adult" id="adult-yes" value="Yes"> <span class="radio-label">Yes</span>
                <input type="radio" name="adult" value="No" id="adult-no"> <span class="radio-label">No</span>
                <div class="error_select" id="error_yes_adult"><?php echo isset( $errors['adult']) ?  $errors['adult']: ''; ?></div>
            </div>            
            <!------- Household Information Section ------>
            <section class="household-info">
                <h2 class="section-title">Household Information:</h2>
                <div class="radio">
                    <label for="residence-type">Type of Residence (House/Apartment)<a class="required">* </a>:</label>
                    <input type="radio" id="residence-house" name="residenceType" value="House">House
                    <input type="radio" id="residence-apartment" name="residenceType" value="Apartment">Apartment
                    <div class="error_select"><?php echo isset( $errors['residenceType']) ?  $errors['residenceType']: ''; ?></div>
                </div>
               
                <br/>
                <div class="radio">
                    <label for="home-ownership">Do you own or rent your home? :<a class="required">* </a></label>
                    <input type="radio" id="home-rent" name="homeOwnership" value="rent">Rent
                    <input type="radio" id="home-own" name="homeOwnership" value="own">Own
                    <div class="error_select"><?php echo isset( $errors['homeOwnership']) ?  $errors['homeOwnership']: ''; ?></div>
                </div>
                <br/>
                <div class="radio">
                    <label for="landlord-permission">If you rent, do you have permission from your landlord to have pets? :<a class="required">* </a></label> 
                    <input type="radio" id="landlord-yes" name="landlordPermission" value="Yes"> Yes
                    <input type="radio" id="landlord-no" name="landlordPermission" value="No"> No
                    <div class="error_select"><?php echo isset( $errors['landlordPermission']) ?  $errors['landlordPermission']: ''; ?></div>
                </div>
                
                <br>
                <div class="input">
                    <label for="num-adults">Number of Adults in the Household : <a class="required">* </a></label>
                    <input type="number" id="num-adults" name="numAdults" min="1"  placeholder="Must be at least 1" >
                    <div class="error"><?php echo isset( $errors['numAdults']) ?  $errors['numAdults']: ''; ?></div>
                </div>
                <br>
            </section>
            <hr>

            <!-------- End of Household Information Section ------>

            <!------- User Information Section ------->
            <section class="user-info">
                <h2 class="section-title">Lifestyle and Preferences:</h2>
                <div class="textarea">
                    <label for="reason-adopt">Why do you want to adopt a pet? : <span class="required">*</span></label>
                    <textarea id="reason-adopt" name="reasonAdopt"></textarea>
                    <div class="error"><?php echo isset( $errors['reasonAdopt']) ?  $errors['reasonAdopt']: ''; ?></div>
                </div>
                <br/>
                <br>
                <div class="radio">
                    <label for="obedience-training">Are you willing to attend obedience training classes if needed? : <a class="required">* </a></label> 
                    <input type="radio" id="training-yes" name="obedienceTraining"> Yes 
                    <input type="radio" id="training-no" name="obedienceTraining" value="Other">No 
                    <input type="radio" id="training-not-sure" name="obedienceTraining" value="Other">Not Sure
                    <div class="error_select"><?php echo isset( $errors['obedienceTraining']) ?  $errors['obedienceTraining']: ''; ?></div>
                </div>
            </section>
            
            <!-- End of User Information Section -->
            <hr>

            <!-- Start of Experience With Pets-->
            <section class="experience-pets">
                <h2 class="section-title">Experience with Pets:</h2>
                <div class="radio">
                    <label for="pet-costs">Are you familiar with the costs associated with pet ownership, including veterinary care, food, grooming, etc.? : <a class="required">* </a></label> <br>
                    <input type="radio" id="costs-yes" name="petCosts"> Yes 
                    <input type="radio" id="costs-no" name="petCosts" value="Other">No 
                    <input type="radio" id="costs-not-sure" name="petCosts" value="Other">Not Sure 
                    <div class="error_select"><?php echo isset( $errors['petCosts']) ?  $errors['petCosts']: ''; ?></div>
                </div>  
            </section>
            <!-- End of Experience With Pets -->
            <hr>

            <!-- Start Of Petcare-->
            <section class="PetCare" >
                <h2 class="section-title"> Pet Care:</h2>
                <div class="radio">
                    <label for="vet-choice">Do you have a veterinarian you plan to use for your pet's medical care? : <a class="required">* </a> </label>
                    <input type="radio" id="vet-yes" name="vetChoice"> Yes
                    <input type="radio" id="vet-no" name="vetChoice"> No<br>
                    <div class="error_select"><?php echo isset( $errors['vetChoice']) ?  $errors['vetChoice']: ''; ?></div>
                </div>
            </section>
            <!-- End Of PetCare -->
            <hr>

            <!-- Start of Additional Questions -->
            <section class="additional-services">
                <h2 class="section-title"> Additional Questions:</h2>
                <div class="radio">
                    <label for="vet-records">Are you willing to provide veterinary records for current or past pets? : <a class="required">* </a></label>
                    <input type="radio" id="vet-records-yes" name="vetRecords"> Yes
                    <input type="radio" id="vet-records-no" name="vetRecords"> No<br>
                    <div class="error_select"><?php echo isset( $errors['vetRecords']) ?  $errors['vetRecords']: ''; ?></div>
                </div>
                <div class="radio">
                    <label for="home-visit">Are you willing to allow a home visit from a shelter representative before adoption? : <a class="required">* </a></label>
                    <input type="radio" id="home-visit-yes" name="homeVisit"> Yes
                    <input type="radio" id="home-visit-no" name="homeVisit"> No<br>
                    <div class="error_select"><?php echo isset( $errors['homeVisit']) ?  $errors['homeVisit']: ''; ?></div>
                </div>
            </section>
            <!-- End of Additional Questions -->
            <hr>

            <section class="additional-services">
                <fieldset>
                    <legend>Select any additional services you would like to include with your adoption:</legend>
                    
                        <input type="checkbox" id="service-microchipping" name="additionalServices" value="microchipping">
                        <label for="service-microchipping">Microchipping</label><br>
                   
                   
                        <input type="checkbox" id="service-spaying" name="additionalServices" value="spaying">
                        <label for="service-spaying">Spaying/Neutering</label><br>
                    
                   
                        <input type="checkbox" id="service-vaccinations" name="additionalServices" value="vaccinations">
                        <label for="service-vaccinations">Vaccinations</label><br>
                  
                    
                        <input type="checkbox" id="service-training" name="additionalServices" value="training">
                        <label for="service-training">Behavioral Training</label><br>
                  
                  
                        <input type="checkbox" id="service-insurance" name="additionalServices" value="insurance">
                        <label for="service-insurance">Health Insurance</label><br>
                   
                </fieldset>
                <div class="radio">
                    <label for="correct">I verify that all of the information I have provided is correct : <a class="required">* </a> </label>
                    <input type="radio" id="correct-yes" name="correct" value="Yes"> Yes
                    <input type="radio" id="correct-no" name="correct" value="No"> No<br>
                    <div id="error_yes" class="error_select"><?php echo isset( $errors['correct']) ?  $errors['correct']: ''; ?></div>
                </div>
              
            </section>
            <div class="btn-container">
                <button type="button" class="back" onclick="window.location.href='adoption-app1.php'">Back</button>
                <button type="reset" class="reset">Reset</button>
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
        <!-- Footer -->
        <?php 
        generateFooter() ;
            
        ?>
<!-- End of Footer -->
</body>
</html>
