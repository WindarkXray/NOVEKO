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

$email = $_COOKIE['email'];
$token = $_COOKIE['token'];

if ($token) {
    $req = $bdd->prepare("SELECT * FROM users WHERE email = :email AND token = :token");
    $req->bindParam(':email', $email);
    $req->bindParam(':token', $token);
    $req->execute();

    $rep = $req->fetch();

    if ($rep !== false) {

    } else {
        header("Location: login.php");
    }
} else {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="intranet-styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Copperplate&display=swap">
    <title>Votre Site Immobilier</title>
</head>

<body>
    <header class="header-background">
        <div class="logo">
            <img src="logo.png" width="100" alt="Votre Logo">
        </div>
        <nav>
            <ul>
                <li><a href="infos_et_normes.html">Info/Norme</a></li>
                <li><a href="déroulé_diagnostique.html">Déroulé d'un diagnostic</a></li>
                <li><a href="pro.html">Professionnel</a></li>
                <li><a href="calendrier_pro.html">Calendrier</a></li>
            </ul>
        </nav>
        <a href="logout.php" class="login-btn">Déconnexion</a>
        <a href="contact.php" class="background-button">Nous contacter</a>
    </header>







    <section class="main-section">
        <div class="section-content">
            <div class="content-left">
                <p class="small-bold-text">
                    Optez pour la tranquillité avec notre agence<br>
                    de diagnostic immobilier : diagnostics précis,<br>
                    conformité légale, et simplicité assurés pour<br>
                    protéger vos investissements et prendre des<br>décisions éclairées.</p>
                <button class="read-more-btn">En savoir plus</button>
            </div>
            <div class="content-right">
                <p class="big-bold-text"><strong>POURQUOI FAIRE<br>APPEL A NOUS ?</strong></p>
            </div>
        </div>
    </section>








    <div class="separator"></div>







    <section class="new-section">
        
        <div class="container-square-rectangle">

            <div class="blue-rectangle">
                <p class="big-text">Nos Services</p>
                <p class="small-text">En Diagnostic<br>Immobilier Pour Une<br>Approche Complète</p>

                <div class="left-arrow">&#9654;&#9654;&#9654;</div>

            </div>
        
            <div class="blue-squares-container">

                <div class="blue-square">
                    <div class="circle-number">1</div>
                    <p class="square-title">Diagnostic Gaz</p>
                    <p class="square-text">Focused On Delivering Both<br>Quality & Value, We Only Offer...</p>
                </div>
                    
                <div class="blue-square2">
                    <div class="circle-number">5</div>
                    <p class="square-title">Diagnostic Electricité</p>
                    <p class="square-text">We Listen, Analyze And Tailor<br>Our Services Based On Your...</p>
                </div>

                <div class="blue-square3">
                    <div class="circle-number">2</div>
                    <p class="square-title">Parasites et Termites</p>
                    <p class="square-text">Our Networks Are Our Net Worth<br>We implore Our Around The...</p>
                </div>

                <div class="blue-square4">
                    <div class="circle-number">6</div>
                    <p class="square-title">Loi Carrez</p>
                    <p class="square-text">With The Ever-Evolving World<br>Of Technology, We Adapt...</p>
                </div>

            </div>

        </div>

        <div class="section-container1">

            <div class="blue-square5">
                <div class="circle-number">3</div>
                <p class="square-title">Diagnostic Amiante</p>
                <p class="square-text">Focused On Delivering Both<br>Quality & Value, We Only Offer...</p>
            </div>
            
                <div class="blue-square6">
                <div class="circle-number">7</div>
                <p class="square-title">Diagnostic Plomb</p>
                <p class="square-text">We Listen, Analyze And Tailor<br>Our Services Based On Your...</p>
            </div>

            <div class="blue-square7">
                <div class="circle-number">4</div>
                <p class="square-title">DPE</p>
                <p class="square-text">Our Networks Are Our Net Worth<br>We implore Our Around The...</p>
            </div>
                    
            <div class="blue-square8">
                <div class="circle-number">8</div>
                <p class="square-title">ERP</p>
                <p class="square-text">With The Ever-Evolving World<br>Of Technology, We Adapt...</p>
            </div>

        </div>    

    </div>
    </section>

    <div class="side-by-side-sections">

        <section class="certifications-section">
            <div class="section-container">
                <h2>Certifications et Équipements</h2>
                <p>Affichez ici vos certifications et équipements pour assurer la qualité de nos services.</p>
                <!-- Ajoutez vos informations de certifications et équipements ici -->
            </div>
        </section>

        <section class="devis-section">
            <div class="section-container">
                <h2>Obtenez un Devis Gratuitement</h2>
                <p>Cliquez sur le bouton ci-dessous pour recevoir un devis personnalisé.</p>
                <a href="Devis.html">
                    <button class="devis-btn">Demander un Devis</button>    
                </a>
            </div>
        </section>

    </div>





    <section class="video-section">
        <div class="video-container">
            <video controls width="800" height="450">
                <source src="vidéo.mp4" type="video/mp4">
            </video>
        </div>
    </section>









    <footer class="footer-section">
        <div class="footer-content">
            <div class="footer-left">
                <div class="footer-title">NOVEKO</div>
                <p class="footer-text">La bonne maison dans<br>le bon quartier au bon prix.</p>
                
            </div>
            <div class="footer-right">
                <div class="footer-title">PAGE</div>
                <ul class="footer-links">
                    <li><a href="faq_diagnostic_immobilier.html">FAQ</a></li>
                    <li><a href="condition_utilisation.html">Conditions d'utilisation</a></li>
                </ul>
            </div>
        </div>
        <div class="social-icons">
            <div class="social-icons">
                <a href="lien-facebook" target="_blank" class="social-icon-link"><img src="Facebook (3).png" alt="Facebook"></a>
                <a href="lien-instagram" target="_blank" class="social-icon-link"><img src="Insta.png" alt="Instagram"></a>
            </div>      
        </div>
    </footer>
</body>
</html>
