<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
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
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $email = trim(htmlspecialchars($_POST['email']));
        $password = trim(htmlspecialchars($_POST['password']));
    
        $token = bin2hex(random_bytes(32));
        var_dump($token);
    
        // Vérification de l'utilisateur dans la base de données
        $req = $bdd->prepare("SELECT * FROM users WHERE email = :email");
        $req->bindParam(':email', $email);
        $req->execute();
        $user = $req->fetch();
    
        if ($user !== false && password_verify($password, $user['mdp'])) {
            $bdd->exec("UPDATE users SET token = '$token' WHERE email = '$email' AND mdp = '$user[mdp]'");
            setcookie("token", $token, time() + 3600);
            setcookie("email", $email, time() + 3600);
            header("Location: intranet.php");
            exit();
        } else {
            $error_msg = "Email ou mot de passe incorrect !";
        }
    }

    ?>
    
    <a href="index.html" class="return-to-menu">Retour au Menu</a>

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
                <div class="overlay-panel overlay-right">
                    <h1>Vous n'avez pas de compte ?</h1>
                    <p>Créer un compte rapidement et facilement</p>
                    <a href="inscription.php" class="ghost" id="signUp">Créer un compte</a>
                </div>
            </div>
        </div>
        
    </div>
</body>

</html>