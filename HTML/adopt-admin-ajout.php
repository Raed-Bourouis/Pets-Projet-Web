<?php
include '../PHP/functions.php';

// Connexion à la base de données MySQL
$pdo = pdo_connect_mysql();
$msg = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['nom']) && !empty($_POST['age']) && !empty($_POST['description']) && !empty($_POST['image1']) && !empty($_POST['image2']) && !empty($_POST['image3'])) {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $age = $_POST['age'];
    $description = $_POST['description'];
    $image1 =$_POST['image1'];
    $image2 =$_POST['image2'];
    $image3 =$_POST['image3'];

    // Insérer un nouvel enregistrement dans la table des contacts
    $stmt = $pdo->prepare('INSERT INTO adoption (age, description, image1, image2, image3, nom) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$age, $description, $image1, $image2, $image3, $nom]);
    // Message de sortie
    $msg = 'Created Successfully!';
    header("Location: ./adopt-admin.php");
    
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/adopt-admin.css">
    <style>
        body{
            background-color: #4CAF50;
        }
        .fenetre {
            display: block; /* Masquer le formulaire par défaut */
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #f9f9f9;
            width: 600px;
            max-width: 80%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
            padding: 20px;
        }
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        input[type="text"],
        textarea {
            font-size: 16px;
            width: calc(100% - 50px);
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: rgba(249, 249, 249, 0.8);
            margin-bottom: 15px;
        }
        button[type="submit"] {
            border-radius: 25px;
            font-family: "Playfair Display", sans-serif;
            background-color: #4CAF50;
            color: white;
            font-size: 18px;
            border: none;
            width: 100px;
            display: block;
            margin: 15px auto;
            padding: 15px 0;
            cursor: pointer;
        }
        input[type="file"] {
            margin-bottom: 15px;
        }
        
    .form-group {
        display: flex;
        align-items: center;
    }

    .form-group h1 {
        margin-right: 10px;
    }

    </style>
</head>
<body>
   

<form action="adopt-admin-ajout.php" method="post" class="fenetre" hidden>
    <button name="redirect" style="border-radius: 50%;
        background-color: red;
        color: white;
        float: right;
        margin-right: 40px;
        border: none;
        cursor: pointer">X</button>
    <h1>Name</h1>
    <input type="text" name="nom" placeholder="Enter name"><br>
    <h1>Age</h1>
    <input type="text" name="age" placeholder="Enter age"><br>
    <h1>Description</h1>
    <textarea name="description" placeholder="Enter description"></textarea>

<div class="form-group">
    <label><h2>Image 1</h2></label>
    <input name="image1" type="text"><br>
</div>

<div class="form-group">
    <label><h2>Image 2</h2></label>
    <input name="image2" type="text"><br>
</div>

<div class="form-group">
    <label><h2>Image 3</h2></label>
    <input name="image3" type="text"><br>
</div>
    <button type="submit" style="border-radius: 25px; font-family: Playfair Display, sans-serif; background-color: #4CAF50;color: white;font-size: 18px;border: none;width: 100px;display: block;margin: 15px auto;padding: 15px 0;cursor: pointer;" >Submit</button><br>
    <?php if ($msg): ?>
<p><?=$msg?></p>
<?php endif; ?>
</form> 
<?php
if (isset($_POST['redirect'])) {
    header("Location: adopt-admin.php");
    exit;
}
?>

 <script>
    function redirection(link) {
    window.location.href = link;
}
 </script>
</body>
</html>