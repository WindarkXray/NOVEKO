<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
    $bdd = new PDO("mysql:host=$servername;dbname=utilisateurs", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connexion réussie !";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

if (isset($_POST["ok"])) {
    $nom = trim(htmlspecialchars($_POST['nom']));
    $email = trim(htmlspecialchars($_POST['email']));
    $mdp = trim(htmlspecialchars($_POST['mdp']));

    // Utilisez password_hash pour sécuriser le mot de passe
    $hashedPassword = password_hash($mdp, PASSWORD_DEFAULT);

    // Générez un token
    $token = bin2hex(random_bytes(32));

    // Utilisez des colonnes spécifiques dans la requête
    $requete = $bdd->prepare("INSERT INTO users (nom, email, mdp, token) VALUES (:nom, :email, :mdp, :token)");
    $requete->execute(
        array(
            "nom" => $nom,
            "email" => $email,
            "mdp" => $hashedPassword,
            "token" => $token,
        )
    );
    // Redirection après l'insertion
    header("Location: login.php");
    exit(); // Assurez-vous de terminer le script après la redirection
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="icon" href="Logo_noveko.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="login-style.css">
</head>

<body>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    
    try {
        $bdd = new PDO("mysql:host=$servername;dbname=utilisateurs", $username, $password);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connexion réussie !";
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $email = trim(htmlspecialchars($_POST['email']));
            $password = trim(htmlspecialchars($_POST['password']));
            if($email != "" && $password != "") {
                //connexion à la bdd
                $req = $bdd->query("SELECT * FROM users WHERE email = '$email' AND '$password'");
                $req = $req->fetch();
                if ($user !== false) {
                    //c'est ok !
                    header("Location: index.html");
                    exit();
                }
                else{
                    $error_msg = "Email ou mdp incorrect !";
                }
            }    
        }

    ?>

    <div class="container" id="container">

        <div class="form-container sign-up-container">
            <form method="POST" action="traitement.php">
                <h1>Créer un compte</h1>
                <div class="social-container">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <input type="text" name="nom" placeholder="Nom">
                <input type="email" name="email" placeholder="Email*" required>
                <input type="password" name="mdp" placeholder="Mot de passe*"required>
                <button type="submit" value="M'inscrire" name="ok" >Créer le compte</button>
            </form>
        </div>

        <div class="form-container login-container">
            <form method="POST" action="">
                <h1>Se connecter</h1>
                <div class="social-container">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <input type="email" name="email" placeholder="Email*" required>
                <input type="password" name="password" placeholder="Mot de passe*" required>
                <button type="submit" value="Se connecter" name="ok">Se connecter</button>
            </form>

        <?php

        if($error_msg){
            ?>
            <p><?php echo $error_msg; ?></p>
            <?php
        }

        ?>

        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Connectez-vous avec votre compte</h1>
                    <p>Real Estate pour plus de fonctionnalités</p>
                    <button class="ghost" id="login">Se connecter</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Vous n'avez pas de compte ?</h1>
                    <p>Créer un compte rapidement et facilement</p>
                    <button class="ghost" id="signUp">Créer un compte</button>
                </div>
            </div>
        </div>
        
    </div>

    <script src="script.js" charset="utf-8"></script>
</body>

</html>