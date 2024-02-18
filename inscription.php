<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="icon" href="Logo_noveko.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="inscription-styles.css">
</head>

<a href="index.html" class="return-to-menu">Retour au Menu</a>

<body>
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


        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Connectez-vous avec votre compte</h1>
                    <p>Real Estate pour plus de fonctionnalités</p>
                    <a href="login.php" class="ghost" id="login">Se connecter</a>
                </div>
            </div>
        </div>
        
    </div>
</body>

</html>