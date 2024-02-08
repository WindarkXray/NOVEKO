<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Contact</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('background_contact.png');
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px; /* Largeur du formulaire */
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin: 10px 0;
            color: #555;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.1); /* Ombre intérieure */
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #4caf50; /* Couleur verte */
            color: #fff;
            border: none;
            padding: 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049; /* Couleur verte légèrement plus foncée au survol */
        }

        .return-to-menu {
            background-color: #3498db; /* Couleur de fond */
            color: #fff; /* Couleur du texte */
            border-radius: 5px; /* Bordure arrondie */
            padding: 10px 142px; /* Espacement intérieur */
            text-decoration: none; /* Pas de soulignement */
            transition: background-color 0.3s, border 0.3s, color 0.3s; /* Animation de transition */
            margin-top: 20px; /* Espacement vers le bas */
        }

        .return-to-menu:hover {
            background-color: #2980b9; /* Couleur de fond au survol */
            color: #fff; /* Couleur du texte au survol */
        }
    </style>
</head>

<body>
    <form action="traitement_formulaire.php" method="post">
        <h2>Contactez-nous</h2>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>

        <label for="email">E-mail :</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Message :</label>
        <textarea id="message" name="message" rows="4" required></textarea>

        <input type="submit" value="Envoyer">

        <a href="index.html" class="back-to-menu-btn return-to-menu">Retour au Menu</a>
    </form>
</body>
</html>




<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:/wamp/www/site_diagnostic_immobilier/PHPMailer/src/Exception.php';
require 'C:/wamp/www/site_diagnostic_immobilier/PHPMailer/src/PHPMailer.php';
require 'C:/wamp/www/site_diagnostic_immobilier/PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $to = "benjaminmonteiro1972@gmail.com";
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $email = $_POST['email'];

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'benjaminmonteiro1972@gmail.com';
        $mail->Password   = 'JetYzvhu57285&**&yegsk5';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        //Recipients
        $mail->setFrom($email);
        $mail->addAddress($to);

        //Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        echo 'E-mail envoyé avec succès !';
    } catch (Exception $e) {
        echo "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
    }
}
?>