<!-- <?php
//connexion avec le serveur (APACHE)
include '../PHP/functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
//$_SERVER['REQUEST_METHOD'] est utilisé pour connaître la méthode de requête (par exemple GET, POST, PUT, etc.) utilisée pour accéder à la page.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification de la présence de l'email utilisateur et du mot de passe
    if (isset($_POST['email']) && isset($_POST['pwd'])) {
        $username = $_POST['email'];
        $password = $_POST['pwd'];

        // Préparation de la requête SQL pour éviter les injections SQL
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email=:email AND pwd=:pwd");
        $stmt->bindParam(':email', $username);
        $stmt->bindParam(':pwd', $password);

        // Exécution de la requête
        $stmt->execute();

        // Si la requête retourne une ligne, l'utilisateur existe et nous pouvons démarrer une session

        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['email'] = $username;
            $_SESSION['pwd'] = $password;
            $_SESSION['id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            header('Location: ./home.php');
            exit;
        } else {
            // Si la requête ne retourne aucune ligne, l'utilisateur n'existe pas ou le mot de passe est incorrect
            echo "Nom d'utilisateur ou mot de passe invalide.";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/faa6c9467e.js" crossorigin="anonymous"></script>

    <title>Pets - Sign In</title>
    <link rel="stylesheet" href="../CSS/sign-in.css">
    <script src="../Javascript/sign-in.js" defer></script>

</head>

<body>

    <div id="bgim"></div>


    <div id="main">
        <section id="sectionleft">
            <img src="../assets/signin.jpg" alt="">
            <div class="logsign">
                <a href="sign-in.php" class="signin"> <i class="fa-solid fa-right-to-bracket"></i> Log in</a>
                <a href="signup1.php"><i class="fa-solid fa-user-plus"></i> Sign Up</a>
            </div>
        </section>
        <section id="sectionright">
            <div class="login-container">
                <form action="" method="post">
                    <div class="form-group">
                        <img src="../assets/logoblack.png" alt="" style="width: 100px;">

                        <p style="font-size: 1.5em; font-weight: 600;">Welcome Back!</p>
                    </div>
                    <div class="form-group">
                        <label for="name">Email, Phone Number or Username:</label>
                        <input style="margin-top: 1vh;" type="text" id="name" name="email" placeholder="JonDoe@pets.org" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <div id="pwdcontainer">
                            <input style="margin-top: 1vh;" type="password" name="pwd" placeholder="●●●●●●●●●●●●●" required>
                            <button type="button" id="revealpswrd"><i class="fa-regular fa-eye"></i></button>
                        </div>
                    </div>

                    <div class="form-group">
                        <input value="Sign In" type="submit" id="signin">
                    </div>

                    <div class="form-group">
                        <a href="signup.php">
                            <p id="signup-hyperlink">No Account? Sign Up!</p>
                        </a>
                        <a href="home.php">
                            <p><i class="fa-solid fa-chevron-left"></i> Return To Homepage</p>
                        </a>
                    </div>
                </form>


            </div>
        </section>
    </div>


</body>

</html> -->